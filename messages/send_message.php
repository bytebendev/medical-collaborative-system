<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login if user isn't logged in
if (!isset($_SESSION['role'])) {
    header("Location: /medical_collab_system/login.php");
    exit();
}
?>

<?php
// Secure connection inclusion
require_once("../db_connect.php");

$message_sent = false;
$error_msg = "";

if (isset($_POST['submit'])) {
    // 1. Secure input data using Prepared Statements instead of injecting variables directly
    $sender   = trim($_POST['sender']);
    $receiver = trim($_POST['receiver']);
    $message  = trim($_POST['message']);

    if (!empty($sender) && !empty($receiver) && !empty($message)) {
        // Prepare the SQL template
        $stmt = mysqli_prepare($conn, "INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?)");
        
        if ($stmt) {
            // "sss" means three string variables
            mysqli_stmt_bind_param($stmt, "sss", $sender, $receiver, $message);
            
            if (mysqli_stmt_execute($stmt)) {
                $message_sent = true;
            } else {
                $error_msg = "Database Error: " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            $error_msg = "Preparation Failure: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message - Medical Collaborative System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include("../includes/sidebar.php"); ?>
    
     

        <div class="container mt-5" style="max-width: 700px;">
            <h2>Healthcare Collaboration</h2>
            <p class="text-muted">Communicate securely across your clinical network unit.</p>
            <hr>

            <?php if ($message_sent): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your message has been sent safely.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (!empty($error_msg)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error_msg); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label fw-bold">Sender</label>
                    <input type="text" name="sender" class="form-control" required placeholder="Your Identity">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Receiver</label>
                    <input type="text" name="receiver" class="form-control" placeholder="Doctor / Nurse / Admin" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Message</label>
                    <textarea name="message" class="form-control" rows="5" placeholder="Type your consultation briefing or notice here..." required></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-success px-4 fw-bold">
                    Send Message
                </button>
            </form>
        </div>

        <?php include("../includes/footer.php"); ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>