<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;


class PengeluaranController extends Controller
{
    //Index Pengeluaran
    public function index_pe()
    {
        $pe = DB::table('pengeluaran')
              ->get();
        $data = [];
        $data['page'] = 'Master Data || Data Pengeluaran';
        $data['pe'] = $pe;
        
    	return view('pengeluaran.index_pe',$data);
    }
    public function tambah_pe()
 	{
 		$data['page'] = 'PENGELUARAN';

 		return view('pengeluaran.tambah_pe',$data);	
    }
    public function simpan_pe(Request $Request)
 	{
 		$insert = DB::table('pengeluaran')
 				->insert([
 					'item_nama' => $Request->input('item_nama'),
 					'item_tanggal' => $Request->input('item_tanggal'),
                    'item_nominal' => $Request->input('item_nominal'),
                    'status' => $Request->input('status'),
 				]);
        
 		return redirect()->route('index_pe')->with('add', 'Data Saved Successfully!');
	 }
     public function edit_pe($id)
    {
        $p = DB::table('pengeluaran')
            ->where('id_pengeluaran',$id)            
            ->get();
            
        $data = [];
        $data['page'] = 'PENGELUARAN';
        $data['pengeluaran'] = $p;

        return view('pengeluaran.edit_pe',$data);
    }
    public function save_pe(Request $Request){ 
        $id = $Request->input('hidden_id');
        $update = DB::table('pengeluaran')
                     ->where('id_pengeluaran',$id)
                     ->update([
                    'item_nama' => $Request->input('item_nama'),
                    'item_tanggal' => $Request->input('item_tanggal'),
                    'item_nominal' => $Request->input('item_nominal'),
                    'status' => $Request->input('status')
                     ]);
        
      return redirect()->route('index_pe')->with('update', 'Data Updated Successfully!');
    }
    public function delete_pe($id)
    {
        $delete = DB::table('pengeluaran') 
        ->where('id',$id)
        ->delete();
        
        return redirect()->route('index_pe')->with('delete', 'Data Deleted Successfully!');
   }
}