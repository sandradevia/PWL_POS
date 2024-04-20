<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'LTP01',
                'barang_nama' => 'Laptop',
                'harga_beli' => 15000000,
                'harga_jual' => 20000000
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'HNP01',
                'barang_nama' => 'Handphone',
                'harga_beli' => 6000000,
                'harga_jual' => 9000000
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'KMJ01',
                'barang_nama' => 'Kemeja',
                'harga_beli' => 300000,
                'harga_jual' => 375000
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'CLN01',
                'barang_nama' => 'Celana',
                'harga_beli' => 250000,
                'harga_jual' => 300000
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'PZA01',
                'barang_nama' => 'Pizza',
                'harga_beli' => 40000,
                'harga_jual' => 45000
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'BRG01',
                'barang_nama' => 'Burger',
                'harga_beli' => 20000,
                'harga_jual' => 25000
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'PSL01',
                'barang_nama' => 'Pensil',
                'harga_beli' => 2500,
                'harga_jual' => 3500
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'BLP01',
                'barang_nama' => 'Bolpoin',
                'harga_beli' => 3000,
                'harga_jual' => 4500
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'LPT01',
                'barang_nama' => 'Liptint',
                'harga_beli' => 45000,
                'harga_jual' => 55000
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'MKR01',
                'barang_nama' => 'Maskara',
                'harga_beli' => 60000,
                'harga_jual' => 75000
            ]
        ];
        DB::table('m_barang')->insert($data);
    }
}
