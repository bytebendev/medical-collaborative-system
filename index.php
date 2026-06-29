<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Collaborative System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #fcf8f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Custom Theme */
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        /* Balanced Hero Section with Corporate Deep Wine Red */
        .hero {
            background: #800020;
            color: #ffffff;
            padding: 50px 20px; /* Reduced padding for better vertical balance */
            text-align: center;
            border-bottom: 5px solid #ffc107;
        }
        
        .hero h1 {
            font-weight: 800;
            font-size: 2.5rem;
        }
        
        .hero .lead {
            color: #f8f9fa;
            max-width: 700px;
            margin: 15px auto;
        }

        .drop-shadow {
            filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.3));
        }

        /* Gold Accent Theme Button */
        .btn-gold {
            background-color: #ffc107;
            color: #800020;
            font-weight: 600;
            border: 2px solid #ffc107;
            transition: all 0.2s ease-in-out;
        }
        
        .btn-gold:hover {
            background-color: #800020;
            color: #ffc107;
            border-color: #ffc107;
        }

        /* Crisp Feature Grid Branding */
        .feature-box {
            padding: 30px 20px;
            border: none;
            border-top: 4px solid #800020;
            border-radius: 8px;
            margin-bottom: 25px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease-in-out;
        }
        
        .feature-box:hover {
            transform: translateY(-5px);
        }
        
        .feature-box h4 {
            color: #800020;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .feature-box p {
            color: #6c757d;
            margin-bottom: 0;
            font-size: 0.95rem;
        }

        /* System Theme Footer matching your updated style */
        footer {
            background: #800020;
            color: #ffffff;
            padding: 30px 15px;
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

    <!-- Top Navigation -->
    <nav class="navbar navbar-dark" style="background-color: #800020;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 text-white" href="#">
                <img src="/assets/images/logo.png" alt="Oyo State Logo" height="35" class="d-inline-block align-top">
                Medical Collaborative System
            </a>
            <a href="login.php" class="btn btn-gold px-4">
                Login
            </a>
        </div>
    </nav>

    <!-- Hero Header Block -->
    <div class="hero mb-5 shadow-sm">
        <div class="container">
            <!-- Adjusted layout height so it's clean and compact -->
            <div class="mb-3">
                <img src="/assets/images/logo.png" alt="Oyo State Badge" height="75" class="img-fluid drop-shadow">
            </div>
            <h1 class="display-6">Medical Collaborative System</h1>
            <p class="lead">
                A Prototype Medical Collaborative System for Primary Health Care Services in 
                <strong>Ibadan North Local Government Area</strong>
            </p>
            <div class="mt-4">
                <a href="login.php" class="btn btn-gold btn-lg px-5 shadow">
                    Get Started &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- Features Area -->
    <div class="container flex-grow-1">
        <h2 class="text-center mb-5 fw-bold" style="color: #800020;">System Features</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="feature-box">
                    <h4>Patient Management</h4>
                    <p>Register, update, and manage clinical patient demographics safely.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-box">
                    <h4>Medical Records</h4>
                    <p>Store and safely retrieve diagnostic data history and treatments.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-box">
                    <h4>Appointments</h4>
                    <p>Organize, schedule, and update clinical healthcare dates seamlessly.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-box">
                    <h4>Referrals</h4>
                    <p>Generate, issue, and keep clean audits of hospital transfer requests.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-box">
                    <h4>Messaging</h4>
                    <p>Instant peer utility channels between practicing medical staff elements.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-box">
                    <h4>Reports</h4>
                    <p>Analyze clinical indicators and export deep administrative breakdowns.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Standardized Matching Footer -->
    <footer>
        <div class="container">
            <p class="mb-0 text-white-50 small">&copy; <?php echo date("Y"); ?> Medical Collaborative System. All Rights Reserved.</p>
            <div class="project-subtitle"> 400 Level Group 29 Project</div>
        </div>
    </footer>

</body>
</html>