<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Film</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Film Baru</h1>
        <form action="../../Handlers/Movie/movie_store.php" method="post">
            <div class="input-group input-group-icon">
                <input type="text" id="judul" name="judul" placeholder="Nama Film" required>
                <div class="input-icon">
                    <i class="fa fa-film"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="text" id="kategori" name="kategori" placeholder="Kategori Film" required>
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