<?php

namespace App\Http\Controllers;

use App\pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pengeluarancontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = pengeluaran::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Pengeluaran',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_pengeluaran'   => 'required',
            'tgl_pengeluaran' => 'required',
            'jam_pengeluaran' => 'required',
            'nama_user' => 'required',
            'jenis_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required',
            'keterangan' => 'required',

        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = pengeluaran::create([
                'no_pengeluaran'   => $request->input('no_pengeluaran'),
                'tgl_pengeluaran' => $request->input('tgl_pengeluaran'),
                'jam_pengeluaran' => $request->input('jam_pengeluaran'),
                'nama_user' => $request->input('nama_user'),
                'jenis_pengeluaran' => $request->input('jenis_pengeluaran'),
                'jumlah_pengeluaran' => $request->input('jumlah_pengeluaran'),
                'keterangan' => $request->input('keterangan'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pegeluaran Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengeluaran Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = pengeluaran::where('no_pengeluaran', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Pengeluaran!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Pegeluaran Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'no_pengeluaran'   => 'required',
            'tgl_pengeluaran' => 'required',
            'jam_pengeluaran' => 'required',
            'nama_user' => 'required',
            'jenis_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required',
            'keterangan' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = pengeluaran::where('no_pengeluaran', $id)->update([
                'no_pengeluaran'   => $request->input('no_pengeluaran'),
                'tgl_pengeluaran' => $request->input('tgl_pengeluaran'),
                'jam_pengeluaran' => $request->input('jam_pengeluaran'),
                'nama_user' => $request->input('nama_user'),
                'jenis_pengeluaran' => $request->input('jenis_pengeluaran'),
                'jumlah_pengeluaran' => $request->input('jumlah_pengeluaran'),
                'keterangan' => $request->input('keterangan'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pengeluaran Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengeluaran Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}