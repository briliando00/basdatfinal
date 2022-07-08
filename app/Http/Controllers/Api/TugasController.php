<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeltugas = tugas::all();
        return response([
            'total' => $modeltugas->count(),
            'messages' => 'Success',
            'data' => $modeltugas->toArray(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tugas' => 'required',
        ]);

        $modeltugas = tugas::create([
            "tugas" => $request->tugas,
        ]);

        return response([
            'data' => $modeltugas,
            'message' => 'success',
        ], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modeltugas = tugas::find($id);
        if ($modeltugas != null) {
            return response([
                'data' => $modeltugas,
            ], 200);
        }else {
            return response([
                'message' => 'Data not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required',
        ]);

        $modeltugas = tugas::find($id);
        if ($modeltugas == null) {
            return response([
                'message' => 'Data not found!!'
            ], 404);
        }

        $modeltugas->tugas = $request->nama;
        $modeltugas->save();

        return response([
            'data' => $modeltugas,
            'message' => 'success',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modeltugas = tugas::find($id);
        if ($modeltugas == null) {
            return response([
                'message' => 'Data tidak ditemukan!!',
            ], 404);
        }
        $modeltugas->delete();
        return response([
            'message' => 'Data berhasil dihapus!',
        ], 200);
    }
}
