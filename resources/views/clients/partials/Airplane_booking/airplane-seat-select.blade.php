@include('clients.blocks.header_home')
@include('clients.blocks.banner')
<div class="container py-5">
    <h2 class="mb-4 text-center">Chọn Ghế Máy Bay</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form id="seatForm" method="GET" action="/airplane-payment">
                <input type="hidden" name="from" value="{{ $from }}">
                <input type="hidden" name="to" value="{{ $to }}">
                <input type="hidden" name="depart" value="{{ $depart }}">
                <input type="hidden" name="return" value="{{ $return }}">
                <input type="hidden" name="passenger" value="{{ $passenger }}">
                <input type="hidden" name="flight_code" value="{{ $flight_code }}">
                <input type="hidden" name="type" value="{{ $type }}">

                <div class="mb-3">
                    <label class="form-label fw-bold">Chọn ghế</label>
                    <div id="seatMap" class="d-flex flex-column" style="max-width:400px;margin:auto;"></div>
                    <div class="mt-2 text-center">
                        <span>Ghế đã chọn: <span id="selectedSeats"></span></span><br>
                        <span>Tổng tiền: <span id="totalPrice">0</span> VNĐ</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-danger" id="resetSeats">Xóa chọn</button>
                    <button type="submit" class="btn btn-success">Tiếp tục</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('clients.blocks.footer')

<script>
const seatMap = document.getElementById('seatMap');
const selectedSeatsSpan = document.getElementById('selectedSeats');
const totalPriceSpan = document.getElementById('totalPrice');
const seatForm = document.getElementById('seatForm');
const resetBtn = document.getElementById('resetSeats');

let selectedSeats = [];
const rows = 10;
const cols = ['A', 'B', 'C', 'D'];
const seatPrice = {
    'economy': {{ $seat_prices['economy'] }},
    'business': {{ $seat_prices['business'] }}
};

function renderSeats() {
    seatMap.innerHTML = '';
    for (let r = 1; r <= rows; r++) {
        const rowDiv = document.createElement('div');
        rowDiv.className = 'd-flex justify-content-center mb-2';

        cols.forEach((col, index) => {
            const seatId = `${r}${col}`;
            const seatDiv = document.createElement('div');
            seatDiv.textContent = seatId;
            seatDiv.className = 'seat-box';
            seatDiv.style.width = '50px';
            seatDiv.style.height = '50px';
            seatDiv.style.display = 'flex';
            seatDiv.style.alignItems = 'center';
            seatDiv.style.justifyContent = 'center';
            seatDiv.style.border = '1px solid #888';
            seatDiv.style.borderRadius = '8px';
            seatDiv.style.cursor = 'pointer';
            seatDiv.style.margin = '2px';
             
            // Tô màu vàng cho 4 hàng đầu
             if (r <= 3) {
                seatDiv.style.backgroundColor = selectedSeats.includes(seatId) ? '#17a2b8' : '#ffeb3b';
            } else {
                seatDiv.style.backgroundColor = selectedSeats.includes(seatId) ? '#17a2b8' : '#f8f9fa';
            }

            seatDiv.onclick = function() {
                if (selectedSeats.includes(seatId)) {
                    selectedSeats = selectedSeats.filter(s => s !== seatId);
                } else {
                    selectedSeats.push(seatId);
                }
                updateSelected();
                renderSeats();
            };

            // Thêm khoảng trống sau cột B
            if (col === 'B') seatDiv.style.marginRight = '50px';

            rowDiv.appendChild(seatDiv);
        });
        seatMap.appendChild(rowDiv);
    }
}

function updateSelected() {
    selectedSeatsSpan.textContent = selectedSeats.join(', ');
    let total = 0;
    selectedSeats.forEach(seat => {
        total += parseInt(seat[0]) <= 3 ? seatPrice.business : seatPrice.economy; // 3 hàng đầu business
    });
    totalPriceSpan.textContent = total.toLocaleString('vi-VN');
}

resetBtn.onclick = function() {
    selectedSeats = [];
    updateSelected();
    renderSeats();
};

seatForm.onsubmit = function(e) {
    if (!selectedSeats.length) {
        alert('Vui lòng chọn ít nhất 1 ghế!');
        e.preventDefault();
        return;
    }

    const seatsInput = document.createElement('input');
    seatsInput.type = 'hidden';
    seatsInput.name = 'seats';
    seatsInput.value = selectedSeats.join(',');
    seatForm.appendChild(seatsInput);

    const total = selectedSeats.reduce((sum, seat) => sum + (parseInt(seat[0]) <= 2 ? seatPrice.business : seatPrice.economy), 0);
    const totalInput = document.createElement('input');
    totalInput.type = 'hidden';
    totalInput.name = 'total_price';
    totalInput.value = total;
    seatForm.appendChild(totalInput);
};

renderSeats();
updateSelected();
</script>

<style>
.seat-box:hover {
    border: 2px solid #007bff;
}
</style>
