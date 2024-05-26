@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'page title here')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h3>Inventaris</h3>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Inventaris
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            {{-- <a href="" class="btn btn-primary"></a> --}}
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        No
                                    </th>
                                    <th scope="col">
                                        Kode Barang
                                    </th>
                                    <th scope="col">
                                        Jenis Barang
                                    </th>
                                    <th scope="col">
                                        Jumlah
                                    </th>
                                    <th scope="col">
                                        Tanggal Pembelian
                                    </th>
                                    <th scope="col">
                                        Tanggal Pemakaian
                                    </th>
                                    <th scope="col">
                                        Penggunaan
                                    </th>
                                    <th scope="col">
                                        Ruang
                                    </th>
                                    <th scope="col">
                                        Keterangan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($dataPembelian); $i++)
                                    <tr>
                                        <th scope="row">
                                            {{$i + 1}}
                                        </th>
                                        <td>
                                            {{$dataPembelian[$i]->kode_barang}}
                                        </td>
                                        <td>
                                            {{$dataPembelian[$i]->jenis_barang}}
                                        </td>
                                        <td>
                                            {{$dataPembelian[$i]->jumlah}}
                                        </td>
                                        <td>
                                            {{$dataPembelian[$i]->tanggal_pembelian}}
                                        </td>
                                        <td>
                                            {{$dataPemakaian[$i]->tanggal_pakai ?? 'N/A'}}
                                        </td>
                                        <td>
                                            {{$dataPemakaian[$i]->pemakaian ?? 'N/A'}}
                                        </td>
                                        <td>
                                            {{$dataPemakaian[$i]->ruangan ?? 'N/A'}}
                                        </td>
                                        <td>
                                            {{$dataPemakaian[$i]->keterangan ?? 'N/A'}}
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection