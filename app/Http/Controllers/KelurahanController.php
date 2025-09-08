<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return response()->json([
            'data' => $kelurahan
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
                'is_active' => 'required|boolean',
                'provinsi_id' => 'required',
                'kecamatan_id' => 'required'
            ]);

            $new_kelurahan = Kelurahan::create($validated);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dibuat',
                'data' => $new_kelurahan
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
                'is_active' => 'required|boolean',
                'provinsi_id' => 'required',
                'kecamatan_id' => 'required'
            ]);

            Kelurahan::where('id', $id)->update($validated);

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
            Kelurahan::where('id', $id)->delete();

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
