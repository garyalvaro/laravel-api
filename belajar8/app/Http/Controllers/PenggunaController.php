<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pengguna = Pengguna::paginate(10);
        // return response()->json([
        //     'data' => $pengguna
        // ]);

        $pengguna = Pengguna::all();
        return response()->json($pengguna);
    }

    public function coba()
    {
        // $kalimat = 'HELLO WORLD';
        // $link = 'http://localhost:8000/api/penggunas';
        $response = Http::get('http://localhost:8000/api/penggunas');
        // return Http::dd()->get('http://localhost:8000/api/penggunas');
        dd($response->body());
        // dd($kalimat);
        // return view('index', compact(['pengguna']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $url = $request->foto;
        // $info = pathinfo($url);
        // $contents = file_get_contents($url);
        // $filename = $info['basename'];
        // Storage::disk('public')->put($filename, $contents);

        // $test = [
        //     'nama' => $request->nama,
        //     'umur' => $request->umur,
        //     'foto' => $path
        // ];
        // return response()->json($test);

        $pengguna = Pengguna::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            // 'foto' => url('assets/uploads/'.$filename)
            'foto' => $request->foto
        ]);

        return response()->json($pengguna);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        return response()->json([
            'data' => $pengguna
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $pengguna->nama = $request->nama;
        $pengguna->umur = $request->umur;
        $pengguna->foto = $request->foto;
        $pengguna->save();

        return response()->json([
            'data' => $pengguna
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();

        return response()->json([
            'message' => 'pengguna sudah dihapus'
        ], 204);
    }
}
