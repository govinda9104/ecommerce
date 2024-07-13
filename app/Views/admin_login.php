<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    

    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Admin Login</h1>
        <form action="<?= base_url('login/authenticate') ?>" method="post" class="mt-4">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script src="<?= base_url('js/bootstrap.bundle.min.js')?>"></script>
   
    <script src="<?= base_url('js/scripts.js') ?>"></script>

    <script>
        $(document).ready(function() {
           
        });
    </script>
</body>
</html>
