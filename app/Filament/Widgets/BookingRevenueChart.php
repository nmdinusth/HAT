<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Select;

class BookingRevenueChart extends Widget
{
    protected static string $view = 'filament.widgets.booking-revenue-chart';

    public ?string $filter = '30';

    protected function getFormSchema(): array
    {
        return [
            Select::make('filter')
                ->label('Khoảng thời gian')
                ->options([
                    '7' => '7 ngày gần nhất',
                    '30' => '30 ngày gần nhất',
                    'all' => 'Tất cả',
                ])
                ->default('30')
                ->reactive()
        ];
    }

    public function getData(): array
    {
        // Dữ liệu ảo: user chỉ là 'user 1' và 'user 2', các loại booking khác tự tạo
        $labels = ['user 1', 'user 2'];
        $airplane = [rand(500000, 2000000), rand(500000, 2000000)];
        $hotel = [rand(300000, 1500000), rand(300000, 1500000)];
        $transport = [rand(100000, 800000), rand(100000, 800000)];

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Vé máy bay',
                    'data' => $airplane,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                ],
                [
                    'label' => 'Khách sạn',
                    'data' => $hotel,
                    'backgroundColor' => 'rgba(255, 206, 86, 0.7)',
                ],
                [
                    'label' => 'Vận chuyển',
                    'data' => $transport,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.7)',
                ],
            ],
        ];
    }

    protected function getViewData(): array
    {
        return $this->getData();
    }
} 