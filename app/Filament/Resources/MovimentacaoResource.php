<?php

namespace App\Filament\Resources;

use App\Models\Movimentacao;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\MovimentacaoResource\Pages;

class MovimentacaoResource extends Resource
{
    protected static ?string $model = Movimentacao::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';
    protected static ?string $navigationLabel = 'Movimentações';
    protected static ?string $modelLabel = 'Movimentação';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('motorista_id')
                ->label('Motorista')
                ->relationship('motorista', 'name')
                ->searchable()
                ->required(),

            Select::make('caminhao_id')
                ->label('Caminhão')
                ->relationship('caminhao', 'placa')
                ->searchable()
                ->required(),

            Select::make('eixo_id')
                ->label('Eixo')
                ->relationship('eixo', 'eixo_numero')
                ->required(),

            Select::make('pneu_id')
                ->label('Pneu')
                ->relationship('pneu', 'descricao') // ajuste conforme seu campo identificador
                ->required(),

            Select::make('empresa_terceirizada_id')
                ->label('Empresa Terceirizada')
                ->relationship('empresaTerceirizada', 'nome')
                ->searchable()
                ->nullable(),

            Select::make('tipo_movimentacao')
                ->label('Tipo de Movimentação')
                ->options([
                    'troca' => 'Troca',
                    'recapagem' => 'Recapagem',
                    'descarte' => 'Descarte',
                    'compra' => 'Compra',
                ])
                ->required(),

            DatePicker::make('data_movimentacao')
                ->label('Data')
                ->required(),

            Textarea::make('observacoes')
                ->label('Observações')
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('motorista.name')->label('Motorista')->searchable(),
                TextColumn::make('caminhao.placa')->label('Caminhão'),
                TextColumn::make('eixo.eixo_numero')->label('Eixo'),
                TextColumn::make('pneu.descricai')->label('Pneu'),
                TextColumn::make('tipo_movimentacao')->label('Tipo'),
                TextColumn::make('data_movimentacao')->label('Data')->date(),
            ])
            ->defaultSort('data_movimentacao', 'desc')
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
            'index' => Pages\ListMovimentacaos::route('/'),
            'create' => Pages\CreateMovimentacao::route('/create'),
            'edit' => Pages\EditMovimentacao::route('/{record}/edit'),
        ];
    }
}
