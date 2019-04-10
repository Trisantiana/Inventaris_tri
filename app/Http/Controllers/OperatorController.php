<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V_Peminjam;
use App\Peminjaman;
use App\DetailPinjam;
use App\Inventaris;
use App\Pegawai;
use DB;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = V_Peminjam::latest()->get();

        return view('pages.operator.peminjaman.peminjaman-index', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventaris = Inventaris::all();
        $pegawai = Pegawai::all();

        return view('pages.operator.peminjaman.peminjaman-form', compact('inventaris', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal_pinjam = date('Y-m-d');

        $peminjaman = new Peminjaman;
        $peminjaman->tanggal_pinjam = $tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->input('tanggal_kembali');
        $peminjaman->status_peminjaman = 'sedang dipinjam';
        $peminjaman->id_pegawai = $request->input('id_pegawai');
        $peminjaman->cart = 'null';
        $peminjaman->save();
        $lastId = $peminjaman->id;

        $detailPinjam = new DetailPinjam;
        $detailPinjam->id_peminjaman = $lastId;
        $detailPinjam->id_inventaris = $request->input('id_inventaris');
        $detailPinjam->jumlah = $request->input('jumlah');
        $detailPinjam->save();

        $storedProcedure = DB::select("call updateInventaris(".$detailPinjam->id_inventaris.", ".$detailPinjam->jumlah.")");

        return redirect()->route('operator.index', compact('peminjaman', 'detailPinjam'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OperatorController  $operatorController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OperatorController  $operatorController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OperatorController  $operatorController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peminjam = DB::table('v_peminjam')
                    ->where('id', $id)
                    ->where('status_peminjaman', 'sedang dipinjam')
                    ->update(['status_peminjaman' => 'sudah kembali']);

        return redirect()->route('operator.index', compact('peminjam'));

    }

    public function updateBooking(Request $request, $id)
    {
        $peminjam = DB::table('v_peminjam')
                    ->where('id', $id)
                    ->where('status_peminjaman', 'dibooking')
                    ->update(['status_peminjaman' => 'sedang dipinjam']);

        return redirect()->route('operator.index', compact('peminjam'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OperatorController  $operatorController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
