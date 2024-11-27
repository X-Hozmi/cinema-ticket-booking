<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Studio</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Studio Baru</h1>
        <form action="../../Handlers/Studio/studio_store.php" method="post">
            <div class="input-group input-group-icon">
                <input type="text" id="nama_studio" name="nama_studio" placeholder="Nama Studio" required>
                <div class="input-icon">
                    <i class="fa fa-film"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="number" id="jumlah_kursi_baris" name="jumlah_kursi_baris" placeholder="Jumlah Kursi (Baris)" required>
                <div class="input-icon">
                    <i class="fa fa-person-seat"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="number" id="jumlah_kursi_kolom" name="jumlah_kursi_kolom" placeholder="Jumlah Kursi (Kolom)" required>
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