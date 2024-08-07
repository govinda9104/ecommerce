<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css')?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <div class="container">
    <div class="mt-4">
            <!-- Logout Button -->
            <button class="btn btn-secondary" onclick="window.location.href='<?= base_url('customer/vieworders') ?>'">View Orders</button>
            <a href="<?= base_url('login/signout') ?>" class="btn btn-danger">Logout</a>

        </div>
        <h1 class="mt-5">Customer Dashboard</h1>
        
      
        <div class="mt-4">
            <table id="productsTable" class="table table-bordered">
                <thead>
                    <tr>
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
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['prod_description'] ?></td>
                            <td><?= $product['prod_qty'] ?></td>
                            <td><?= $product['prod_price'] ?></td>
                            <td>
                              
                                <button class="btn btn-primary addToCartBtn"
                                    data-id="<?= $product['id'] ?>"
                                    data-name="<?= $product['product_name'] ?>"
                                    data-qty="<?= $product['prod_qty'] ?>"
                                    data-price="<?= $product['prod_price'] ?>"
                                    data-toggle="modal" data-target="#addToCartModal">
                                    Add to Cart
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

   
    <script>
        $(document).ready(function() {
         
            $(".btn-secondary").click(function(){
                $('#addToCartModal').modal('hide');
            })
            $('#productsTable').DataTable();

           
            $('.addToCartBtn').click(function() {
                var productId = $(this).data('id');
                var productName = $(this).data('name');
                var productQty = $(this).data('qty');
                var productPrice = $(this).data('price');

              
                $('#productIdModal').val(productId);
                $('#productNameModal').text(productName);
                $('#productPriceModal').text(productPrice);

               
                $('#addToCartModal').modal('show');
            });

          
            $('#modalAddToCartBtn').click(function() {
                var productId = $('#productIdModal').val();
                var productName = $('#productNameModal').text();
                var productQty = $('#productQtyModal').val();
                var productPrice = $('#productPriceModal').text();

             
                if (productQty <= 0 || productQty > productQty) {
                    alert('Invalid quantity! Please enter a valid quantity.');
                    return;
                }

                var paramValue = 'example';
                $.ajax({
                    url: '<?= site_url('customer/dashboard2') ?>/' + paramValue,
                    type: 'POST',
                    data: {
                        product_id: productId,
                        product_name: productName,
                        quantity: productQty,
                        price: productPrice
                    },
                    dataType: 'json', 
                    success: function(response) {
                       
                        if (response.status === 'success') {
                            alert(response.message);
                            $('#addToCartModal').modal('hide'); 
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                     
                        $('#result').text(response.message);
                    },
                    error: function(xhr, status, error) {
                     
                        console.error(xhr.responseText);
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="productIdModal">
                    <p>Product Name: <span id="productNameModal"></span></p>
                    <p>Price: $<span id="productPriceModal"></span></p>
                    <label for="productQtyModal">Quantity:</label>
                    <input type="number" id="productQtyModal" class="form-control" min="1" max="99" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="modalAddToCartBtn" class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
