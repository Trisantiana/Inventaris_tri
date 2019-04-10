<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin(){
        return view('layouts._master');
    }

    public function dashboard(){
        $peminjaman = DB::table('v_peminjam')
                        ->count('id');
        $inventaris = DB::table('inventaris')
                        ->count('id');
        $jenis = DB::table('jenis')
                        ->count('id');
        $ruang = DB::table('ruang')
                        ->count('id');
        return view('dashboard', compact('peminjaman', 'inventaris', 'jenis', 'ruang'));
    }
}
