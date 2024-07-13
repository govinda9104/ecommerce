<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Products</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Customer Products</h1>
        <table id="customerProductsTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated by JavaScript -->
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch data from the API
            $.ajax({
                url: '<?= site_url('customer/getCustomerProducts') ?>',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the table with data
                    var tableBody = $('#customerProductsTable tbody');
                    tableBody.empty();
                    $.each(data, function(index, product) {
                        var row = '<tr>' +
                                  '<td>' + product.id + '</td>' +
                                  '<td>' + product.product_id + '</td>' +
                                  '<td>' + product.product_name + '</td>' +
                                  '<td>' + product.quantity + '</td>' +
                                  '<td>' + product.prod_price + '</td>' +
                                  '</tr>';
                        tableBody.append(row);
                    });

                    // Initialize DataTables
                    $('#customerProductsTable').DataTable();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Failed to fetch data.');
                }
            });
        });
    </script>
</body>
</html>
