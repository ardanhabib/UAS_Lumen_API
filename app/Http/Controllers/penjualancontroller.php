<?php

namespace App\Http\Controllers;

use App\penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class penjualancontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = penjualan::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Penjualan',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_penjualan'   => 'required',
            'tangggal_penjualan' => 'required',
            'nama_kasir' => 'required',
            'nama_konsumen' => 'required',
            'no_meja' => 'required',
            'total' => 'required',
            'bayar' => 'required',

        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = penjualan::create([
                'kode_penjualan'   => $request->input('kode_penjualan'),
                'tangggal_penjualan' => $request->input('tangggal_penjualan'),
                'nama_kasir' => $request->input('nama_kasir'),
                'nama_konsumen' => $request->input('nama_konsumen'),
                'no_meja' => $request->input('no_meja'),
                'total' => $request->input('total'),
                'bayar' => $request->input('bayar'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Penjualan Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Penjualan Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = penjualan::where('kode_penjualan', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Menu Penjualan!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Penjualan Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_penjualan'   => 'required',
            'tangggal_penjualan' => 'required',
            'nama_kasir' => 'required',
            'nama_konsumen' => 'required',
            'no_meja' => 'required',
            'total' => 'required',
            'bayar' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = penjualan::where('kode_penjualan', $id)->update([
                'kode_penjualan'   => $request->input('kode_penjualan'),
                'tangggal_penjualan' => $request->input('tangggal_penjualan'),
                'nama_kasir' => $request->input('nama_kasir'),
                'nama_konsumen' => $request->input('nama_konsumen'),
                'no_meja' => $request->input('no_meja'),
                'total' => $request->input('total'),
                'bayar' => $request->input('bayar'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Penjualan Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Penjualan Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}