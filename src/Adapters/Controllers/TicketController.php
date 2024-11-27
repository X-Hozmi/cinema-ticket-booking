<?php

namespace Adapters\Controllers;

use UseCases\ManageTicket;
use Entities\Ticket;

class TicketController
{
    private ManageTicket $ticketManager;

    public function __construct(ManageTicket $ticketManager)
    {
        $this->ticketManager = $ticketManager;
    }

    public function createTicket(array $data): bool
    {
        $ticket = new Ticket();
        $ticket->idjadwal = $data['idjadwal'];
        $ticket->idstudio = $data['idstudio'];
        $ticket->idprice = $data['idprice'];
        $ticket->booked_seats = $data['booked_seats'];
        $ticket->total_price = $data['total_price'];
        return $this->ticketManager->create($ticket);
    }

    public function getAllTickets(): array
    {
        return $this->ticketManager->fetchAll();
    }

    public function getTicketById(int $idticket): array
    {
        return $this->ticketManager->fetchById($idticket);
    }

    public function getBookedSeatsByJadwalId(int $idjadwal): array
    {
        return $this->ticketManager->fetchByJadwalId($idjadwal);
    }

    public function updateTicket(array $data): bool
    {
        $ticket = new Ticket();
        $ticket->idticket = $data['idticket'];
        $ticket->idjadwal = $data['idjadwal'];
        $ticket->idstudio = $data['idstudio'];
        $ticket->idprice = $data['idprice'];
        $ticket->booked_seats = $data['booked_seats'];
        $ticket->total_price = $data['total_price'];
        return $this->ticketManager->update($ticket);
    }

    public function deleteTicket(int $idticket): bool
    {
        return $this->ticketManager->delete($idticket);
    }
}
