<?php

namespace UseCases;

use Adapters\Repositories\TicketRepository;
use Entities\Ticket;

class ManageTicket
{
    private TicketRepository $repository;

    public function __construct(TicketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Ticket $ticket): bool
    {
        return $this->repository->create($ticket);
    }

    public function fetchAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function fetchById(int $idticket): array
    {
        return $this->repository->fetchById($idticket);
    }

    public function fetchByJadwalId(int $idjadwal): array
    {
        return $this->repository->fetchByJadwalId($idjadwal);
    }

    public function update(Ticket $ticket): bool
    {
        return $this->repository->update($ticket);
    }

    public function delete(int $idticket): bool
    {
        return $this->repository->delete($idticket);
    }
}
