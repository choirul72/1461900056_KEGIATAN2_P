<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function buku0056(){
        $ms_buku = DB::table('ms_buku')->get();
        return view('buku0056' , ['ms_buku' => $ms_buku]);
    }
    public function cari(Request $request){
        $cari = $request->lihat;
        $ms_buku=DB::table('ms_buku')->where('judul_buku','like',"%".$cari."%")->paginate();
        return view('buku0056',['ms_buku'=>$ms_buku]);
    }
    public function innerjoin(){
        $ms_buku = DB::table('ms_buku')
        ->join('ms_kategori', 'ms_buku.kode_kategori', '=', 'ms_kategori.kode_kategori')
        ->select('ms_buku.kode_buku', 'ms_buku.judul_buku', 'ms_buku.jumlah_buku' , 'ms_kategori.nama_kategori')
        ->get();
        return view('join0056',['ms_buku'=>$ms_buku]);
    }
    public function carijoin(Request $request){
        $carijoin = $request->lihat;
        $ms_buku = DB::table('ms_buku')
        ->join('ms_kategori', 'ms_buku.kode_kategori', '=', 'ms_kategori.kode_kategori')
        ->select('ms_buku.kode_buku', 'ms_buku.judul_buku', 'ms_buku.jumlah_buku' , 'ms_kategori.nama_kategori')
        ->where('nama_kategori','like',"%".$carijoin."%")->paginate();
        return view('join0056',['ms_buku'=>$ms_buku]);
    }
}
