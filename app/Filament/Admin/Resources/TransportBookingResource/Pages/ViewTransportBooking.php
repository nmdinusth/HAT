<?php

namespace App\Filament\Admin\Resources\TransportBookingResource\Pages;

use App\Filament\Admin\Resources\TransportBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTransportBooking extends ViewRecord
{
    protected static string $resource = TransportBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
