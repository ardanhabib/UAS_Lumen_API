<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class usercontroller extends Controller
{
    //GET DATA
    public function index()
    {
        $posts = user::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua User',
            'data'    => $posts
        ], 200);
    }

    //POST DATA
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'   => 'required',
            'password' => 'required',
            'nama_user' => 'required',
            'hak_akses' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = user::create([
                'username'   => $request->input('username'),
                'password' => $request->input('password'),
                'nama_user' => $request->input('nama_user'),
                'hak_akses' => $request->input('hak_akses'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Gagal Disimpan!',
                ], 400);
            }
    
        }
    }

    //GET ID DATA
    public function getid($id)
    {
       $post = user::where('username', $id)->first();    
       if ($post) {
           return response()->json([
               'success'   => true,
               'message'   => 'Detail Menu User!',
               'data'      => $post
           ], 200);
       } else {
           return response()->json([
               'success' => false,
               'message' => 'User Tidak Ditemukan!',
           ], 404);
       }
    } 

    //UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username'   => 'required',
            'password' => 'required',
            'nama_user' => 'required',
            'hak_akses' => 'required',
        ]);
    
        if ($validator->fails()) {
    
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $post = user::where('username', $id)->update([
                'username'   => $request->input('username'),
                'password' => $request->input('password'),
                'nama_user' => $request->input('nama_user'),
                'hak_akses' => $request->input('hak_akses'),
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Berhasil Diupdate!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Gagal Diupdate!',
                ], 400);
            }
    
        }
    }
}