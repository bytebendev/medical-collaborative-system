<?php
// Always start the session before accessing $_SESSION
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="/medical_collab_system/assets/css/sidebar.css">



<div class="sidebar">
    <h4 class="text-center mt-3 text-white">Medical Collaborative System</h4>
    <hr class="text-white">
<center>

<img
src="/medical_collab_system/assets/images/logo.png"
width="80">

</center>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "Admin"): ?>
        <div class="admin-links mb-3">
            <p class="text-center fw-bold mb-2 admin-title">ADMIN PANEL</p>
            
            <a href="/medical_collab_system/users/create_user.php" class="nav-link-btn admin-btn">
                Add User
            </a>

            <a href="/medical_collab_system/users/view_users.php" class="nav-link-btn admin-btn">
                View Users
            </a>
            <hr class="text-white">
        </div>
    <?php endif; ?>

    <a href="/medical_collab_system/dashboard.php" class="nav-link-btn">
        Dashboard
    </a>

    <a href="/medical_collab_system/patients/view_patients.php" class="nav-link-btn">
        Patients
    </a>

    <a href="/medical_collab_system/medical_records/view_records.php" class="nav-link-btn">
        Records
    </a>

    <a href="/medical_collab_system/appointments/view_appointments.php" class="nav-link-btn">
        Appointments
    </a>

    <a href="/medical_collab_system/referrals/view_referrals.php" class="nav-link-btn">
        Referrals
    </a>

    <a href="/medical_collab_system/messages/view_messages.php" class="nav-link-btn">
        Messages
    </a>

    <a href="/medical_collab_system/reports/reports.php" class="nav-link-btn">
        Reports
    </a>

    <a href="/medical_collab_system/logout.php" class="nav-link-btn logout-btn">
        Logout
    </a>
</div>