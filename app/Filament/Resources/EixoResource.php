<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EixoResource\Pages;
use App\Filament\Resources\EixoResource\RelationManagers;
use App\Models\Eixo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class EixoResource extends Resource
{
    protected static ?string $navigationLabel = 'Eixos';
    protected static ?string $modelLabel = 'Eixo';
    protected static ?string $model = Eixo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('caminhao_id')
                ->label('Caminhão')
                ->relationship('caminhao', 'placa')
                ->required()
                ->searchable()
                ->preload(),

            TextInput::make('eixo_numero')
                ->label('Número do Eixo')
                ->numeric()
                ->required(),

            Select::make('lado')
                ->label('Lado')
                ->options([
                    'esquerdo' => 'Esquerdo',
                    'direito' => 'Direito',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('caminhao.placa')->label('Placa do Caminhão'),
                TextColumn::make('eixo_numero')->label('Número do Eixo'),
                TextColumn::make('lado')->label('Lado'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEixos::route('/'),
            'create' => Pages\CreateEixo::route('/create'),
            'edit' => Pages\EditEixo::route('/{record}/edit'),
        ];
    }
}
