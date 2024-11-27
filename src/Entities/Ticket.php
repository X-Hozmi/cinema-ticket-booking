<?php

namespace Entities;

class Ticket
{
    public int $idticket;
    public ?int $idjadwal;
    public ?int $idstudio;
    public ?int $idprice;
    public string $booked_seats;
    public ?float $total_price;
}
