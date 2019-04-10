<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\Pegawai;
use App\V_Peminjam;
use App\Peminjaman;
use App\DetailPinjam;
use App\Cart;
use DB;
use Session;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataInven = Inventaris::all();

        return view('pages.peminjam.peminjam-dataInventaris', compact('dataInven'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPinjam()
    {
        $peminjam = DB::table('v_peminjam')
                    ->where('nama_pegawai', '=', auth()->user()->name)
                    ->latest()->get();
        // $peminjam = Peminjaman::all();
        return view('pages.peminjam.peminjam-dataPinjam', compact('peminjam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambahPinjam( $id)
    {
        $inventaris = Inventaris::find($id);
        $pegawai = Pegawai::all();
        $peminjam = V_Peminjam::all();

        return view('pages.peminjam.peminjam-add', compact('inventaris', 'pegawai', 'peminjam'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savePinjam(Request $request)
    {
        $tanggal_pinjam = date('Y-m-d');
        $peminjaman = new Peminjaman;
        $peminjaman->tanggal_pinjam = $tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->input('tanggal_kembali');
        $peminjaman->status_peminjaman = 'dibooking';
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

        return redirect()->route('peminjam.dataPinjam', compact('peminjaman', 'detailPinjam'));
    }

    public function addBorrow(Request $request, $id){
        $inventaris = Inventaris::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($inventaris, $inventaris->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('peminjam.dataInven');
    }

    public function addBorrowPeminjam(Request $request, $id){
        $inventaris = Inventaris::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($inventaris, $inventaris->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('peminjam.dataInven');
    }

    public function getBorrow(){
        if (!Session::has('cart')) {
            return view('pages.peminjam.cart.proses-pinjam');
        }

        $oldCart = Session::get('cart');
        // $inventaris = Inventaris::all();
        $cart = new Cart($oldCart);
        return view('pages.peminjam.cart.proses-pinjam', ['inventaris' => $cart->inventaris]);
    }

    public function getProsesPinjam(){
        if (!Session::has('cart')) {
            return view('pages.peminjam.cart.proses-pinjam');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // $inventaris = Inventaris::all();
        $pegawai = Pegawai::all();
        return view('pages.peminjam.cart.form-peminjaman', compact('pegawai'));

    }

    public function postPinjam(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('peminjam.borrow');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        try {

            // tanggal_kembali
            $inventaris = Inventaris::all();
            $borrow = new Peminjaman();

            $borrows = Peminjaman::all();
            foreach ($cart->inventaris as $key =>  $value) {
                $id = $key;
                $jml = $value['qty'];
            }

            // tanggal pinjam
            $satu = date('Y-m-d', strtotime("+1 day"));
            $dua = date('Y-m-d', strtotime("+2 day"));
            $tiga = date('Y-m-d', strtotime("+3 day"));
            $empat = date('Y-m-d', strtotime("+4 day"));
            $lima = date('Y-m-d', strtotime("+5 day"));
            $enam  = date('Y-m-d', strtotime("+6 day"));
            $tujuh  = date('Y-m-d', strtotime("+7 day"));

            $tanggal_pinjam = date('Y-m-d');
            $borrow->tanggal_pinjam = $tanggal_pinjam;
            $borrow->tanggal_kembali = $request->input('tanggal_kembali');
            $borrow->status_peminjaman = 'sedang dipinjam';
            $borrow->id_pegawai = $request->input('id_pegawai');
            $borrow->cart = serialize($cart);

            $storeProsedur = DB::select("CALL updateInventaris(".$id.", ".$jml.")");

            $borrow->save();

        } catch (Exception $e) {
            return redirect()->route('proses-pinjam', compact('tanggal_pinjam', 'inventaris', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh'))->with('error :' .$e->getMessage());
        }

        Session::forget('cart');

        return redirect()->route('peminjam.dataInven', compact('satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh'));

    }




}