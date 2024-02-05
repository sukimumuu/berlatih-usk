@extends('layout.master')
@section('content')
            @if(session('success'))
                <div class="alert alert-success alert-fixed-top" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
            @endif
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Barang Toko Komputer</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <a href="{{ route('product-create') }}"><button class="btn btn-success mt-3">Barang baru +</button></a>
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID-BARANG</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                      <th>Type</th>
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                     @foreach ($list as $item)
                         <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->id_barang }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>@if($item->type === 'input')
                                  INPUTAN
                                @elseif ($item->type === 'output')
                                  OUTPUTAN
                                @endif
                            </td>
                            <td>{{ $item->harga }}</td>
                            <td>
                              <a href="{{ route('product-edit', ['id' => $item->id]) }}"><i class="fas fa-edit text-warning"></i></a>
                              <a href="{{ route('product-destroy', ['id' => $item->id]) }}" onclick="return confirm('Yakin akan menghapus data dengan ID {{ $item->id_barang }} dengan nama {{ $item->nama_produk }} ?')"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                         </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div> 
@endsection