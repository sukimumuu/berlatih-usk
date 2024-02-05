<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $list = Produk::all();
        return view('product.product-index',compact('list'), [
            'title' => 'Toko Komputer - Beranda'
        ]);
    }

    public function create(){
        return view('product.product-create', [
            'title' => 'Toko Komputer - Tambah Barang Baru'
        ]);
    }

    protected function store(Request $req){
        $validator = $req->validate([
            'nama_produk' => 'required|max:255|string',
            'stok' => 'required|numeric',
            'type' => 'required',
            'harga' => 'required|numeric',
        ]);

        $namaProduk = $req->input('nama_produk');
        $stok = $req->input('stok');
        $type = $req->input('type');
        $harga = $req->input('harga');

        $idBarang = "ID-BRG-".strtoupper(substr($type, 0, 2) . substr($namaProduk,0,3));
        $product = new Produk();
        $product->nama_produk = $namaProduk;
        $product->stok = $stok;
        $product->type = $type;
        $product->harga = $harga;
        $product->id_barang = $idBarang;
        $product->save();

        return redirect()->route('product-index')->with('success', 'Barang Baru Berhasil Ditambahkan !');
    }

    protected function destroy($id){
        Produk::find($id)->delete();
        return back()->with('success', 'Barang Berhasil Dihapus !');
    }

    public function edit($id){
        $data = Produk::find($id);
        return view('product.product-edit', compact('data'), [
            'title' => 'Toko Komputer - Edit Data Barang'
        ]);
    }

    public function update(Request $req, $id){
        $data = $req->all();
        $product = Produk::find($id);
        $product->update($data);
        return redirect()->route('product-index')->with('success', 'Data Barang Berhasil Diubah !');

    }
}
