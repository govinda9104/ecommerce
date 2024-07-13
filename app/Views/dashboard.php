<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS (optional) -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome to the eCommerce Site</h1>
        <div class="mt-4">
            <button class="btn btn-primary" id="admin-login">Admin Login</button>
            <button class="btn btn-secondary" id="customer-login">Customer Login</button>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle JS CDN -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS (optional) -->
    <script src="<?= base_url('js/scripts.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#admin-login').click(function() {
                window.location.href = '<?= base_url('login/admin') ?>';
            });
            $('#customer-login').click(function() {
                window.location.href = '<?= base_url('login/customer') ?>';
            });
        });
    </script>
</body>
</html>
