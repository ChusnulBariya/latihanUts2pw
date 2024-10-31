<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $data['message'] = true;
        $data['result'] = $mahasiswa;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'npm' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'prodi' => 'required',
        ]);

        $result = Mahasiswa::create($validate); // simpan ke tabel ku$kucing
        if ($result) {
            $data['success'] = true;
            $data['message'] = "Data mahasiswa berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        $fakultas = Mahasiswa::find($mahasiswa);
        $data['success'] = true;
        $data['message'] = "Detail data fakultas";
        $data['result'] = $mahasiswa;
        return response()->json($data, Response::HTTP_OK);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
          'nama' => 'required',
            'npm' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'prodi' => 'required',

        ]);

        $result = Mahasiswa::where('id', $id)->update($validate);
        if ($result) {
            $data['success'] = true;
            $data['message'] = "Data mahasiswa berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa){
            $mahasiswa->delete();
            $data['success'] = true;
            $data['message'] = 'Data mahasiswa Berhasil Dihapus';
            return response()->json($data, Response::HTTP_OK);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data mahasiswa Tidak Ada';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
