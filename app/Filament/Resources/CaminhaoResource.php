<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaminhaoResource\Pages;
use App\Models\Caminhao;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class CaminhaoResource extends Resource
{
    protected static ?string $model = Caminhao::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('placa')
                ->label('Placa')
                ->required()
                ->unique(),

            Forms\Components\TextInput::make('modelo')
                ->required(),

            Forms\Components\TextInput::make('marca'),

            Forms\Components\TextInput::make('cor'),

            Forms\Components\TextInput::make('ano')
                ->numeric()
                ->minValue(1900)
                ->maxValue(date('Y') + 1),

            Forms\Components\Repeater::make('eixos')
                ->label('Eixos')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('eixo_numero')
                        ->label('Número do Eixo')
                        ->numeric()
                        ->required(),

                    Forms\Components\Select::make('lado')
                        ->label('Lado')
                        ->options([
                            'esquerdo' => 'Esquerdo',
                            'direito' => 'Direito',
                        ])
                        ->required(),
                ])
                ->defaultItems(0)
                ->columns(2)
                ->collapsible(),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('placa')->searchable(),
            Tables\Columns\TextColumn::make('modelo'),
            Tables\Columns\TextColumn::make('marca'),
            Tables\Columns\TextColumn::make('cor'),
            Tables\Columns\TextColumn::make('ano'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Criado em'),
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
            'index' => Pages\ManageCaminhoes::route('/'),
        ];
    }
}
