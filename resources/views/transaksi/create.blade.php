@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('transaksi') }}" class="form-horizontal"> @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">ID Penjualan</label>
                    <div class="col-11">
                        <select class="form-control" id="penjualan_id" name="penjualan_id" required>
                            <option value="">- Pilih ID Penjualan -</option>
                            @foreach ($penjualan as $item)
                                <option value="{{ $item->penjualan_id }}">{{ $item->penjualan_id }}</option>
                            @endforeach
                        </select> @error('penjualan_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Barang</label>
                    <div class="col-11">
                        <select class="form-control" id="barang_id" name="barang_id" required>
                            <option value="">- Pilih Nama Barang -</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                            @endforeach
                        </select> @error('barang_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Harga</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="harga" name="harga"
                            value="{{ old('harga') }}" required>
                        @error('harga')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jumlah</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="jumlah" name="jumlah"
                            value="{{ old('jumlah') }}" required>
                        @error('jumlah')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('transaksi') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection @push('css')
    @endpush @push('js')
@endpush