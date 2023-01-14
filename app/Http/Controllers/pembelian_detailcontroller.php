<?php

namespace App\Http\Controllers;

use App\pembelian_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pembelian_detailcontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = pembelian_detail::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Pembelian_Detail',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembelian'   => 'required',
            'kode_bahan' => 'required',
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
    
            $post = pembelian_detail::create([
                'kode_pembelian'   => $request->input('kode_pembelian'),
                'kode_bahan' => $request->input('kode_bahan'),
                'jumlah' => $request->input('jumlah'),
                'subtotal' => $request->input('tosubtotaltal'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pembelian Detail Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pembelian Detail Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = pembelian_detail::where('kode_pembelian', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Pembelian Detail!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Pembelian Detail Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembelian'   => 'required',
            'kode_bahan' => 'required',
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
    
            $post = pembelian_detail::where('kode_pembelian', $id)->update([
                'kode_pembelian'   => $request->input('kode_pembelian'),
                'kode_bahan' => $request->input('kode_bahan'),
                'jumlah' => $request->input('jumlah'),
                'subtotal' => $request->input('tosubtotaltal'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pembelian Detail Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pembelian Detail Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}