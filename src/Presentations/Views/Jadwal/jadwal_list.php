<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Jadwal</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <a href="../../Views/main_menu.php" class="btn back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1>Daftar Jadwal</h1>
        <a href="../../Handlers/Jadwal/jadwal_create.php" class="btn add-btn">
            <i class="fas fa-plus"></i> Tambah Jadwal Baru
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Studio</th>
                    <th>Movie</th>
                    <th>Employee</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($jadwalList as $jadwal): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $jadwal['tanggal'] ?></td>
                        <td><?= $jadwal['jam'] ?></td>
                        <td><?= $jadwal['nama_studio'] ?></td>
                        <td><?= $jadwal['judul'] ?></td>
                        <td><?= $jadwal['employee_name'] ?></td>
                        <td>
                            <a href="../../Handlers/Jadwal/jadwal_edit.php?id=<?= $jadwal['idjadwal'] ?>" class="action-link edit-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../../Handlers/Jadwal/jadwal_delete.php?id=<?= $jadwal['idjadwal'] ?>" class="action-link delete-link">
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