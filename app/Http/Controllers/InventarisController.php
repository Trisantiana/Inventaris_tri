<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\Jenis;
use App\Ruang;
use App\Petugas;
use DB;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::latest()->paginate(100);
        $jenis = Jenis::all();
        $ruang = Ruang::all();

        return view('pages.admin.inventaris.inventaris-data', compact('inventaris', 'jenis', 'ruang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventaris = Inventaris::all();
        $jenis = Jenis::all();
        $ruang = Ruang::all();

        return view('pages.admin.inventaris.inventaris-form', compact('inventaris', 'jenis', 'ruang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal_register = date('Y-m-d');
        $inventaris = new Inventaris;
        $inventaris->nama = $request->input('nama');
        $inventaris->kondisi = $request->input('kondisi');
        $inventaris->keterangan = $request->input('keterangan');
        $inventaris->jumlah = $request->input('jumlah');
        $inventaris->tanggal_register = $tanggal_register;
        $inventaris->id_jenis = $request->input('id_jenis');
        $inventaris->id_ruang = $request->input('id_ruang');
        $inventaris->kode_inventaris = $request->input('kode_inventaris');
        $inventaris->id_petugas = auth()->user()->id;
        $inventaris->save();

        return redirect()->route('inventaris.index', compact('inventaris'))->with('success', 'Data Tersimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaris = Inventaris::find($id);

        return view('pages.admin.inventaris..inventaris-show', compact('inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventaris = Inventaris::find($id);
        $jenis = Jenis::all();
        $ruang = Ruang::all();

        return view('pages.admin.inventaris.inventaris-edit', compact('inventaris', 'jenis', 'ruang'));
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
        $inventaris = Inventaris::find($id);
        $inventaris->update($request->all());

        return redirect()->route('inventaris.index', compact('inventaris'))->with('success', 'Data Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::find($id);
        $inventaris->delete();

        return redirect()->route('inventaris.index', compact('inventaris'))->with('success', 'Data Terhapus');
    }
}
