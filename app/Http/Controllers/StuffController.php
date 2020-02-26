<?php

namespace App\Http\Controllers;

use App\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all stuff data
        $stuff = BarangModel::all();

        $response = [
            'message' => 'List of all stuff data',
            'stuff' => $stuff
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data validation
        $this->validate($request, [
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required'
        ]);

        $categoryId = $request->input('id_kategori');
        $name = $request->input('nama_barang');
        $date = $request->input('tgl');
        $price = $request->input('harga_awal');
        $description = $request->input('deskripsi_barang');

        $stuff = new BarangModel([
            'nama_barang' => $name,
            'id_kategori' => $categoryId,
            'tgl' => $date,
            'harga_awal' => $price,
            'deskripsi_barang' => $description
        ]);

        if ($stuff->save()) {
            $message = [
                'message' => 'Data Created',
                'stuff' => $stuff
            ];
            return response()->json($message, 201);
        }

        // returning response when error during create new stuff data
        $response = [
            'message' => 'Error during creation'
        ];
        return response()->json($response, 404);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function show(BarangModel $barangModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangModel $barangModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangModel $barangModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangModel $barangModel)
    {
        //
    }
}
