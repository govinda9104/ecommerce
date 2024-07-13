<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

    <?= $this->renderSection('styles') ?>
</head>
<body>
    
    <?= $this->renderSection('content') ?>

    <!-- jQuery -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('js/scripts.js') ?>"></script>

    <?= $this->renderSection('scripts') ?>
</body>
</html>
