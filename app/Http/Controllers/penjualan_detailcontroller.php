<?php

namespace App\Http\Controllers;

use App\penjualan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class penjualan_detailcontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = penjualan_detail::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Penjualan_Detail',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_penjualan'   => 'required',
            'kode_menu' => 'required',
            'jumlah' => 'required',
            'subtotal' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = penjualan_detail::create([
                'kode_penjualan'   => $request->input('kode_penjualan'),
                'kode_menu' => $request->input('kode_menu'),
                'jumlah' => $request->input('jumlah'),
                'subtotal' => $request->input('subtotal'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Penjualan Detail Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Penjualan Detail Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = penjualan_detail::where('kode_penjualan', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Penjualan Detail!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Penjualan Detail Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_penjualan'   => 'required',
            'kode_menu' => 'required',
            'jumlah' => 'required',
            'subtotal' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = penjualan_detail::where('kode_penjualan', $id)->update([
                'kode_penjualan'   => $request->input('kode_penjualan'),
                'kode_menu' => $request->input('kode_menu'),
                'jumlah' => $request->input('jumlah'),
                'subtotal' => $request->input('subtotal'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Penjualan Detail Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Penjualan Detail Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}