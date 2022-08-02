<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::with('costumers', 'rooms')->get();
        return response()-> json ($orders, 200);
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
            'tanggal_pesan' => 'require', 
            'tanggal_check_in' => 'require', 
            'tanggal_check_out' => 'require', 
            'lama_menginap' => 'require', 
            'total_biaya' => 'require'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Orders::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show($orders)
    {
        $data = Orders::with('costumers', 'rooms')->where('id', $orders)->first();
        if (!empty($data)){
        return $data;
        }
        return response()->json(['massage' => 'Data Tidak Ditemukan!'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        $data = Orders::where('id', $orders)->first();
        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'tanggal_pesan' => 'require', 
            'tanggal_check_in' => 'require', 
            'tanggal_check_out' => 'require', 
            'lama_menginap' => 'require', 
            'total_biaya' => 'require'
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
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($orders)
    {
        $data = Orders::where('id', $orders)->first();
        if (empty($data)){
        return response()->json(['massage' => 'Data Tidak Ditemukan!'], 404);
        }
        $data->delete();
        return response()->json(['massage' => 'Data Berhasil Dihapus'], 200);
    }
}
