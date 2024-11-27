<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Jadwal</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Update Jadwal</h1>

        <form action="../../Handlers/Jadwal/jadwal_update.php" method="post">
            <input type="hidden" id="idjadwal" name="idjadwal" value="<?= $jadwal['idjadwal'] ?>">

            <div class="input-group input-group-icon">
                <input type="date" id="tanggal" name="tanggal" value="<?php echo $jadwal['tanggal']; ?>" required>
                <div class="input-icon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>

            <div class="input-group input-group-icon">
                <input type="time" id="jam" name="jam" value="<?php echo $jadwal['jam']; ?>" required>
                <div class="input-icon">
                    <i class="fa fa-clock"></i>
                </div>
            </div>

            <div class="form-group">
                <select id="idstudio" name="idstudio" required>
                    <option value="">Pilih Studio</option>
                    <?php foreach ($studioList as $studio): ?>
                        <option value="<?= $studio['idstudio'] ?>" <?= $studio['idstudio'] == $jadwal['idstudio'] ? 'selected' : '' ?>>
                            <?= $studio['nama_studio'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <select id="idmovie" name="idmovie" required>
                    <option value="">Pilih Film</option>
                    <?php foreach ($movieList as $movie): ?>
                        <option value="<?= $movie['idmovie'] ?>" <?= $movie['idmovie'] == $jadwal['idmovie'] ? 'selected' : '' ?>>
                            <?= $movie['judul'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <select id="idemployee" name="idemployee" required>
                    <option value="">Pilih Pegawai</option>
                    <?php foreach ($employeeList as $employee): ?>
                        <option value="<?= $employee['idemployee'] ?>" <?= $employee['idemployee'] == $jadwal['idemployee'] ? 'selected' : '' ?>>
                            <?= $employee['employee_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Simpan" class="btn">
            </div>
        </form>
    </div>
</body>

</html>