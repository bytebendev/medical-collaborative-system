<footer class="text-light mt-auto py-5" style="background: #800020; margin-left: 250px; border: none;">
    <div class="container-fluid px-4">
        <div class="row align-items-center gy-3">
            <!-- Left Side: Brand & Copyright -->
            <div class="col-md-6 text-center text-md-start">
                <h6 class="text-uppercase fw-bold mb-1 tracking-wider" style="color: #ffc107; letter-spacing: 0.5px;">
                    Medical Collaborative System
                </h6>
                <p class="text-white-50 small mb-0">&copy; <?php echo date('Y'); ?>. Secure Clinical Environment.</p>
            </div>
            
            <!-- Right Side: Quick Links / Support -->
            <div class="col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0 small">
                    <li class="list-inline-item">
                        <a href="/medical_collab_system/dashboard.php" class="text-white-50 text-decoration-none text-hover-gold">Dashboard</a>
                    </li>
                    <li class="list-inline-item text-white-50 opacity-50">|</li>
                    <li class="list-inline-item">
                        <a href="/medical_collab_system/index.php" class="text-white-50 text-decoration-none text-hover-gold">Home</a>
                    </li>
                    <li class="list-inline-item text-white-50 opacity-50">|</li>
                    <li class="list-inline-item">
                        <a href="/medical_collab_system/logout.php" class="text-white-50 text-decoration-none text-hover-gold">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<style>
    .text-hover-gold {
        transition: color 0.2s ease-in-out;
    }
    .text-hover-gold:hover {
        color: #ffc107 !important;
    }
    
    /* Responsive fallback: Remove sidebar offset if screen shrinks */
    @media (max-width: 768px) {
        footer {
            margin-left: 0 !important;
        }
    }
</style>