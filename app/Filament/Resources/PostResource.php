<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ImageUpload;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-window';

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
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->placeholder('Masukkan Judul'),
                Textarea::make('description')
                    ->label('Description')
                    ->rows(5)
                    ->required()
                    ->placeholder('Masukkan Deskripsi'),
                FileUpload::make('image_url') // Field di form Filament
                    ->label('Upload Image')
                    ->image()
                    ->required(),
                Select::make('category_id')
                    ->label('Category')
                    ->required()
                    ->options(
                        Categories::all()->pluck('name', 'id')->toArray()
                    ),
                TextInput::make('user_id')
                    ->label('User')
                    ->default(Auth::user()->id)
                    ->hidden(), // Hide the field instead of disabling it
                TextInput::make('slug')
                    ->label('Slug')
                    ->hidden(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')

                    ->sortable(),
                TextColumn::make('description')

                    ->sortable(),
                ImageColumn::make('image_url')

                    ->disk('public')
                    // ->directory('images')
                    ->sortable(),
                TextColumn::make('slug'),
                TextColumn::make('category.name')

                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Uploaded By')

                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}