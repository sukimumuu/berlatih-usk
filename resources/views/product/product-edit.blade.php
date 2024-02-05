@extends('layout.master')
@section('content')
     <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Barang - Toko Komputer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('product-update', ['id' => $data->id]) }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ $data->nama_produk }}">
                    @error('nama_produk')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control" value="{{ $data->stok }}">
                    @error('stok')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select id="fruit" name="type" class="form-control">
                      <option value="">Pilih Type</option>
                      <option value="input" {{ $data->type == 'input' ? 'selected' : '' }}>Inputan</option>
                      <option value="output" {{ $data->type == 'output' ? 'selected' : '' }}>Ouputan</option>
                  </select>
                    @error('type')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" value="{{ $data->harga }}">
                    @error('harga')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection