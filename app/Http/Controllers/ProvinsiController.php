<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return response()->json([
            'data' => $provinsi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string',
                'kode' => 'required|string',
                'is_active' => 'required|boolean'
            ]);

            $new_provinsi = Provinsi::create($validated);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dibuat',
                'data' => $new_provinsi
            ]);
        } catch (\Exception $e) {
            // throw $th;
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string',
                'kode' => 'required|string',
                'is_active' => 'required|boolean'
            ]);

            Provinsi::where('id', $id)->update($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Provinsi::where('id', $id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
