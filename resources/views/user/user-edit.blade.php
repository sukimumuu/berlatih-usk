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
              <form id="quickForm" action="{{ route('user-update', ['id' => $data->id]) }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $data->email }}">
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Level Akun</label>
                    <select id="fruit" name="level" class="form-control">
                      <option value="">Pilih level</option>
                      <option value="admin" {{ $data->level == 'admin' ? 'selected' : '' }}>Admin</option>
                      <option value="user" {{ $data->level == 'user' ? 'selected' : '' }}>User</option>
                  </select>
                    @error('level')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="{{ $data->password }}">
                    @error('password')
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