<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show_category() {
        $categories = DB::table('products_category')->get();
        return view('category', compact('categories'));
    }

    public function add_category(request $request)
    {

        $tgl = Date('Y-m-d');


        $response = DB::table('products_category')->insert([

            // 'gambar_career' => $path_mtools,
            'nama_kategori' => $request->nama_kategori,
            'created_at' => $tgl,
            'updated_at' => $tgl

        ]);

        return redirect('category');
    }

    public function category_id($id)
    {
        $response = DB::table('products_category')
            ->select('*')
            ->where('kategori_id', $id)
            ->get();

        // dd($response);
        return view('edit_category', compact('response'));
    }


 public function edit_category(Request $request, $id)
    {
        $tgl = Date('Y-m-d');

        $nama_kategori = $request->nama_kategori;
        $created_at = $request->$tgl;

        $response = DB::table('products_category')
            ->where('kategori_id', $id)
            ->update([
                'nama_kategori' => $nama_kategori,
                'updated_at' => $tgl
            ]);

        return redirect('category')->with('status_ok', 'Update Success!');
    }


    public function delete_category($id)
    {
        $delete = DB::table('products_category')
            ->where('kategori_id', $id)
            ->delete();
        return redirect('category')->with('status_ok', 'Data berhasil dihapus.');
    }
}
