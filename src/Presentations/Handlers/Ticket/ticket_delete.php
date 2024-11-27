<?php
require_once '../../../init.php';

$idticket = $_GET['id'];

if ($ticketController->deleteTicket($idticket)) {
    header("Location: ticket_list.php");
} else {
    echo "Gagal menghapus tiket.";
}
