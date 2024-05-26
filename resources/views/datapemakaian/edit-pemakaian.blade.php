@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'page title here')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Edit data pemakaian</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('datapemakaian')}}" class="btn btn-primary btn-sm">
                        <i class="ion-arrow-left-a"></i> Back to data pemakaian
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{ route('update-pemakaian') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <input type="hidden" name="id" value="{{ $pemakaian->id }}">
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
                            <input type="text" class="form-control" name="kode_barang" value="{{ $pemakaian->kode_barang }}" readonly>
                            @error('kode_barang')
                            <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Nama barang</label>
                            <input type="text" class="form-control" name="nama_barang" value="{{ $pemakaian->nama_barang }}" readonly>
                            @error('nama_barang')
                            <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Jumlah Pakai</label>
                            <input type="text" class="form-control" name="jumlah_pakai" value="{{ $pemakaian->jumlah_pakai }}">
                            @error('jumlah_pakai')
                            <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Tanggal pakai</label>
                            <input type="date" class="form-control" name="tanggal_pakai" value="{{ $pemakaian->tanggal_pakai }}">
                            @error('tanggal_pakai')
                            <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Pemakaian</label>
                            <input type="text" class="form-control" name="pemakaian" value="{{ $pemakaian->pemakaian }}">
                            @error('pemakaian')
                            <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Ruangan</label>
                            <select name="ruangan_id" id="" class="form-control">
                                @foreach($ruangan as $item)
                                <option value="{{$item->id}}" {{$pemakaian->ruangan_id == $item->id ? 'selected' : '' }}>{{$item->ruangan}}</option>
                            @endforeach
                            </select>
                            @error('ruangan_id')
                            <span class="text-danger ml-2">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="{{ $pemakaian->keterangan }}">
                            @error('keterangan')
                            <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
