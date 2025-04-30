<?php

namespace App\Filament\Resources\EmpresaTerceirizadaResource\Pages;

use App\Filament\Resources\EmpresaTerceirizadaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmpresaTerceirizada extends EditRecord
{
    protected static string $resource = EmpresaTerceirizadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
