<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Studio</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Update Studio</h1>
        <form action="../../Handlers/Studio/studio_update.php" method="post">
            <input type="hidden" id="idstudio" name="idstudio" value="<?= $studio['idstudio'] ?>">

            <div class="input-group input-group-icon">
                <input type="text" id="nama_studio" name="nama_studio" value="<?php echo $studio['nama_studio']; ?>" placeholder="Nama Studio" required>
                <div class="input-icon">
                    <i class="fa fa-film"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="number" id="jumlah_kursi_baris" name="jumlah_kursi_baris" value="<?php echo $studio['jumlah_kursi_baris']; ?>" placeholder="Jumlah Kursi (Baris)" required>
                <div class="input-icon">
                    <i class="fa fa-person-seat"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="number" id="jumlah_kursi_kolom" name="jumlah_kursi_kolom" value="<?php echo $studio['jumlah_kursi_kolom']; ?>" placeholder="Jumlah Kursi (Kolom)" required>
                <div class="input-icon">
                    <i class="fa fa-person-seat"></i>
                </div>
            </div>

            <div class="input-group">
                <input type="submit" value="Simpan" class="btn">
            </div>
        </form>
    </div>
</body>

</html>