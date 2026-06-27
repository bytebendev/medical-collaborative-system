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

// Query messages ordered by latest first
$query = "SELECT * FROM messages ORDER BY date_sent DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Medical Collaborative System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Safely prevents page content from colliding behind the fixed sidebar */
        .main-content {
            margin-left: 260px; 
            padding: 40px 20px;
        }
        .table-responsive {
            background: #ffffff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <?php include("../includes/sidebar.php"); ?>

    <div class="main-content">
        <div class="container-fluid">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2>Healthcare Messages</h2>
                    <p class="text-muted mb-0">Internal communications log for clinical staff operations.</p>
                </div>
                <a href="send_message.php" class="btn btn-success fw-bold px-4">
                    + Compose Message
                </a>
            </div>
            
            <hr>

            <div class="table-responsive mt-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="8%">ID</th>
                            <th width="15%">Sender</th>
                            <th width="15%">Receiver</th>
                            <th>Message Content</th>
                            <th width="18%">Date Sent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($result && mysqli_num_rows($result) > 0):
                            while($row = mysqli_fetch_assoc($result)): 
                        ?>
                            <tr>
                                <td class="fw-bold text-secondary">
                                    #<?php echo htmlspecialchars($row['message_id'] ?? $row['id']); ?>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark p-2 border"><?php echo htmlspecialchars($row['sender']); ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark p-2 border"><?php echo htmlspecialchars($row['receiver']); ?></span>
                                </td>
                                <td class="text-wrap" style="max-width: 400px;">
                                    <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                                </td>
                                <td class="text-muted small">
                                    <?php echo htmlspecialchars($row['date_sent']); ?>
                                </td>
                            </tr>
                        <?php 
                            endwhile; 
                        else: 
                        ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No exchange logs found inside database registry.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<footer>
<?php include("../includes/footer.php"); ?>
</footer>

</body>
</html>