<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Data Table Simple</h4>
						</div>
						<div class="pb-20">
							<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
								<thead>
									<tr role="row">
                                        <th class="table-plus datatable-nosort sorting_disabled" rowspan="1" colspan="1" aria-label="No">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="kode barang: activate to sort column ascending">Kode barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Office</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama barang: activate to sort column descending" aria-sort="ascending">Nama barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Jumlah pakai: activate to sort column ascending">jumlah pakai</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Jumlah pakai: activate to sort column ascending">tanggal pakai pakai</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Jumlah pakai: activate to sort column ascending">pemakaian</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Jumlah pakai: activate to sort column ascending">ruang</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Jumlah pakai: activate to sort column ascending">keterangan</th>
                                        <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1" aria-label="Action">Action</th></tr>
								</thead>
								<tbody>
                                    @foreach($data as $d)
								<tr role="row" class="odd">
                                    <th scope="row">
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$d->kode_barang}}
                                    </td>
                                    <td>
                                        {{$d->nama_barang}}
                                    </td>
                                    <td>
                                        {{$d->jumlah_pakai}}
                                    </td>
                                    <td>
                                        {{$d->tanggal_pakai}}
                                    </td>
                                    <td>
                                        {{$d->pemakaian}}
                                    </td>
                                    <td>
                                        {{$d->ruangan}}
                                    </td>
                                    <td>
                                        {{$d->keterangan}}
                                    </td>
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="{{route('edit-pemakaian',['id' => $d->id])}}"><i class="dw dw-edit2"></i> Edit</a>
													<button class="dropdown-item btn-delete" data-id="{{ $d->id }}" style="border:none;background:none;">
                                                        <i class="dw dw-delete-3"></i>
                                                    </button>
												</div>
											</div>
										</td>
									</tr>
                                    @endforeach
                                </tbody>
							</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">1-10 of 12 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link"><i class="ion-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link"><i class="ion-chevron-right"></i></a></li></ul></div></div></div></div>
						</div>
					</div>