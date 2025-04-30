<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PneuResource\Pages;
use App\Models\Pneu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PneuResource extends Resource
{
    protected static ?string $model = Pneu::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Pneus';
    protected static ?string $modelLabel = 'Pneu';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('medida')
                ->required()
                ->label('Medida'),

            TextInput::make('marca')
                ->required()
                ->label('Marca'),

            TextInput::make('modelo')
                ->required()
                ->label('Modelo'),

            Select::make('tipo')
                ->required()
                ->label('Tipo')
                ->options([
                    'diagonal' => 'Diagonal',
                    'radial' => 'Radial',
                ]),

            Select::make('status')
                ->required()
                ->label('Status')
                ->options([
                    'novo' => 'Novo',
                    'usado' => 'Usado',
                    'recapado' => 'Recapado',
                    'descartado' => 'Descartado',
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('medida'),
                TextColumn::make('marca'),
                TextColumn::make('modelo'),
                TextColumn::make('tipo'),
                TextColumn::make('status'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPneus::route('/'),
            'create' => Pages\CreatePneu::route('/create'),
            'edit' => Pages\EditPneu::route('/{record}/edit'),
        ];
    }
}
