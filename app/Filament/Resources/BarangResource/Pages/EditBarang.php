<?php

namespace App\Filament\Resources\BarangResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\BarangResource;

class EditBarang extends EditRecord
{
    protected static string $resource = BarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required(),
                TextInput::make('jumlah_barang')
                    ->label('Jumlah Barang')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                TextInput::make('harga_per_unit')
                    ->label('Harga per Unit')
                    ->required()
                    ->numeric()
                    ->minValue(100),
                DatePicker::make('tanggal_masuk')
                    ->label('Tanggal Masuk')
                    ->beforeOrEqual(now()) // Tanggal harus sebelum atau sama dengan hari ini>beforeOrEqual(now()) // Tanggal harus sebelum atau sama dengan hari ini
                    ->required(),
                Select::make('kategori_barang')
                    ->options([
                        'Elektronik' => 'Elektronik',
                        'Pakaian' => 'Pakaian',
                        'Makanan' => 'Makanan',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required() // Field wajib diisi
                    ->label('Kategori Barang'),
            ]);
    }
}
