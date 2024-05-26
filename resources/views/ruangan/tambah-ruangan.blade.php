@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'page title here')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Tambah data ruangan</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('ruangan')}}" class="btn btn-primary btn-sm">
                        <i class="ion-arrow-left-a"></i> Back to data ruangan
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{route('simpan-ruangan')}}" method="POST" enctype="multipart/form-data" class="mt-3">
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
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Ruangan</label>
                            <input type="text" class="form-control" name="ruangan" placeholder="Masukkan nama ruangan" value="{{old('ruangan')}}">
                            @error('nama_barang')
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
