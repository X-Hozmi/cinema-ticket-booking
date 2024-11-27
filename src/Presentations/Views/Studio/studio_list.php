<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Studio</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <a href="../../Views/main_menu.php" class="btn back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1>Daftar Studio</h1>
        <a href="../../Handlers/Studio/studio_create.php" class="btn add-btn">
            <i class="fas fa-plus"></i> Tambah Kursi Baru
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Studio</th>
                    <th>Jumlah Kursi (Baris)</th>
                    <th>Jumlah Kursi (Kolom)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($studioList as $studio): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $studio['nama_studio'] ?></td>
                        <td><?= $studio['jumlah_kursi_baris'] ?></td>
                        <td><?= $studio['jumlah_kursi_kolom'] ?></td>
                        <td>
                            <a href="../../Handlers/Studio/studio_edit.php?id=<?= $studio['idstudio'] ?>" class="action-link edit-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../../Handlers/Studio/studio_delete.php?id=<?= $studio['idstudio'] ?>" class="action-link delete-link">
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