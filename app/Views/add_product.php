<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="<?= base_url('admin/saveProduct') ?>" method="post">
        <input type="text" name="product_name" placeholder="Product Name">
        <input type="text" name="prod_description" placeholder="Product Description">
        <input type="number" name="prod_qty" placeholder="Product Quantity">
        <input type="number" name="prod_price" placeholder="Product Price">
        <button type="submit">Save</button>
    </form>
</body>
</html>
