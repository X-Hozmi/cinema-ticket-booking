<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tiket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .input-group-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .input-group-icon input {
            padding-left: 30px;
        }

        .seat-container {
            margin: 20px 0;
            padding: 20px;
            background: #f8f8f8;
            border-radius: 8px;
        }

        .seat-grid {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .seat-row {
            display: flex;
            gap: 10px;
        }

        .seat {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background: white;
            transition: all 0.3s ease;
        }

        .seat.selected {
            background: #3498db;
            color: white;
            border-color: #2980b9;
        }

        .seat.booked {
            background: #ccc;
            cursor: not-allowed;
            color: #666;
        }

        .seat:hover:not(.booked) {
            transform: scale(1.1);
        }

        .legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .legend-box {
            width: 20px;
            height: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .legend-box.available {
            background: white;
        }

        .legend-box.selected {
            background: #3498db;
        }

        .legend-box.booked {
            background: #ccc;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #2980b9;
        }

        .btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .selected-seats {
            margin: 20px 0;
            padding: 10px;
            background: #f0f0f0;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Tiket</h1>
        <form id="ticketForm" action="../../Handlers/Ticket/ticket_update.php" method="post">
            <input type="hidden" id="idticket" name="idticket" value="<?= $ticket['idticket'] ?>">

            <div class="form-group">
                <select id="idstudio" name="idstudio" required>
                    <option value="">Pilih Studio</option>
                    <?php foreach ($studioList as $studio): ?>
                        <option value="<?= $studio['idstudio'] ?>" <?= $studio['idstudio'] == $ticket['idstudio'] ? 'selected' : '' ?>>
                            <?= $studio['nama_studio'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <select id="idjadwal" name="idjadwal" required>
                    <option value="">Pilih Jadwal</option>
                    <?php foreach ($jadwalList as $jadwal): ?>
                        <option value="<?= $jadwal['idjadwal'] ?>" <?= $jadwal['idjadwal'] == $ticket['idjadwal'] ? 'selected' : '' ?>>
                            <?= $jadwal['tanggal'] ?> <?= $jadwal['jam'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="seat-container">
                <h3>Pilih Kursi</h3>
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-box available"></div>
                        <span>Tersedia</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box selected"></div>
                        <span>Dipilih</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box booked"></div>
                        <span>Sudah Dipesan</span>
                    </div>
                </div>
                <div id="seatGrid" class="seat-grid">
                </div>
                <div class="selected-seats">
                    Kursi terpilih: <span id="selectedSeatsDisplay">-</span>
                    <input type="hidden" name="selected_seats" id="selectedSeatsInput">
                </div>
            </div>

            <div class="form-group">
                <select id="idprice" name="idprice" required>
                    <option value="">Pilih Kategori Harga</option>
                    <?php foreach ($priceList as $price): ?>
                        <option value="<?= $price['idprice'] ?>"
                            data-price="<?= $price['total_price'] ?>"
                            <?= $price['idprice'] == $ticket['idprice'] ? 'selected' : '' ?>>
                            <?= $price['kategori'] ?> - Rp <?= number_format($price['total_price'], 0, ',', '.') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group input-group-icon">
                <div class="input-icon">
                    <i class="fas fa-money-bill"></i>
                </div>
                <input type="number" id="total_price" name="total_price" placeholder="Total Harga" value="<?= $ticket['total_price'] ?>" required readonly>
            </div>

            <button type="submit" class="btn" id="submitBtn">Simpan</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jadwalSelect = document.getElementById('idjadwal');
            const studioSelect = document.getElementById('idstudio');
            const seatGrid = document.getElementById('seatGrid');
            const selectedSeatsDisplay = document.getElementById('selectedSeatsDisplay');
            const selectedSeatsInput = document.getElementById('selectedSeatsInput');
            const submitBtn = document.getElementById('submitBtn');
            const priceSelect = document.getElementById('idprice');
            const totalPriceInput = document.getElementById('total_price');

            let selectedSeats = [<?= json_encode($ticket['booked_seats']) ?>];
            let currentStudioLayout = null;
            let currentBookedSeats = [];

            function resetSelections() {
                selectedSeats = [];
                selectedSeatsDisplay.textContent = '-';
                selectedSeatsInput.value = '';
                updateTotalPrice();
                submitBtn.disabled = true;
            }

            studioSelect.addEventListener('change', async function() {
                resetSelections();
                seatGrid.innerHTML = '';

                if (!this.value) {
                    return;
                }

                try {
                    const response = await fetch(`../../Handlers/Ticket/get_studio_layout.php?studio_id=${this.value}`);
                    const data = await response.json();
                    currentStudioLayout = data;

                    if (jadwalSelect.value) {
                        await updateBookedSeatsAndGrid();
                    } else {
                        generateSeatGrid(
                            currentStudioLayout.jumlah_kursi_baris,
                            currentStudioLayout.jumlah_kursi_kolom,
                            []
                        );
                    }
                } catch (error) {
                    console.error('Error fetching studio layout:', error);
                    alert('Error fetching studio layout. Please try again.');
                }
            });

            jadwalSelect.addEventListener('change', async function() {
                resetSelections();

                if (!this.value || !studioSelect.value) {
                    return;
                }

                await updateBookedSeatsAndGrid();
            });

            async function updateBookedSeatsAndGrid() {
                try {
                    const response = await fetch(`../../Handlers/Ticket/get_booked_seats.php?jadwal_id=${jadwalSelect.value}&exclude_ticket=${document.getElementById('idticket').value}`);
                    const data = await response.json();

                    let bookedSeatsArray = [];
                    if (data && data.booked_seats) {
                        bookedSeatsArray = data.booked_seats.trim() ? data.booked_seats.split(', ') : [];
                    }

                    currentBookedSeats = bookedSeatsArray;

                    generateSeatGrid(
                        currentStudioLayout.jumlah_kursi_baris,
                        currentStudioLayout.jumlah_kursi_kolom,
                        currentBookedSeats
                    );

                    if (selectedSeats.length > 0) {
                        selectedSeats.forEach(seatId => {
                            const seatElement = document.querySelector(`[data-seat-id="${seatId}"]`);
                            if (seatElement) {
                                seatElement.classList.add('selected');
                            }
                        });
                        selectedSeatsDisplay.textContent = selectedSeats.join(', ');
                        selectedSeatsInput.value = JSON.stringify(selectedSeats);
                        updateTotalPrice();
                    }
                } catch (error) {
                    console.error('Error fetching booked seats:', error);
                    generateSeatGrid(
                        currentStudioLayout.jumlah_kursi_baris,
                        currentStudioLayout.jumlah_kursi_kolom,
                        []
                    );
                }
            }

            function generateSeatGrid(rows, cols, bookedSeats) {
                seatGrid.innerHTML = '';

                for (let i = 0; i < rows; i++) {
                    const rowDiv = document.createElement('div');
                    rowDiv.className = 'seat-row';

                    for (let j = 1; j <= cols; j++) {
                        const seatId = `${String.fromCharCode(65 + i)}${j}`;
                        const seatDiv = document.createElement('div');
                        seatDiv.className = `seat${bookedSeats.includes(seatId) ? ' booked' : ''}`;
                        seatDiv.setAttribute('data-seat-id', seatId);
                        seatDiv.textContent = seatId;

                        if (!bookedSeats.includes(seatId)) {
                            seatDiv.addEventListener('click', handleSeatClick);
                        }

                        rowDiv.appendChild(seatDiv);
                    }

                    seatGrid.appendChild(rowDiv);
                }
            }

            function handleSeatClick(event) {
                const seat = event.target;
                const seatId = seat.getAttribute('data-seat-id');

                if (seat.classList.contains('selected')) {
                    seat.classList.remove('selected');
                    selectedSeats = selectedSeats.filter(id => id !== seatId);
                } else {
                    seat.classList.add('selected');
                    selectedSeats.push(seatId);
                }

                selectedSeats.sort();
                selectedSeatsDisplay.textContent = selectedSeats.join(', ') || '-';
                selectedSeatsInput.value = JSON.stringify(selectedSeats);

                updateTotalPrice();
                submitBtn.disabled = selectedSeats.length === 0;
            }

            function updateTotalPrice() {
                if (selectedSeats.length === 0 || !priceSelect.value) {
                    totalPriceInput.value = '';
                    return;
                }

                const selectedOption = priceSelect.options[priceSelect.selectedIndex];
                const basePrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                const totalPrice = basePrice * selectedSeats.length;
                totalPriceInput.value = totalPrice;
            }

            priceSelect.addEventListener('change', updateTotalPrice);

            document.getElementById('ticketForm').addEventListener('submit', function(e) {
                if (selectedSeats.length === 0) {
                    e.preventDefault();
                    alert('Silakan pilih kursi terlebih dahulu!');
                    return false;
                }
                return true;
            });

            if (studioSelect.value) {
                studioSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
</body>

</html>