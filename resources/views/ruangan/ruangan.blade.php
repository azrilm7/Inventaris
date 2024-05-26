@extends('back.layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'page title here')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h3>Data Ruang</h3>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Data Ruang
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <a href="{{route('tambah-ruangan')}}" class="btn btn-primary">Tambah data ruangan</a>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                @if(session('success-delete'))
                    <div class="alert alert-success">
                        {!! session('success-delete') !!}
                    </div>
                @endif

                @if(session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                
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
                                        Ruang
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <th scope="row">
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$d->ruangan}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{route('edit-ruangan',['id' => $d->id])}}"><i class="dw dw-edit2"></i> Edit</a>
                                                <button class="dropdown-item btn-delete" data-id="{{ $d->id }}" style="border:none;background:none;">
                                                    <i class="dw dw-delete-3">Delete</i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data ini akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var form = document.createElement('form');
                        form.setAttribute('method', 'POST');
                        form.setAttribute('action', '/ruangan/delete/' + id);

                        var csrfField = document.createElement('input');
                        csrfField.setAttribute('type', 'hidden');
                        csrfField.setAttribute('name', '_token');
                        csrfField.setAttribute('value', '{{ csrf_token() }}');

                        var methodField = document.createElement('input');
                        methodField.setAttribute('type', 'hidden');
                        methodField.setAttribute('name', '_method');
                        methodField.setAttribute('value', 'DELETE');

                        form.appendChild(csrfField);
                        form.appendChild(methodField);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
