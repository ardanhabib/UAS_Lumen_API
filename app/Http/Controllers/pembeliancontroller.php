<?php

namespace App\Http\Controllers;

use App\pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pembeliancontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = pembelian::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Pembelian',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembelian'   => 'required',
            'tanggal_pembelian' => 'required',
            'kode_supplier' => 'required',
            'total' => 'required',
            'status_beli' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = pembelian::create([
                'kode_pembelian'   => $request->input('kode_pembelian'),
                'tanggal_pembelian' => $request->input('tanggal_pembelian'),
                'kode_supplier' => $request->input('kode_supplier'),
                'total' => $request->input('total'),
                'status_beli' => $request->input('status_beli'),


            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pembelian Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pembelian Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = pembelian::where('kode_pembelian', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Menu pembelian!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'pembelian Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembelian'   => 'required',
            'tanggal_pembelian' => 'required',
            'kode_supplier' => 'required',
            'total' => 'required',
            'status_beli' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = pembelian::where('kode_pembelian', $id)->update([
                'kode_pembelian'   => $request->input('kode_pembelian'),
                'tanggal_pembelian' => $request->input('tanggal_pembelian'),
                'kode_supplier' => $request->input('kode_supplier'),
                'total' => $request->input('total'),
                'status_beli' => $request->input('status_beli'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pembelian Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pembelian Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}