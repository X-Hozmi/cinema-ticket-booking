<?php
require_once '../../../init.php';

$ticketList = $ticketController->getAllTickets();

include '../../Views/Ticket/ticket_list.php';
