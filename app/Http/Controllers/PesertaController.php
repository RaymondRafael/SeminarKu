<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\DetailKegiatan;
use Carbon\Carbon;
use App\Models\RegistrasiKegiatan;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class PesertaController extends Controller
{
    // ... (Function index dan indexEvent biarkan tetap sama) ...
    public function index()
    {
        $idUser = session('user.id');
        $totalRegistrasi = RegistrasiKegiatan::where('id_user', $idUser)->count();
        $totalSertifikat = Sertifikat::whereHas('registrasi', fn($q) => $q->where('id_user', $idUser))->count();
        
        $totalBayar = RegistrasiKegiatan::where('id_user', $idUser)
            ->where('status_konfirmasi', 'Disetujui') // Hitung yang lunas saja
            ->with('detailKegiatan')
            ->get()
            ->sum(fn($item) => $item->detailKegiatan->biaya_registrasi ?? 0);

        $totalUpcoming = RegistrasiKegiatan::where('id_user', $idUser)
            ->whereHas('detailKegiatan', fn($q) => $q->where('tanggal', '>=', now()))->count();

        $upcomingEvents = RegistrasiKegiatan::with(['detailKegiatan.kegiatan'])
            ->where('id_user', $idUser)
            ->whereHas('detailKegiatan', fn($q) => $q->where('tanggal', '>=', now()))
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        $sertifikat = Sertifikat::with(['registrasi.detailKegiatan.kegiatan'])
            ->whereHas('registrasi', fn($q) => $q->where('id_user', $idUser))
            ->orderBy('waktu_unggah', 'desc')
            ->take(5)
            ->get();

        return view('peserta.index', compact('totalRegistrasi', 'totalSertifikat', 'totalBayar', 'totalUpcoming', 'upcomingEvents', 'sertifikat'));
    }

    public function indexEvent()
    {
        $panitiaUserIds = User::whereHas('role', fn($q) => $q->where('nama_role', 'panitia'))->pluck('id_user');
        $events = Kegiatan::whereIn('id_user', $panitiaUserIds)->get();

        foreach ($events as $event) {
            $start = Carbon::parse($event->tanggal_mulai);
            $end = Carbon::parse($event->tanggal_selesai);
            if ($start->isSameDay($end)) {
                $event->tanggal_display = $start->format('d M');
            } elseif ($start->format('M') === $end->format('M')) {
                $event->tanggal_display = $start->format('d') . '–' . $end->format('d') . ' ' . $start->format('M');
            } else {
                $event->tanggal_display = $start->format('d M') . ' – ' . $end->format('d M');
            }
        }
        return view('peserta.event.index', compact('events'));
    }

    public function create(Request $request, $id_kegiatan)
    {
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $sesiKegiatans = DetailKegiatan::where('id_kegiatan', $id_kegiatan)->get();
        return view('peserta.event.create', compact('kegiatan', 'sesiKegiatans'));
    }

    // --- KEMBALI KE MANUAL STORE ---
    public function store(Request $request)
    {
        // 1. Validasi (Wajib ada file bukti)
        $request->validate([
            'id_detail_kegiatan' => 'required|array|min:1',
            'id_detail_kegiatan.*' => 'exists:detail_kegiatan,id_detail_kegiatan',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi Gambar
        ]);

        $userId = session('user.id');
        $tanggalRegistrasi = now();

        // 2. Upload Gambar
        $pathBukti = null;
        if ($request->hasFile('bukti_pembayaran')) {
            // Simpan ke folder 'public/bukti_pembayaran'
            $pathBukti = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        // 3. Simpan Data ke Database
        $validSessions = [];
        foreach ($request->id_detail_kegiatan as $idDetail) {
            $sesi = DetailKegiatan::find($idDetail);
            
            // Cek Kapasitas & Duplikat
            $jumlahTerdaftar = RegistrasiKegiatan::where('id_detail_kegiatan', $idDetail)->count();
            if ($jumlahTerdaftar >= $sesi->maksimal_peserta) return redirect()->back()->with('error', "Sesi {$sesi->sesi} penuh.");

            $sudahTerdaftar = RegistrasiKegiatan::where('id_user', $userId)->where('id_detail_kegiatan', $idDetail)->exists();
            if ($sudahTerdaftar) continue;

            $validSessions[] = $idDetail;
        }

        if (empty($validSessions)) return redirect()->back()->with('error', 'Sesi sudah terdaftar atau penuh.');

        foreach ($validSessions as $idDetail) {
            RegistrasiKegiatan::create([
                'id_user' => $userId,
                'id_detail_kegiatan' => $idDetail,
                'tanggal_registrasi' => $tanggalRegistrasi,
                'bukti_pembayaran' => $pathBukti, // Simpan Path Gambar
                'status_konfirmasi' => 'Pending',
                'kode_qr' => null
            ]);
        }

        return redirect()->route('peserta.index')->with('success', 'Pendaftaran berhasil! Silakan tunggu verifikasi admin.');
    }

    public function myQrCodes(Request $request)
    {
        $eventId = $request->query('event');
        $userId = session('user.id'); 
        $allEvents = Kegiatan::all();

        $qrRegistrasi = RegistrasiKegiatan::with(['detailKegiatan.kegiatan'])
            ->where('status_konfirmasi', 'Disetujui')
            ->whereNotNull('kode_qr')
            ->where('id_user', $userId)
            ->when($eventId, fn($q) => $q->whereHas('detailKegiatan.kegiatan', fn($sq) => $sq->where('id_kegiatan', $eventId)))
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        $pendingRegistrasi = RegistrasiKegiatan::with(['detailKegiatan.kegiatan'])
            ->where('id_user', $userId)
            ->where('status_konfirmasi', 'Pending')
            ->get();

        return view('peserta.eventQr', compact('qrRegistrasi', 'allEvents', 'pendingRegistrasi'));
    }

    public function Sertifikat(Request $request)
    {
        $user = session('user');
        if (!$user) return redirect()->route('login');

        $userId = $user['id'];
        $allEvents = Kegiatan::all();

        $sertifikatSaya = Sertifikat::with('registrasi.detailKegiatan.kegiatan')
            ->whereHas('registrasi', fn($q) => $q->where('id_user', $userId))
            ->get();

        return view('peserta.eventSertifikat', compact('sertifikatSaya', 'allEvents'));
    }
}