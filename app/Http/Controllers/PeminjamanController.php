<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\DetailPinjam;
use App\Pegawai;
use App\Inventaris;
use App\V_Peminjam;
use DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = V_Peminjam::latest()->get();

        return view('pages.admin.peminjaman.peminjaman-data', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjaman = V_Peminjam::all();
        $pegawai = Pegawai::all();
        $inventaris = Inventaris::all();

        return view('pages.admin.peminjaman.peminjaman-form', compact('peminjaman', 'pegawai', 'inventaris'));
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

        return redirect()->route('peminjaman.index', compact('peminjaman', 'detailPinjam'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = V_Peminjam::find($id);

        return view('pages.admin.peminjaman.peminjaman-show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peminjaman =  DB::table('v_peminjam')
                        ->where('id', $id)
                        ->where('status_peminjaman', 'sedang dipinjam')
                        ->update(['status_peminjaman' => 'sudah kembali']);



        return redirect()->route('peminjaman.index', compact('peminjaman'));
    }

    public function updateBooking(Request $request, $id){
        $peminjaman = DB::table('v_peminjam')
                        ->where('id', $id)
                        ->where('status_peminjaman', 'dibooking')
                        ->update(['status_peminjaman' => 'sedang dipinjam']);

        return redirect()->route('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPeminjamanPrint()
    {
        $peminjaman = V_Peminjam::all();

        return view('pages.admin.peminjaman.peminjaman-print', compact('peminjaman'));
    }

}
