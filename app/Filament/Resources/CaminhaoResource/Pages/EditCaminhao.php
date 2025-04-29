<?php

namespace App\Filament\Resources\CaminhaoResource\Pages;

use App\Filament\Resources\CaminhaoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaminhao extends EditRecord
{
    protected static string $resource = CaminhaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
