<x-filament::widget>
    <x-filament::card>
        <form wire:submit.prevent="submit">
            {{ $this->form }}
        </form>
        <canvas
            id="bookingRevenueChart"
            style="height: 300px; width: 100%;"
        ></canvas>
        <script>
            document.addEventListener('livewire:load', function () {
                let ctx = document.getElementById('bookingRevenueChart').getContext('2d');
                if(window.bookingRevenueChart) window.bookingRevenueChart.destroy();
                window.bookingRevenueChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($labels),
                        datasets: @json($datasets),
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { position: 'top' },
                            title: { display: true, text: 'Doanh thu các loại booking theo user' }
                        }
                    }
                });
            });
        </script>
    </x-filament::card>
</x-filament::widget> 