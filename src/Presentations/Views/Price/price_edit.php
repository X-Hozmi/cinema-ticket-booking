<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Harga</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Update Harga</h1>
        <form action="../../Handlers/Price/price_update.php" method="post">
            <input type="hidden" id="idprice" name="idprice" value="<?= $price['idprice'] ?>">

            <div class="input-group input-group-icon">
                <input type="text" id="kategori" name="kategori" placeholder="Kategori Harga" value="<?php echo $price['kategori']; ?>" required>
                <div class="input-icon">
                    <i class="fa fa-dollar-sign"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="number" id="total_price" name="total_price" placeholder="Total Harga" value="<?php echo $price['total_price']; ?>" required>
                <div class="input-icon">
                    <i class="fa fa-dollar-sign"></i>
                </div>
            </div>

            <div class="input-group">
                <input type="submit" value="Simpan" class="btn">
            </div>
        </form>
    </div>
</body>

</html>