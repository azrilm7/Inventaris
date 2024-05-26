@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'page title here')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Tambah data pemakaian</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('datapemakaian')}}" class="btn btn-primary btn-sm">
                        <i class="ion-arrow-left-a"></i> Back to data pemakaian
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{route('simpan-pemakaian')}}" method="POST" enctype="multipart/form-data" class="mt-3">
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
                            <label for="">Kode barang</label>
                            <select name="kode_barang" id="" class="form-control">
                                <option value="">not set</option>
                                @foreach($barang as $item)
                                <option value="{{$item->kode_barang}}" {{ old('kode_barang') == $item->id ? 'selected' : '' }}>{{$item->kode_barang}}</option>
                            @endforeach
                            </select>
                            @error('nama_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Nama barang</label>
                            <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan nama barang" value="{{old('nama_barang')}}" readonly>
                            @error('nama_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Jumlah Pakai</label>
                            <input type="text" class="form-control" name="jumlah_pakai" placeholder="Masukkan jumlah pakai"   value="{{old('jumlah_pakai')}}">
                            @error('jumlah_pakai')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Tanggal pakai</label>
                            <input type="date" class="form-control" name="tanggal_pakai" placeholder="Masukkan Tanggal pakai"   value="{{old('tanggal_pakai')}}">
                            @error('tanggal_pakai')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Pemakaian</label>
                            <input type="text" class="form-control" name="pemakaian" placeholder="Masukkan pemakaian"   value="{{old('pemakaian')}}">
                            @error('pemakaian')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Ruang</label>
                            <select name="ruangan" id="" class="form-control">
                                <option value="">not set</option>
                                @foreach($ruangan as $item)
                                <option value="{{$item->ruangan}}" {{ old('ruangan') == $item->id ? 'selected' : '' }}>{{$item->ruangan}}</option>
                            @endforeach
                            </select>
                            @error('ruangan')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Masukkan harga barang"   value="{{old('keterangan')}}">
                            @error('keterangan')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
