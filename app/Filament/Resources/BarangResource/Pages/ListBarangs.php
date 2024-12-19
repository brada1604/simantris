<?php

namespace App\Filament\Resources\BarangResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use App\Filament\Resources\BarangResource;

class ListBarangs extends ListRecords
{
    protected static string $resource = BarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public  function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')->label('Nama Barang'),
                TextColumn::make('jumlah_barang')->label('Jumlah Barang'),
                TextColumn::make('harga_per_unit')
                    ->label('Harga per Unit')
                    ->money('IDR'), // Format sebagai uang
                TextColumn::make('tanggal_masuk')->label('Tanggal Masuk'),
                TextColumn::make('kategori_barang')->label('Kategori Barang'),
                // TextColumn::make('harga_total')
                //     ->label('Harga Total')
                //     ->formatStateUsing(function ($record) {
                //         // return 'Rp' . number_format($record->jumlah_barang * $record->harga_per_unit, 0, ',', '.');
                //         return $record->jumlah_barang * $record->harga_per_unit;
                //     })
                //     ->sortable(),
                TextColumn::make('harga_total')
                    ->label('Harga Total')
                    ->formatStateUsing(fn ($record) => 'Rp' . number_format($record->harga_total, 0, ',', '.')),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                ViewAction::make(),
            ]);
    }
}
