<?php

namespace Adapters\Controllers;

use UseCases\ManageSeat;
use Entities\Seat;

class SeatController
{
    private ManageSeat $seatManager;

    public function __construct(ManageSeat $seatManager)
    {
        $this->seatManager = $seatManager;
    }

    public function createSeat(array $data): bool
    {
        $seat = new Seat();
        $seat->nama_seat = $data['nama_seat'];
        return $this->seatManager->create($seat);
    }

    public function getAllSeats(): array
    {
        return $this->seatManager->fetchAll();
    }

    public function getSeatById(int $idseat): array
    {
        return $this->seatManager->fetchById($idseat);
    }

    public function updateSeat(array $data): bool
    {
        $seat = new Seat();
        $seat->idseat = $data['idseat'];
        $seat->nama_seat = $data['nama_seat'];
        return $this->seatManager->update($seat);
    }

    public function deleteSeat(int $idseat): bool
    {
        return $this->seatManager->delete($idseat);
    }
}
