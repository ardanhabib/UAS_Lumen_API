<?php

namespace App\Http\Controllers;

use App\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class menucontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = menu::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Menu',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_menu'   => 'required',
            'kategori' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = menu::create([
                'kode_menu'   => $request->input('kode_menu'),
                'kategori' => $request->input('kategori'),
                'nama_menu' => $request->input('nama_menu'),
                'harga' => $request->input('harga'),
                'stok' => $request->input('stok'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = menu::where('kode_menu', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Menu!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Menu Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_menu'   => 'required',
            'kategori' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = menu::where('kode_menu', $id)->update([
                'kode_menu'   => $request->input('kode_menu'),
                'kategori' => $request->input('kategori'),
                'nama_menu' => $request->input('nama_menu'),
                'harga' => $request->input('harga'),
                'stok' => $request->input('stok'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}