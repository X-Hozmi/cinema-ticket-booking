<?php

namespace Adapters\Controllers;

use UseCases\ManageJadwal;
use Entities\Jadwal;

class JadwalController
{
    private ManageJadwal $jadwalManager;

    public function __construct(ManageJadwal $jadwalManager)
    {
        $this->jadwalManager = $jadwalManager;
    }

    public function createJadwal(array $data): bool
    {
        $jadwal = new Jadwal();
        $jadwal->tanggal = $data['tanggal'];
        $jadwal->jam = $data['jam'];
        $jadwal->idstudio = $data['idstudio'];
        $jadwal->idmovie = $data['idmovie'];
        $jadwal->idemployee = $data['idemployee'];
        return $this->jadwalManager->create($jadwal);
    }

    public function getAllJadwal(): array
    {
        return $this->jadwalManager->fetchAll();
    }

    public function getJadwalById($idjadwal)
    {
        return $this->jadwalManager->fetchById($idjadwal);
    }

    public function updateJadwal(array $data): bool
    {
        $jadwal = new Jadwal();
        $jadwal->idjadwal = $data['idjadwal'];
        $jadwal->tanggal = $data['tanggal'];
        $jadwal->jam = $data['jam'];
        $jadwal->idstudio = $data['idstudio'];
        $jadwal->idmovie = $data['idmovie'];
        $jadwal->idemployee = $data['idemployee'];
        return $this->jadwalManager->update($jadwal);
    }

    public function deleteJadwal(int $idjadwal): bool
    {
        return $this->jadwalManager->delete($idjadwal);
    }
}
