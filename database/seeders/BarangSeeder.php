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
        $data =[
            [
                'barang_id'=> 1,
                'kategori_id'=> 3,
                'barang_kode'=> 1,
                'barang_nama'=> 'Dres',
                'harga_beli'=>200000,
                'harga_jual'=>350000,
            ],
            [
                'barang_id'=> 2,
                'kategori_id'=> 1,
                'barang_kode'=> 2,
                'barang_nama'=> 'Mie Instan',
                'harga_beli'=>2000,
                'harga_jual'=>3000,
            ],
            [
                'barang_id'=> 3,
                'kategori_id'=> 1,
                'barang_kode'=> 3,
                'barang_nama'=> 'Keju',
                'harga_beli'=>7000,
                'harga_jual'=>8000,
            ],
            [
                'barang_id'=> 4,
                'kategori_id'=> 2,
                'barang_kode'=> 4,
                'barang_nama'=> 'Coca Cola',
                'harga_beli'=>2500,
                'harga_jual'=>3500,
            ],
            [
                'barang_id'=> 5,
                'kategori_id'=> 2,
                'barang_kode'=> 5,
                'barang_nama'=> 'Kopi',
                'harga_beli'=>4000,
                'harga_jual'=>5000,
            ],
            [
                'barang_id'=> 6,
                'kategori_id'=> 2,
                'barang_kode'=> 6,
                'barang_nama'=> 'Susu',
                'harga_beli'=>13000,
                'harga_jual'=>15000,
            ],
            [
                'barang_id'=> 7,
                'kategori_id'=> 5,
                'barang_kode'=> 7,
                'barang_nama'=> 'Sepatu Lari',
                'harga_beli'=>400000,
                'harga_jual'=>450000,
            ],
            [
                'barang_id'=> 8,
                'kategori_id'=> 5,
                'barang_kode'=> 8,
                'barang_nama'=> 'Sepatu Futsal',
                'harga_beli'=>600000,
                'harga_jual'=>650000,
            ],
            [
                'barang_id'=> 9,
                'kategori_id'=> 4,
                'barang_kode'=> 9,
                'barang_nama'=> 'Buku',
                'harga_beli'=> 7500,
                'harga_jual'=> 8000,
            ],
            [
                'barang_id'=> 10,
                'kategori_id'=> 4,
                'barang_kode'=> 10,
                'barang_nama'=> 'Pensil',
                'harga_beli'=> 2500,
                'harga_jual'=> 3000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
