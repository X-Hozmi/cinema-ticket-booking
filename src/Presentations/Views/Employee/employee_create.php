<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pegawai</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Pegawai Baru</h1>
        <form action="../../Handlers/Employee/employee_store.php" method="post" class="form-group">
            <div class="input-group input-group-icon">
                <input type="text" id="employee_name" name="employee_name" placeholder="Nama Pegawai" required>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="input-group">
                <input type="submit" value="Simpan" class="btn">
            </div>
        </form>
    </div>
</body>

</html>