<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied - Restricted Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fcf8f9; }
        .error-card {
            border-top: 5px solid #800020; /* Brand Wine Red Border Accent */
        }
        .btn-brand {
            background-color: #800020;
            color: #ffffff;
        }
        .btn-brand:hover {
            background-color: #5a0016;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-5 text-center error-card" style="max-width: 500px; border-radius: 12px;">
        <div class="mb-3" style="color: #800020;">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61 61 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.2 11.2 0 0 0 2.417 2.3c.395.294.848.44 1.303.44s.908-.146 1.303-.44a11.2 11.2 0 0 0 2.417-2.3c1.612-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61 61 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5m0 5a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V6.5a1 1 0 0 0-1-1z"/>
            </svg>
        </div>
        
        <h2 class="fw-bold" style="color: #800020;">Access Restricted</h2>
        
        <span class="badge bg-warning text-dark mx-auto my-2 px-3 py-2 text-uppercase fw-bold tracking-wider" style="font-size: 0.75rem; letter-spacing: 1px;">
            Admin Privileges Required
        </span>

        <p class="text-muted mt-3">
            Sorry, <strong><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User'; ?></strong>. 
            Your current account credentials lack permission to access this resource.
        </p>
        
        <hr class="my-4 opacity-25">
        
        <div class="d-grid">
            <a href="/medical_collab_system/dashboard.php" class="btn btn-brand py-2 fw-semibold shadow-sm">
                Return to Dashboard
            </a>
        </div>
    </div>
</div>

</body>
</html>