<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeminarKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <div class="sidebar-header">
                <a href="index.html" class="logo">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>SeminarKu</span>
                </a>
                <button type="button" class="close-sidebar">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="user-profile">
                <img src="https://images.pexels.com/photos/3771807/pexels-photo-3771807.jpeg" alt="User Profile" class="profile-img">
                <div class="profile-info">
                    <h3>Emma Wilson</h3>
                    <p>Computer Science</p>
                </div>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li class="active">
                        <a href="dashboard-member.html">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="member-events.html">
                            <i class="fas fa-calendar-alt"></i>
                            <span>My Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="member-certificates.html">
                            <i class="fas fa-certificate"></i>
                            <span>Certificates</span>
                        </a>
                    </li>
                    <li>
                        <a href="member-payments.html">
                            <i class="fas fa-credit-card"></i>
                            <span>Payment History</span>
                        </a>
                    </li>
                    <li>
                        <a href="member-profile.html">
                            <i class="fas fa-user-circle"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="member-qr.html">
                            <i class="fas fa-qrcode"></i>
                            <span>My QR Codes</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-create-event.html">
                            <i class="fas fa-plus-circle"></i>
                            <span>Create Event</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-attendance.html">
                            <i class="fas fa-qrcode"></i>
                            <span>Attendance Scanner</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-reports.html">
                            <i class="fas fa-chart-bar"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                                        <li>
                        <a href="finance-pending.html">
                            <i class="fas fa-clock"></i>
                            <span>Pending Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="finance-verified.html">
                            <i class="fas fa-check-circle"></i>
                            <span>Verified Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="finance-reports.html">
                            <i class="fas fa-chart-line"></i>
                            <span>Financial Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="finance-settings.html">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                                        <li>
                        <a href="admin-users.html">
                            <i class="fas fa-users"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin-finance.html">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Finance Team</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin-committee.html">
                            <i class="fas fa-user-tie"></i>
                            <span>Event Committee</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin-events.html">
                            <i class="fas fa-calendar-alt"></i>
                            <span>All Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin-settings.html">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <a href="login.html" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

    <main>
        @yield('content')
    </main>
</body>
</html>