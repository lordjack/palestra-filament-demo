<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $modelLabel = "Produto";
    protected static ?string $pluralLabel = "Produtos";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Principais')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__("Nome"))
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label(__("Descrição"))
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->label(__("Preço"))
                                    ->numeric()
                                    ->prefix('R$'),
                                Forms\Components\Toggle::make('active')
                                    ->label(__("Ativo"))
                                    ->required(),
                            ]),
                    ])->columnSpan(2),
                Forms\Components\Section::make('Imagem')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label(__("Imagem"))
                            ->helperText('Imagem deve jpg, jpeg ou png.')
                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                            ->imageEditor(),
                    ])
                    ->columnSpan(1)
                    ->collapsible(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Imagem"))
                    ->circular()
                    ->width(90)
                    ->height(80),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Nome"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__("Preço"))
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->label(__("Ativo"))
                    ->boolean(),
            ])
            ->filters([
                Filter::make('active')
                    ->label(__("Ativo"))
                    ->query(fn (Builder $query): Builder => $query->where('active', true))
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
