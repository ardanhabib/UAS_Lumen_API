<?php

namespace App\Http\Controllers;

use App\bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class bahancontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = bahan::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Bahan',
            'data'    => $posts
        ], 200);
    }
    
    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_bahan'   => 'required',
            'nama_bahan' => 'required',
            'minimum' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'kode_supplier' => 'required',
            'berat' => 'required',
            'satuan_berat' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = bahan::create([
                'kode_bahan'   => $request->input('kode_bahan'),
                'nama_bahan' => $request->input('nama_bahan'),
                'minimum' => $request->input('minimum'),
                'stok' => $request->input('stok'),
                'satuan' => $request->input('satuan'),
                'kode_supplier' => $request->input('kode_supplier'),
                'berat' => $request->input('berat'),
                'satuan_berat' => $request->input('satuan_berat'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Bahan Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Bahan Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = bahan::where('kode_bahan', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Bahan!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Bahan Tidak Ditemukan!',
           ], 404);
       }
    }
    
    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_bahan'   => 'required',
            'nama_bahan' => 'required',
            'minimum' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'kode_supplier' => 'required',
            'berat' => 'required',
            'satuan_berat' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = bahan::where('kode_bahan', $id)->update([
                'kode_bahan'   => $request->input('kode_bahan'),
                'nama_bahan' => $request->input('nama_bahan'),
                'minimum' => $request->input('minimum'),
                'stok' => $request->input('stok'),
                'satuan' => $request->input('satuan'),
                'kode_supplier' => $request->input('kode_supplier'),
                'berat' => $request->input('berat'),
                'satuan_berat' => $request->input('satuan_berat'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Bahan Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Bahan Gagal Diupdate!',
                ], 400);
            }
    
        }
    }

    //DELETE DATA
    public function del($id)
    {
        // $post = bahan::where('kode_bahan',$id)->first();
        // $post->delete();
        $query = "DELETE FROM bahan WHERE kode_bahan=".$id;
        if ($query) {
            return response()->json([
                'success' => true,
                'message' => 'Bahan Berhasil Dihapus!',
            ], 200);
        }
    
    }
}