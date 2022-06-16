<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //dari transaksi_obats,  group by obat_id
        //Select o.id, o.generic_name, sum(tr.jumlah)
        //From obats o
        //inner join transaksi_obats tr ON o.id = tr.obat_id
        //where sum(tr.jumlah) = Select MAX(sum(jumlah)) from transaksi_obats group by obat_id

        // Belum dicoba
        $terlaris = DB::table('transaksi_obats')->max("DB::Raw(sum('jumlah'))")->groupBy('obat_id');

        $obat = DB::table('transaksi_obats')
                ->select('o.id', 'o.generic_name', DB::Raw('sum(tr.jumlah)'))
                ->join('transaksi_obats tr','o.id', '=', 'tr.obat_id')
                ->where("DB::Raw('sum(tr.jumlah)')", $terlaris)
                ->get();

        dd($obat);
        // return view('laporan.obatTerlaris', compact('obat'));
    }
}
