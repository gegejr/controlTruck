<?php

namespace App\Filament\Resources\EixoResource\Pages;

use App\Filament\Resources\EixoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEixos extends ListRecords
{
    protected static string $resource = EixoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
