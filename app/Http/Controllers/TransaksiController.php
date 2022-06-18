<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Obat;
use App\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("laporan.pembeliTransaksiTerbanyak");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

    public function laporanPembeliTerbanyak(){
//         select p.id, p.name, p.address, p.telepon
// from transaksi_obats as tob 
// inner join transaksis as t on tob.transaksi_id = t.id
// inner join pembelis as p on t.pembeli_id = p.id
// GROUP BY t.pembeli_id;
        $laporans= DB::table('transaksi_obats as tob')
                    ->select('p.id', 'p.name', 'p.address', 'p.telepon')
                    ->join('transaksis as t', 'tob.transaksi_id', "=", 't.id')
                    ->join('pembelis as p', 't.pembeli_id', "=", 'p.id')
                    ->get();
        return view('laporan.pembeliTransaksiTerbanyak', compact('laporans'));
    }

    public function laporanObatTerlaris(){
        // $obatTerlaris = DB::table('transaksi_obats as tr')
        //         ->select('o.id', 'o.generic_name', DB::Raw('SUM(tr.jumlah) as jumlah'))
        //         ->join('obats as o','o.id', '=', 'tr.obat_id')
        //         ->groupBy('o.id', 'o.generic_name')
        //         ->orderBy(DB::raw('SUM(jumlah)'), 'desc')
        //         ->limit(5)
        //         ->get();

        $obat = Obat::all();
        $transaksi = Transaksi::all();

        $arr_terlaris = [];

        foreach($obat as $o) $arr_terlaris[$o->id] = $o->transaksi()->sum('jumlah');

        arsort($arr_terlaris);
        $terlaris = array_slice(array_keys($arr_terlaris), 0,5, true);

        $obat_terlaris = [];
        foreach($terlaris as $idx => $val){
            $obat = Obat::find($val);
            array_push($obat_terlaris, $obat);
        }
        // dd($obat_terlaris);
        return view('laporan.obatTerlaris', compact('obat_terlaris', 'arr_terlaris'));
    }
}
