<?php

namespace App\Http\Controllers;

use App\Models\Costumers;
use Database\Seeders\CostumersSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

class CostumersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' =>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumers::all();
        return response()-> json ($costumers, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nama' => 'required', 
            'no_ktp' => 'required', 
            'alamat' => 'required', 
            'umur' => 'required', 
            'no_telfon' => 'required'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Costumers::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function show($costumers)
    {
        $data = Costumers::where('id', $costumers)->first();
        if (!empty($data)){
        return $data;
        }
        return response()->json(['massage' => 'Data Tidak Ditemukan!'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumers $costumers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumers $costumers)
    {
        $data = Costumers::where('id', $costumers)->first();
        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'nama' => 'require', 
            'no_ktp' => 'require', 
            'alamat' => 'require', 
            'umur' => 'require', 
            'no_telfon' => 'require'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan perubahan data
        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function destroy($costumers)
    {
        $data = Costumers::where('id', $costumers)->first();
        if (empty($data)){
        return response()->json(['massage' => 'Data Tidak Ditemukan!'], 404);
        }
        $data->delete();
        return response()->json(['massage' => 'Data Berhasil Dihapus'], 200);
    }
}
