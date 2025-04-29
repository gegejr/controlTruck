<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\UserResource\Pages;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Motoristas';
    protected static ?string $modelLabel = 'Motorista';

    public static function getEloquentQuery(): Builder
    {
        // Exibe apenas motoristas
        return parent::getEloquentQuery()->motoristas();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Nome')
                ->required(),

            TextInput::make('email')
                ->label('E-mail')
                ->email()
                ->required(),

            TextInput::make('password')
                ->label('Senha')
                ->password()
                ->required()
                ->dehydrated(fn ($state) => filled($state))
                ->visibleOn('create'),

            Select::make('caminhao_id')
                ->label('Caminhão')
                ->relationship('caminhao', 'placa')
                ->preload()
                ->searchable()
                ->required()
                ->visible(fn ($get) => $get('role') === 'motorista')
                ->required(fn ($get) => $get('role') === 'motorista'),

            Select::make('role')
                ->label('Tipo de Usuário')
                ->default('motorista')
                ->hidden(), // evita edição manual via painel
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nome'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('caminhao.placa')->label('Caminhão'),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
