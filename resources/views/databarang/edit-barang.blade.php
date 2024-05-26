@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'page title here')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Edit barang</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('databarang')}}" class="btn btn-primary btn-sm">
                        <i class="ion-arrow-left-a"></i> Back to data barang
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{route('update-barang',['id' => $barang->id])}}" method="POST" enctype="multipart/form-data" class="mt-3">
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
                            <input type="text" class="form-control" name="kode_barang" placeholder="Masukkan kode barang"   value="{{$barang->kode_barang}}" readonly>
                            @error('kode_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Nama barang</label>
                            <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan nama barang"   value="{{$barang->nama_barang}}">
                            @error('nama_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Jenis Barang</label>
                            <input type="text" class="form-control" name="jenis_barang" placeholder="Masukkan jenis barang"   value="{{$barang->jenis_barang}}">
                            @error('jenis_barang')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" placeholder="Masukkan jumlah barang"   value="{{$barang->jumlah}}">
                            @error('jumlah')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" class="form-control" name="harga" placeholder="Masukkan harga barang"   value="{{$barang->harga}}">
                            @error('harga')
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
