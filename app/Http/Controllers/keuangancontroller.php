<?php

namespace App\Http\Controllers;

use App\keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class keuangancontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = keuangan::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Keuangan',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'   => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'nama_user' => 'required',
            'debit' => 'required',
            'kredit' => 'required',
            'keterangan' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = keuangan::create([
                'id' => $request->input('id'),
                'tanggal' => $request->input('tanggal'),
                'jam' => $request->input('jam'),
                'nama_user' => $request->input('nama_user'),
                'debit' => $request->input('debit'),
                'kredit' => $request->input('kredit'),
                'keterangan' => $request->input('keterangan'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Keuangan Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Keuangan Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    // GET ID DATA
    public function getid($id)
    {
       $post = keuangan::where('id', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Keuangan!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'Keuangan Tidak Ditemukan!',
           ], 404);
       }
    }

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id'   => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'nama_user' => 'required',
            'debit' => 'required',
            'kredit' => 'required',
            'keterangan' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = keuangan::where('id', $id)->update([
                'id' => $request->input('id'),
                'tanggal' => $request->input('tanggal'),
                'jam' => $request->input('jam'),
                'nama_user' => $request->input('nama_user'),
                'debit' => $request->input('debit'),
                'kredit' => $request->input('kredit'),
                'keterangan' => $request->input('keterangan'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Keuangan Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Keuangan Gagal Diupdate!',
                ], 400);
            }
    
        }
    }

}