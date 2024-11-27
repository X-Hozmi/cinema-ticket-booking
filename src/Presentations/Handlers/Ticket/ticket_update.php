<?php
require_once '../../../init.php';

$selectedSeatsJson = $_POST['selected_seats'] ?? '[]';
$selectedSeats = json_decode($selectedSeatsJson, true);

$bookedSeatsString = !empty($selectedSeats) ? implode(', ', $selectedSeats) : '';

$data = [
    'idticket' => $_POST['idticket'],
    'idjadwal' => $_POST['idjadwal'],
    'idstudio' => $_POST['idstudio'],
    'idprice' => $_POST['idprice'],
    'booked_seats' => $bookedSeatsString,
    'total_price' => $_POST['total_price'],
];

try {
    if ($ticketController->updateTicket($data)) {
        header("Location: ticket_list.php");
        exit();
    } else {
        throw new Exception("Gagal memperbarui tiket.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
