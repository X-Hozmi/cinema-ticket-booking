<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <a href="../../Views/main_menu.php" class="btn back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1>Daftar Tiket</h1>
        <a href="../../Handlers/Ticket/ticket_create.php" class="btn add-btn">
            <i class="fas fa-plus"></i> Tambah Tiket Baru
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jadwal</th>
                    <th>Booked Seats</th>
                    <th>Kategori Harga</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($ticketList as $ticket): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $ticket['tanggal'] ?> <?= $ticket['jam'] ?></td>
                        <td><?= $ticket['booked_seats'] ?></td>
                        <td><?= $ticket['kategori'] ?></td>
                        <td><?= $ticket['total_price'] ?></td>
                        <td>
                            <a href="../../Handlers/Ticket/ticket_edit.php?id=<?= $ticket['idticket'] ?>" class="action-link edit-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../../Handlers/Ticket/ticket_delete.php?id=<?= $ticket['idticket'] ?>" class="action-link delete-link">
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