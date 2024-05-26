@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'page title here')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Tambah data pembelian</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('datapembelian')}}" class="btn btn-primary btn-sm">
                        <i class="ion-arrow-left-a"></i> Back to data pembelian
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{route('simpan-pembelian')}}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                @if(Session::get('success'))
                <div class="alert alert-success">
                    <strong><i class="dw dw-checked"></i></strong>
                    {!! Session::get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    <strong><i class="dw dw-checked"></i></strong>
                    {!! Session::get('fail') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <select name="kode_barang" id="kode_barang" class="form-control" onchange="syncNamaBarang()">
                                <option value="">Pilih Kode Barang</option>
                                @foreach($barang as $item)
                                    <option value="{{$item->kode_barang}}" {{ old('kode_barang') == $item->kode_barang ? 'selected' : '' }}>{{$item->kode_barang}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control mt-2" id="kode_barang_input" name="kode_barang_input" placeholder="Masukkan kode barang secara manual" value="{{ old('kode_barang_input') }}" oninput="disableSelect()">
                            @error('kode_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama barang akan otomatis terisi" value="{{ old('nama_barang') }}" readonly>
                            @error('nama_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="jenis_barang">Jenis Barang</label>
                            <input type="text" class="form-control" name="jenis_barang" placeholder="Masukkan jenis barang" value="{{ old('jenis_barang') }}">
                            @error('jenis_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="merk">Merk/Type</label>
                            <input type="text" class="form-control" name="merk" placeholder="Masukkan merk type" value="{{ old('merk') }}">
                            @error('merk')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah barang" value="{{ old('jumlah') }}" oninput="calculateTotal()">
                            @error('jumlah')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan harga barang" value="{{ old('harga') }}" oninput="calculateTotal()">
                            @error('harga')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" name="total" id="total" placeholder="total harga" value="{{ old('total') }}" readonly>
                            @error('total')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Tanggal pembelian</label>
                            <input type="date" class="form-control" name="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}">
                            @error('tanggal_pembelian')
                            <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>

<script>
    const barangData = @json($barang);

    function syncNamaBarang() {
        const kodeBarangSelect = document.getElementById('kode_barang');
        const namaBarangInput = document.getElementById('nama_barang');
        const kodeBarangInput = document.getElementById('kode_barang_input');

        if (kodeBarangSelect.value) {
            const selectedBarang = barangData.find(item => item.kode_barang === kodeBarangSelect.value);
            if (selectedBarang) {
                namaBarangInput.value = selectedBarang.nama_barang;
                kodeBarangInput.disabled = true;
            }
        } else {
            namaBarangInput.value = '';
            kodeBarangInput.disabled = false;
        }
    }

    function disableSelect() {
        const kodeBarangInput = document.getElementById('kode_barang_input');
        const kodeBarangSelect = document.getElementById('kode_barang');
        const namaBarangInput = document.getElementById('nama_barang');

        if (kodeBarangInput.value) {
            kodeBarangSelect.disabled = true;
            namaBarangInput.value = '';
            namaBarangInput.readOnly = false;
        } else {
            kodeBarangSelect.disabled = false;
            namaBarangInput.readOnly = true;
        }
    }

    function calculateTotal() {
        const jumlah = document.getElementById('jumlah').value;
        const harga = document.getElementById('harga').value;
        const total = jumlah * harga;
        document.getElementById('total').value = total;
    }
</script>
@endsection
