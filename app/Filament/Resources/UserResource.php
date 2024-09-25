<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function canAccess(): bool
    {
        if (Auth::user()->usertype == 'admin') {
            return static::canViewAny();
        }

        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->placeholder('Masukkan Nama'),
                TextInput::make('email')
                    ->required(),
                Select::make('usertype')
                    ->label('Role')
                    ->required()
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ]),
                TextInput::make('password')
                    ->label('Password')
                    ->required()
                    ->placeholder('Masukkan Password')
                    ->password()
                    ->autocomplete('new-password'),
                CheckboxList::make('posts')
                    ->label('Akses Post')
                    ->relationship('posts', 'title')
                    ->columns(2)
                    ->helperText('Pilih post yang dapat diberi testimonial'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')

                    ->sortable(),
                TextColumn::make('email')

                    ->sortable(),
                TextColumn::make('usertype')
                    ->label('Role')

                    ->sortable(),
                TextColumn::make('posts.title')
                    ->label('Akses Testimonial')
                    ->sortable()

                    ->default('kosong')
                    ->formatStateUsing(fn($state) => $state ?? 'Kosong'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}