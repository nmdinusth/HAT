<?php

namespace App\Filament\Admin\Resources\TransportBookingResource\Pages;

use App\Filament\Admin\Resources\TransportBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransportBookings extends ListRecords
{
    protected static string $resource = TransportBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
