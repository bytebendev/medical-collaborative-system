<?php
// Ensure session is started safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Medical Collaborative System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="/medical_collab_system/assets/css/sidebar.css">
    
    <style>
        /* Offsets the main content so it doesn't hide behind the fixed sidebar */
        body {
            background-color: #f8f9fa;
        }
        .main-content {
            margin-left: 260px; /* Sidebar width + spacing */
            padding: 40px 20px;
        }
        .report-card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <?php include 'C:\xampp\htdocs\medical_collab_system\includes\sidebar.php'; // Adjust path if sidebar.php is in the root ?>

    <div class="main-content">
        <div class="container-fluid">
            <h2>Generate Reports</h2>
            <hr>

            <div class="report-card-grid">
                <a href="general_report.php" class="btn btn-info py-3 fw-bold text-white">
                    General Report
                </a>

                <a href="patients_report.php" class="btn btn-primary py-3 fw-bold">
                    Patients Report
                </a>

                <a href="appointments_report.php" class="btn btn-success py-3 fw-bold">
                    Appointments Report
                </a>

                <a href="referrals_report.php" class="btn btn-warning py-3 fw-bold text-dark">
                    Referrals Report
                </a>

                <a href="users_report.php" class="btn btn-danger py-3 fw-bold">
                    Users Report
                </a>
            </div>

            <div class="mt-5">
                <a href="../dashboard.php" class="btn btn-dark px-4">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>