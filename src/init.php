<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'Infrastructures/Databases/DatabaseConnection.php';

require_once 'Adapters/Repositories/EmployeeRepository.php';
require_once 'Adapters/Repositories/JadwalRepository.php';
require_once 'Adapters/Repositories/MovieRepository.php';
require_once 'Adapters/Repositories/PriceRepository.php';
require_once 'Adapters/Repositories/SeatRepository.php';
require_once 'Adapters/Repositories/StudioRepository.php';
require_once 'Adapters/Repositories/TicketRepository.php';

require_once 'UseCases/ManageEmployee.php';
require_once 'UseCases/ManageJadwal.php';
require_once 'UseCases/ManageMovie.php';
require_once 'UseCases/ManagePrice.php';
require_once 'UseCases/ManageSeat.php';
require_once 'UseCases/ManageStudio.php';
require_once 'UseCases/ManageTicket.php';

require_once 'Entities/Employee.php';
require_once 'Entities/Jadwal.php';
require_once 'Entities/Movie.php';
require_once 'Entities/Price.php';
require_once 'Entities/Seat.php';
require_once 'Entities/Studio.php';
require_once 'Entities/Ticket.php';

require_once 'Adapters/Controllers/EmployeeController.php';
require_once 'Adapters/Controllers/JadwalController.php';
require_once 'Adapters/Controllers/MovieController.php';
require_once 'Adapters/Controllers/PriceController.php';
require_once 'Adapters/Controllers/SeatController.php';
require_once 'Adapters/Controllers/StudioController.php';
require_once 'Adapters/Controllers/TicketController.php';

use Adapters\Repositories\EmployeeRepository;
use Adapters\Repositories\JadwalRepository;
use Adapters\Repositories\MovieRepository;
use Adapters\Repositories\PriceRepository;
use Adapters\Repositories\SeatRepository;
use Adapters\Repositories\StudioRepository;
use Adapters\Repositories\TicketRepository;

use UseCases\ManageEmployee;
use UseCases\ManageJadwal;
use UseCases\ManageMovie;
use UseCases\ManagePrice;
use UseCases\ManageSeat;
use UseCases\ManageStudio;
use UseCases\ManageTicket;

use Adapters\Controllers\EmployeeController;
use Adapters\Controllers\JadwalController;
use Adapters\Controllers\MovieController;
use Adapters\Controllers\PriceController;
use Adapters\Controllers\SeatController;
use Adapters\Controllers\StudioController;
use Adapters\Controllers\TicketController;

$employeeRepository = new EmployeeRepository();
$jadwalRepository = new JadwalRepository();
$movieRepository = new MovieRepository();
$priceRepository = new PriceRepository();
$seatRepository = new SeatRepository();
$studioRepository = new StudioRepository();
$ticketRepository = new TicketRepository();

$employeeManager = new ManageEmployee($employeeRepository);
$jadwalManager = new ManageJadwal($jadwalRepository);
$movieManager = new ManageMovie($movieRepository);
$priceManager = new ManagePrice($priceRepository);
$seatManager = new ManageSeat($seatRepository);
$studioManager = new ManageStudio($studioRepository);
$ticketManager = new ManageTicket($ticketRepository);

$employeeController = new EmployeeController($employeeManager);
$jadwalController = new JadwalController($jadwalManager);
$movieController = new MovieController($movieManager);
$priceController = new PriceController($priceManager);
$seatController = new SeatController($seatManager);
$studioController = new StudioController($studioManager);
$ticketController = new TicketController($ticketManager);
