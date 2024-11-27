<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kursi</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Kursi Baru</h1>
        <form action="../../Handlers/Seat/seat_store.php" method="post">
            <div class="input-group input-group-icon">
                <input type="text" id="nama_seat" name="nama_seat" placeholder="Nama Kursi" required>
                <div class="input-icon">
                    <i class="fa fa-chair"></i>
                </div>
            </div>

            <div class="input-group">
                <input type="submit" value="Simpan" class="btn">
            </div>
        </form>
    </div>
</body>

</html>