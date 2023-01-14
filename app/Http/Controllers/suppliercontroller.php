<?php

namespace App\Http\Controllers;

use App\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class suppliercontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = supplier::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Supplier',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_supplier'   => 'required',
            'nama_supplier' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = supplier::create([
                'kode_supplier'   => $request->input('kode_supplier'),
                'nama_supplier' => $request->input('nama_supplier'),
                'telepon' => $request->input('telepon'),
                'alamat' => $request->input('alamat'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Supplier Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Supplier Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = supplier::where('kode_supplier', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Menu Supplier!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Supplier Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_supplier'   => 'required',
            'nama_supplier' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = supplier::where('kode_supplier', $id)->update([
                'kode_supplier'   => $request->input('kode_supplier'),
                'nama_supplier' => $request->input('nama_supplier'),
                'telepon' => $request->input('telepon'),
                'alamat' => $request->input('alamat'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Supplier Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Supplier Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}