<?php

namespace App\Http\Controllers;

use App\retur_beli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class retur_belicontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = retur_beli::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Retur_Beli',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembelian'   => 'required',
            'tanggal_retur' => 'required',
            'kode_bahan' => 'required',
            'jumlah_retur' => 'required',
            'keterangan' => 'required',
            'status_retur' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = retur_beli::create([
                'kode_pembelian'   => $request->input('kode_pembelian'),
                'tanggal_retur' => $request->input('tanggal_retur'),
                'kode_bahan' => $request->input('kode_bahan'),
                'jumlah_retur' => $request->input('jumlah_retur'),
                'keterangan' => $request->input('keterangan'),
                'status_retur' => $request->input('status_retur'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Retur Beli Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Retur Beli Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = retur_beli::where('kode_pembelian', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Menu Retur Beli!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Retur Beli Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembelian'   => 'required',
            'tanggal_retur' => 'required',
            'kode_bahan' => 'required',
            'jumlah_retur' => 'required',
            'keterangan' => 'required',
            'status_retur' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = retur_beli::where('kode_pembelian', $id)->update([
                'kode_pembelian'   => $request->input('kode_pembelian'),
                'tanggal_retur' => $request->input('tanggal_retur'),
                'kode_bahan' => $request->input('kode_bahan'),
                'jumlah_retur' => $request->input('jumlah_retur'),
                'keterangan' => $request->input('keterangan'),
                'status_retur' => $request->input('status_retur'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Retur Beli Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Retur Beli Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}