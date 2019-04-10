<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\V_Peminjam;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.laporan.laporan');
    }

    public function getStok(){
        $inventaris = Inventaris::all();

        return view('pages.admin.laporan.laporan-stok', compact('inventaris'));
    }

    public function getStokPrint(){
        $inventaris = Inventaris::all();

        return view('pages.admin.laporan.laporan-stok-print', compact('inventaris'));
    }

    public function getLaporanPeminjaman(){
        $peminjaman = DB::table('v_peminjam')
                        ->where('status_peminjaman', 'sedang dipinjam')
                        ->get();

        return view('pages.admin.laporan.laporan-peminjaman', compact('peminjaman'));
    }

    public function getLaporanSemuaPeminjaman(){
        $peminjaman = V_Peminjam::latest()->get();

        return view('pages.admin.laporan.laporan-semuaPeminjaman', compact('peminjaman'));
    }

    public function getLaporanPeminjamanWhereKondisi(){
        $peminjaman = Inventaris::where('kondisi', '=', 'baik')->get();
        // $peminjaman = DB::table('inventaris')
        //                 ->where('kondisi', 'baik')
        //                 ->get();

        return view('pages.admin.laporan.laporan-kondisi-barang', compact('peminjaman'));
    }

    public function getLaporanPeminjamanPrint(){
        $peminjaman = DB::table('v_peminjam')
                        ->where('status_peminjaman', 'sedang dipinjam')
                        ->get();

        return view('pages.admin.laporan.laporan-peminjaman-print', compact('peminjaman'));
    }

    public function getLaporanTanggal(){
        $now = date('Y-m-d');
        $peminjaman = DB::table('v_peminjam')
                        ->where('tanggal_pinjam', '=',  $now)
                        ->get();

        return view('pages.admin.laporan.laporan-tanggal', compact('peminjaman'));
    }

    public function getLaporanTanggalKembali(){
        $now = date('Y-m-d');
        $peminjaman = DB::table('v_peminjam')
                        ->where('tanggal_kembali', '=',  $now)
                        ->get();

        return view('pages.admin.laporan.laporan-tanggalKembali', compact('peminjaman'));
    }

    public function getLaporanBarangSeringDipinjam(){
        $peminjaman = DB::table('v_peminjam')
                        ->orderBy('id_inventaris', 'desc')
                        ->get();

        return view('pages.admin.laporan.laporan-barangSeringDipinjam', compact('peminjaman'));
    }
}
