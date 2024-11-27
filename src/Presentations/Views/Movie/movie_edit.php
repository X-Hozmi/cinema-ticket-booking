<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Film</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Update Film</h1>
        <form action="../../Handlers/Movie/movie_update.php" method="post">
            <input type="hidden" id="idmovie" name="idmovie" value="<?= $movie['idmovie'] ?>">

            <div class="input-group input-group-icon">
                <input type="text" id="judul" name="judul" placeholder="Nama Film" value="<?php echo $movie['judul']; ?>" required>
                <div class="input-icon">
                    <i class="fa fa-film"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="text" id="kategori" name="kategori" placeholder="Kategori Film" value="<?php echo $movie['kategori']; ?>" required>
                <div class="input-icon">
                    <i class="fa fa-smile"></i>
                </div>
            </div>

            <div class="input-group">
                <input type="submit" value="Simpan" class="btn">
            </div>
        </form>
    </div>
</body>

</html>