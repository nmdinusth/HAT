@include('clients.blocks.header_hotel')
@include('clients.blocks.banner_hotel')
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
@include('clients.blocks.footer_hotel')

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
const flightCode = "{{ $flight_code }}";
// Tạo user_session tạm thời (1 lần duyệt)
let userSession = sessionStorage.getItem('airplane_user_session');
if (!userSession) {
    userSession = 'sess_' + Math.random().toString(36).substr(2, 9) + Date.now();
    sessionStorage.setItem('airplane_user_session', userSession);
}
// Trạng thái ghế từ server
let seatStatus = {};

function fetchSeatStatus() {
    fetch(`/api/airplane/seat-status?flight_code=${flightCode}`)
        .then(res => res.json())
        .then(data => {
            seatStatus = data;
            // Nếu ghế user đang giữ bị mất (do hết hạn hoặc bị người khác giữ), tự động bỏ chọn
            selectedSeats = selectedSeats.filter(seatId => {
                if (!seatStatus[seatId]) return true;
                if (seatStatus[seatId].status === 'hold' && seatStatus[seatId].user_session === userSession) return true;
                return false;
            });
            renderSeats();
            updateSelected();
        });
}

function holdSeat(seatId, cb) {
    fetch('/api/airplane/hold-seat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify({
            flight_code: flightCode,
            seat_code: seatId,
            user_session: userSession
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            selectedSeats.push(seatId);
            updateSelected();
            renderSeats();
            if (cb) cb(true);
        } else {
            alert('Ghế này vừa bị người khác giữ hoặc đặt!');
            if (cb) cb(false);
        }
    });
}

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
            // Trạng thái ghế
            let isHeld = seatStatus[seatId] && seatStatus[seatId].status === 'hold';
            let isBooked = seatStatus[seatId] && seatStatus[seatId].status === 'booked';
            let isMine = seatStatus[seatId] && seatStatus[seatId].user_session === userSession;
            // Tô màu
            if (isBooked) {
                seatDiv.style.backgroundColor = '#aaa'; // Đã đặt
                seatDiv.style.cursor = 'not-allowed';
            } else if (isHeld && !isMine) {
                seatDiv.style.backgroundColor = '#f99'; // Đang bị người khác giữ
                seatDiv.style.cursor = 'not-allowed';
            } else if (selectedSeats.includes(seatId)) {
                seatDiv.style.backgroundColor = '#17a2b8'; // Đang chọn
            } else if (r <= 3) {
                seatDiv.style.backgroundColor = '#ffeb3b';
            } else {
                seatDiv.style.backgroundColor = '#f8f9fa';
            }
            // Disable click nếu đã bị giữ/đặt bởi người khác
            if ((isHeld && !isMine) || isBooked) {
                seatDiv.onclick = null;
                seatDiv.style.pointerEvents = 'none';
            } else {
                seatDiv.onclick = function() {
                    if (selectedSeats.includes(seatId)) {
                        // Bỏ chọn: chỉ xóa khỏi selectedSeats, không xóa hold trên server (giữ cho đến hết hạn)
                        selectedSeats = selectedSeats.filter(s => s !== seatId);
                        updateSelected();
                        renderSeats();
                    } else {
                        // Gửi AJAX giữ ghế
                        holdSeat(seatId, function(success) {
                            if (success) {
                                // Đã xử lý trong holdSeat
                            } else {
                                fetchSeatStatus();
                            }
                        });
                    }
                };
            }
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
        total += parseInt(seat[0]) <= 3 ? seatPrice.business : seatPrice.economy;
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

// Polling trạng thái ghế mỗi 5s
fetchSeatStatus();
setInterval(fetchSeatStatus, 5000);
renderSeats();
updateSelected();
</script>

<style>
.seat-box:hover {
    border: 2px solid #007bff;
}
</style>
