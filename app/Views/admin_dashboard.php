<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

  
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Admin Dashboard</h1>
        <div class="mt-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
            <button class="btn btn-secondary" onclick="window.location.href='<?= base_url('admin/viewCustomerProducts') ?>'">View Customer Products</button>
            
          
            <a href="<?= base_url('login/signout') ?>" class="btn btn-danger">Logout</a>
        </div>
        
       
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
                            <button class="btn btn-sm btn-primary edit-btn" data-id="<?= $product['id'] ?>" data-name="<?= $product['product_name'] ?>" data-description="<?= $product['prod_description'] ?>" data-quantity="<?= $product['prod_qty'] ?>" data-price="<?= $product['prod_price'] ?>">Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $product['id'] ?>">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editProductForm" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editProductId" name="id">
                        <div class="form-group">
                            <label for="editProductName">Name</label>
                            <input type="text" class="form-control" id="editProductName" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="editProductDescription">Description</label>
                            <textarea class="form-control" id="editProductDescription" name="prod_description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editProductQuantity">Quantity</label>
                            <input type="number" class="form-control" id="editProductQuantity" name="prod_qty" required>
                        </div>
                        <div class="form-group">
                            <label for="editProductPrice">Price</label>
                            <input type="text" class="form-control" id="editProductPrice" name="prod_price" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


  
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addProductForm" action="<?= base_url('admin/saveProduct') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addProductName">Name</label>
                        <input type="text" class="form-control" id="addProductName" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="addProductDescription">Description</label>
                        <textarea class="form-control" id="addProductDescription" name="prod_description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="addProductQuantity">Quantity</label>
                        <input type="number" class="form-control" id="addProductQuantity" name="prod_qty" required>
                    </div>
                    <div class="form-group">
                        <label for="addProductPrice">Price</label>
                        <input type="text" class="form-control" id="addProductPrice" name="prod_price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>


   
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

   
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
           
            $('#productsTable').DataTable();

          
            $('.edit-btn').on('click', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const description = $(this).data('description');
                const quantity = $(this).data('quantity');
                const price = $(this).data('price');

                $('#editProductId').val(id);
                $('#editProductName').val(name);
                $('#editProductDescription').val(description);
                $('#editProductQuantity').val(quantity);
                $('#editProductPrice').val(price);

                $('#editProductForm').attr('action', '<?= site_url('admin/updateProduct/') ?>' + id);
                $('#editProductModal').modal('show');
            });

           
            $('.delete-btn').on('click', function() {
                const id = $(this).data('id');
                $('#confirmDeleteBtn').data('id', id);
                $('#deleteProductModal').modal('show');
            });

           
            $('#confirmDeleteBtn').on('click', function() {
                const id = $(this).data('id');
                window.location.href = '<?= base_url('admin/deleteProduct/') ?>' + id;
            });
        });

        $(document).ready(function() {
  
    $('#addProductModal').on('shown.bs.modal', function() {
      
        $('#addProductForm')[0].reset();
    });

   
    $('#addProductForm').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        
      
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
               
                $('#addProductModal').modal('hide');

               
                alert('Product added successfully!');
                location.reload();
              
            },
            error: function(xhr, status, error) {
              
                console.error(xhr.responseText);
                alert('Error adding product. Please try again.');
            }
        });
    });
});





    </script>
</body>
</html>
