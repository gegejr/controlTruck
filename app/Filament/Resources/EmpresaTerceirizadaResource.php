<?php

namespace App\Filament\Resources;

use App\Models\EmpresaTerceirizada;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\EmpresaTerceirizadaResource\Pages;

class EmpresaTerceirizadaResource extends Resource
{
    protected static ?string $model = EmpresaTerceirizada::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Empresas Terceirizadas';
    protected static ?string $modelLabel = 'Empresa Terceirizada';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nome')
                ->label('Nome da Empresa')
                ->required(),

            Forms\Components\TextInput::make('nome_resposnavel')
                ->label('Nome do Responsável'),

            Forms\Components\TextInput::make('telefone')
                ->label('Telefone'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')->label('Empresa')->searchable(),
                Tables\Columns\TextColumn::make('nome_resposnavel')->label('Responsável'),
                Tables\Columns\TextColumn::make('telefone')->label('Telefone'),
            ])
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
            'index' => Pages\ListEmpresaTerceirizadas::route('/'),
            'create' => Pages\CreateEmpresaTerceirizada::route('/create'),
            'edit' => Pages\EditEmpresaTerceirizada::route('/{record}/edit'),
        ];
    }
}
