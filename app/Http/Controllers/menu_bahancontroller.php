<?php

namespace App\Http\Controllers;

use App\menu_bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class menu_bahancontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = menu_bahan::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Menu_Bahan',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_menu'   => 'required',
            'kode_bahan' => 'required',
            'jumlah' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = menu_bahan::create([
                'kode_menu'   => $request->input('kode_menu'),
                'kode_bahan' => $request->input('kode_bahan'),
                'jumlah' => $request->input('jumlah'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu Bahan Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu Bahan Gagal Disimpan!',
                ], 400);
            }
    
        }
    }   

    //GET ID DATA
    public function getid($id)
    {
       $post = menu_bahan::where('kode_menu', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Menu Bahan!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Menu Bahan Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_menu'   => 'required',
            'kode_bahan' => 'required',
            'jumlah' => 'required',

        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = menu_bahan::where('kode_menu', $id)->update([
                'kode_menu'   => $request->input('kode_menu'),
                'kode_bahan' => $request->input('kode_bahan'),
                'jumlah' => $request->input('jumlah'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu Bahan Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu Bahan Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}