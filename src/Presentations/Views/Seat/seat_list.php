<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Kursi</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <a href="../../Views/main_menu.php" class="btn back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1>Daftar Kursi</h1>
        <a href="../../Handlers/Seat/seat_create.php" class="btn add-btn">
            <i class="fas fa-plus"></i> Tambah Kursi Baru
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kursi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($seatList as $seat): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $seat['nama_seat'] ?></td>
                        <td>
                            <a href="../../Handlers/Seat/seat_edit.php?id=<?= $seat['idseat'] ?>" class="action-link edit-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../../Handlers/Seat/seat_delete.php?id=<?= $seat['idseat'] ?>" class="action-link delete-link">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>