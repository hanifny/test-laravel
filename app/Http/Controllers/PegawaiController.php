<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::with('kelurahan', 'kecamatan', 'provinsi')->get();
        return response()->json([
            'data' => $pegawai
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
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required|string',
                'agama' => 'required|string',
                'alamat' => 'required|string',
                'provinsi_id' => 'required',
                'kecamatan_id' => 'required',
                'kelurahan_id' => 'required'
            ]);

            $new_pegawai = Pegawai::create($validated);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dibuat',
                'data' => $new_pegawai
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
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required|string',
                'agama' => 'required|string',
                'alamat' => 'required|string',
                'provinsi_id' => 'required',
                'kecamatan_id' => 'required',
                'kelurahan_id' => 'required'
            ]);

            Pegawai::where('id', $id)->update($validated);

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
            Pegawai::where('id', $id)->delete();

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
