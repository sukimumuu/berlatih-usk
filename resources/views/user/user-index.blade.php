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
                    <a href="{{ route('user-create') }}"><button class="btn btn-success mt-3">Akun baru +</button></a>
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Level</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                     @foreach ($data as $item)
                         <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->level }}</td>
                            <td>
                              <a href="{{ route('user-edit', ['id' => $item->id]) }}"><i class="fas fa-edit text-warning"></i></a>
                              <a href="{{ route('user-destroy', ['id' => $item->id]) }}" onclick="return confirm('Yakin akan menghapus data dengan ID {{ $item->id }} dengan nama {{ $item->name }} ?')"><i class="fas fa-trash text-danger"></i></a>
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