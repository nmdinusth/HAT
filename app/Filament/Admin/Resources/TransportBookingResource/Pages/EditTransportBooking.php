<?php

namespace App\Filament\Admin\Resources\TransportBookingResource\Pages;

use App\Filament\Admin\Resources\TransportBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransportBooking extends EditRecord
{
    protected static string $resource = TransportBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
