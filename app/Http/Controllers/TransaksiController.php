<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiDataTable;
use App\Models\BarangModel;
use App\Models\PenjualanModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransaksiController extends Controller
{
    public function index(TransaksiDataTable $dataTable)
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi',
            'list'  => ['Home', 'Transaksi']
        ];

        $page = (object) [
            'title' => 'Daftar transaksi yang terdaftar dalam sistem'
        ];

        $activeMenu = 'transaksi';

        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();

        return view('transaksi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $transaksi = TransaksiModel::select('detail_id', 'penjualan_id', 'barang_id', 'harga', 'jumlah')
            ->with('penjualan')
            ->with('barang');

        if ($request->penjualan_id) {
            $transaksi->where('penjualan_id', $request->penjualan_id);
        }

        if ($request->barang_id) {
            $transaksi->where('barang_id', $request->barang_id);
        }

        return DataTables::of($transaksi)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($transaksi) { 
                $btn = '<a href="' . url('/transaksi/' . $transaksi->detail_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/transaksi/' . $transaksi->detail_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/transaksi/' . $transaksi->detail_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) 
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi',
            'list'  => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah transaksi baru'
        ];

        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();
        $activeMenu = 'transaksi'; 

        return view('transaksi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id'         => 'required|integer',
            'barang_id'            => 'required|integer',
            'harga'                => 'required|integer',
            'jumlah'               => 'required|integer'
        ]);

        TransaksiModel::create([
            'penjualan_id'         => $request->penjualan_id,
            'barang_id'            => $request->barang_id,
            'harga'                => $request->harga,
            'jumlah'               => $request->jumlah
        ]);

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil disimpan');
    }

    public function show(string $id)
    {
        $transaksi = TransaksiModel::with('penjualan')->find($id);
        $transaksi = TransaksiModel::with('barang')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Transaksi',
            'list'  => ['Home', 'Transaksi', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $transaksi = TransaksiModel::find($id);
        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Transaksi',
            'list' => ['Home', 'Transaksi', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'penjualan' => $penjualan, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'penjualan_id'         => 'required|integer',
            'barang_id'            => 'required|integer',
            'harga'                => 'required|integer',
            'jumlah'               => 'required|integer'
        ]);

        TransaksiModel::find($id)->update([
            'penjualan_id'         => $request->penjualan_id,
            'barang_id'            => $request->barang_id,
            'harga'                => $request->harga,
            'jumlah'               => $request->jumlah
        ]);

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = TransaksiModel::find($id);
        if (!$check) { 
            return redirect('/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        try {
            TransaksiModel::destroy($id); 

            return redirect('/transaksi')->with('success', 'Data transaksi berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi')->with('error', 'Data transaksi gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}