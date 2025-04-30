<?php

namespace App\Filament\Resources\EmpresaTerceirizadaResource\Pages;

use App\Filament\Resources\EmpresaTerceirizadaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmpresaTerceirizadas extends ListRecords
{
    protected static string $resource = EmpresaTerceirizadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
