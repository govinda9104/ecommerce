<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Admin Dashboard</h1>
        <div class="mt-4">
            <button class="btn btn-primary" onclick="window.location.href='<?= base_url('admin/addProduct') ?>'">Add Product</button>
            <button class="btn btn-secondary" onclick="window.location.href='<?= base_url('admin/viewCustomerProducts') ?>'">View Customer Products</button>
        </div>
        
        <!-- DataTables Example -->
        <div class="mt-5">
            <h2>Products List</h2>
            <table id="productsTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['prod_description'] ?></td>
                        <td><?= $product['prod_qty'] ?></td>
                        <td><?= $product['prod_price'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/editProduct/'.$product['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= base_url('admin/deleteProduct/'.$product['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Custom JS -->
    <script src="<?= base_url('js/scripts.js') ?>"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables
            $('#productsTable').DataTable();
        });
    </script>
</body>
</html>
