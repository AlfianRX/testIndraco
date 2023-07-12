<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function show_products(){
        $categories = DB::table('products_category')->get();
         $products = DB::table('products')
         ->join('products_category', 'products.kategori_produk', '=', 'products_category.kategori_id')
         ->get();

         return view('home', compact('products', 'categories'));
    }

    public function add_product(request $request)
    {
        // return $request->all();
        // return session('username');
        $tgl = Date('Y-m-d');

        $this->validate($request, [
            'gambar_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'nama_produk'=>'required',

        ]);


        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_produk');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/';
        $file->move($tujuan_upload, $nama_file);

        $path_mtools = $tujuan_upload . $nama_file;

        $response = DB::table('products')->insert([

            'gambar_produk' => $path_mtools,
            'nama_produk' => $request->nama_produk,
            'stock' => $request->stock,
            'deskripsi_produk' => $request->deskripsi_produk,
            'kategori_produk' => $request->kategori_produk,
            'harga_produk' => $request->harga_produk,
            'created_at' => $tgl,
            'updated_at' => $tgl

        ]);

        return redirect('home');
    }

    public function product_id($id) {
        $categories = DB::table('products_category')->get();

        $response = DB::table('products')
        ->select('*')
        ->where('id', $id)
        ->join('products_category', 'products.kategori_produk', '=', 'products_category.kategori_id')
        ->get();

        return view('edit_product', compact('response', 'categories'));
    }

    public function edit_product(Request $request, $id){
        $tgl = Date('Y-m-d');

        $gambar_produk_new = $request->gambar_produk_new;
        $nama_produk = $request->nama_produk;
        $stock = $request->stock;
        $deskripsi_produk = $request->deskripsi_produk;
        $kategori_produk = $request->kategori_produk;
        $harga_produk = $request->harga_produk;
        $created_at = $tgl;
        $updated_at = $tgl;

        if ($gambar_produk_new == ""){
            $response = DB::table('products')
                ->where('id', $id)
                ->update([
                    'nama_produk' => $request->nama_produk,
                    'stock' => $request->stock,
                    'deskripsi_produk' => $request->deskripsi_produk,
                    'kategori_produk' => $request->kategori_produk,
                    'harga_produk' => $request->harga_produk,
                    'created_at' => $tgl,
                    'updated_at' => $tgl
                ]);
        } else {
            $file = $request->file('gambar_produk_new');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images/';
            $file->move($tujuan_upload, $nama_file);

            $path_mtools = $tujuan_upload . $nama_file;

            $response = DB::table('products')
            ->where('id', $id)
            ->update([
                'gambar_produk' => $path_mtools,
                'nama_produk' => $request->nama_produk,
                'stock' => $request->stock,
                'deskripsi_produk' => $request->deskripsi_produk,
                'kategori_produk' => $request->kategori_produk,
                'harga_produk' => $request->harga_produk,
                'created_at' => $tgl,
                'updated_at' => $tgl

            ]);
        }
        return redirect('home')->with('status_ok', 'Update Sukses!');

    }

    public function delete_product($id)
    {
        $delete = DB::table('products')
            ->where('id', $id)
            ->delete();
        return redirect('home')->with('status_ok', 'Data berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $products = DB::table('products')
        ->where('nama_produk', 'like', "%" . $keyword . "%")->paginate(5);
        return view('home', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
