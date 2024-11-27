<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Film</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <a href="../../Views/main_menu.php" class="btn back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1>Daftar Film</h1>
        <a href="../../Handlers/Movie/movie_create.php" class="btn add-btn">
            <i class="fas fa-plus"></i> Tambah Film Baru
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Film</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($movieList as $movie): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $movie['judul'] ?></td>
                        <td><?= $movie['kategori'] ?></td>
                        <td>
                            <a href="../../Handlers/Movie/movie_edit.php?id=<?= $movie['idmovie'] ?>" class="action-link edit-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../../Handlers/Movie/movie_delete.php?id=<?= $movie['idmovie'] ?>" class="action-link delete-link">
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