<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return response()->json([
            'data' => $kecamatan
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
                'provinsi_id' => 'required'
            ]);

            $new_kecamatan = Kecamatan::create($validated);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dibuat',
                'data' => $new_kecamatan
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
                'provinsi_id' => 'required'
            ]);

            Kecamatan::where('id', $id)->update($validated);

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
            Kecamatan::where('id', $id)->delete();

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
