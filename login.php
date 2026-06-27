<?php
session_start();

// Ensure this path perfectly targets your file structure
include("config/db.php"); 

$error_msg = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Secure Prepared Statement to prevent SQL Injection
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                header("Location: dashboard.php");
                exit();
            } else {
                $error_msg = "Invalid username or password.";
            }
        } else {
            $error_msg = "Invalid username or password.";
        }
        mysqli_stmt_close($stmt);
    } else {
        $error_msg = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Medical Collaborative System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #fcf8f9;
        }
        
        .login-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            background: #ffffff;
        }

        /* Wine Red Header Card */
        .card-custom-header {
            background-color: #800020;
            color: #ffffff;
            border-bottom: 4px solid #ffc107;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
            padding: 20px;
        }
        
        .card-custom-header h3 {
            font-weight: 700;
            margin-bottom: 0;
            letter-spacing: 0.5px;
        }
        
        /* Gold Theme Submission Button */
        .btn-gold {
            background-color: #ffc107;
            color: #800020;
            font-weight: 600;
            border: 2px solid #ffc107;
            transition: all 0.2s ease-in-out;
            width: 100%;
            padding: 10px;
            border-radius: 6px;
        }
        
        .btn-gold:hover {
            background-color: #800020;
            color: #ffc107;
            border-color: #ffc107;
        }
        
        .form-control:focus {
            border-color: #800020;
            box-shadow: 0 0 0 0.25rem rgba(128, 0, 32, 0.15);
        }
        
        .back-link {
            color: #800020;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link:hover {
            color: #5a0016;
            text-decoration: underline;
        }

        /* Styled Brand Footer matching index.php */
        footer {
            background: #800020;
            color: #ffffff;
            padding: 25px 15px;
            text-align: center;
            margin-top: auto;
        }
        
        footer .project-subtitle {
            color: #ffc107;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 5px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="container flex-grow-1 d-flex flex-column justify-content-center align-items-center py-4">
        <div style="width: 100%; max-width: 400px;">
            
            <div class="text-center mb-3">
                <img src="/medical_collab_system/assets/images/logo.png" alt="Oyo State Crest" height="45" class="img-fluid">
            </div>
            
            <div class="card login-card">
                <div class="card-custom-header">
                    <h3>System Portal</h3>
                    <small class="text-white-50">Ibadan North LGA PHC Portal</small>
                </div>
                
                <div class="card-body p-4">
                    
                    <?php if(!empty($error_msg)): ?>
                        <div class="alert alert-danger py-2 text-center small border-0" role="alert">
                            <?php echo $error_msg; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold text-secondary">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required autocomplete="username">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-secondary">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <button type="submit" name="login" class="btn btn-gold shadow-sm mb-2">
                            Authenticate &rarr;
                        </button>
                    </form>
                    
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="index.php" class="back-link small">&larr; Return to Homepage</a>
            </div>

        </div>
    </div>

    <footer>
        <div class="container">
            <p class="mb-0 text-white-50 small">&copy; <?php echo date("Y"); ?> Medical Collaborative System. All Rights Reserved.</p>
            <div class="project-subtitle">400 Level Group 29 Project</div>
        </div>
    </footer>

</body>
</html>