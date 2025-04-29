<?php

namespace App\Filament\Resources\CaminhaoResource\Pages;

use App\Filament\Resources\CaminhaoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaminhaos extends ListRecords
{
    protected static string $resource = CaminhaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
