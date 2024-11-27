<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Kursi</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Update Kursi</h1>
        <form action="../../Handlers/Seat/seat_update.php" method="post">
            <input type="hidden" id="idseat" name="idseat" value="<?= $seat['idseat'] ?>">

            <div class="input-group input-group-icon">
                <input type="text" id="nama_seat" name="nama_seat" placeholder="Nama Kursi" value="<?php echo $seat['nama_seat']; ?>" required>
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