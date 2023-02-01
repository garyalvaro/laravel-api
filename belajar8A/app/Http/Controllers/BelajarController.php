<?php

namespace App\Http\Controllers;

use App\Models\Belajar;
use Illuminate\Http\Request;
use App\Http\Controllers\BelajarController;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Http\FormRequest;

class BelajarController extends Controller
{
    public function index()
    {
        //
    }

    // Fungsi menampilkan data dari API
    public function read()
    {
        // $url = 'http://apiservice.rf.gd/api/penggunas';
        $url = 'http://localhost:8000/api/penggunas';
        $response = Http::get($url);
        $data = $response->json();        
        // dd($data);
        return view('index', compact(['data']));
    }

    // Fungsi menampilkan halaman tambah data
    public function create()
    {
        return view('add');
    }

    // Fungsi menyimpan data ke API
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama' => 'required|string',
        //     'umur' => 'required|int',
        //     'foto' => 'required'
        // ]);

        $foto = $request->file('foto');
        $filename = date('Ymd-His').'.'.$foto->getClientOriginalExtension();

        $data = [
            'nama' => $request->nama,
            'umur' => $request->umur,
            'foto' => url('assets/uploads/'.$filename)
        ];

        $url = 'http://localhost:8000/api/penggunas';
        $response = Http::post($url, $data);

        if($response->status()==200)
        {
            $foto->move(public_path('assets/uploads/'), $filename);
            return redirect()
                ->route('read')
                ->with([
                    'success' => 'Data Berhasil Ditambahkan.'
                ]);
        } 
        else 
        {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terdapat Kesalahan ERROR '.$response->status().', silahkan ulangi.'
                ]);
        }
    }

    public function show(Belajar $belajar)
    {
        //
    }

    // Menampilkan Halaman Edit Data
    public function edit($id)
    {
        $url = 'http://localhost:8000/api/penggunas/'.$id;
        $response = Http::get($url);
        $data = $response->json();
        // dd($data['data']);
        return view('edit')->with($data);
    }

    // Fungsi untuk mengupdate data pada API
    public function update(Request $request, $id)
    {
        if($request->file('foto') == "")
        {
            $data = [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'foto' => $request->foto_lama
            ];
        }
        else
        {
            $foto = $request->file('foto');
            $filename = date('Ymd-His').'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('assets/uploads/'), $filename);

            $data = [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'foto' => url('assets/uploads/'.$filename)
            ];
        }
        
        $url = 'http://localhost:8000/api/penggunas/'.$id;
        $response = Http::put($url, $data);

        if($response->status()==200)
        {
            return redirect()
                ->route('read')
                ->with([
                    'success_edit' => 'Data dengan ID '.$id.' Berhasil Diubah.'
                ]);
        } 
        else 
        {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'ERROR '.$response->status().', Silahkan ulangi.'
                ]);
        }
    }

    // Fungsi Delete Data dari API
    public function destroy($id)
    {
        $url = 'http://localhost:8000/api/penggunas/'.$id;
        $response = Http::delete($url);
        
        if($response->status()==204)
        {
            return redirect()
                ->route('read')
                ->with([
                    'success_delete' => 'Data dengan ID '.$id.' berhasil dihapus.'
                ]);
        } 
        else 
        {
            return redirect()
                ->back()
                ->with([
                    'error_delete' => 'ERROR '.$response->status().'! Data dengan ID '.$id.' tidak terhapus.'
                ]);
        }
    }
}
