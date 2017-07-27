<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitRumah;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function createUnit(Request $request) {

        DB::beginTransaction();

        try {

            $unit = new UnitRumah;
            $unit->kavling = $request->input('kavling');
            $unit->blok = $request->input('blok');
            $unit->no_rumah = $request->input('no_rumah');
            $unit->harga_rumah = $request->input('harga_rumah');
            $unit->luas_tanah = $request->input('luas_tanah');
            $unit->luas_bangunan = $request->input('luas_bangunan');
            $unit->save();

            DB::commit();

            return response()->json("success", 200);

        }

        catch (\Exception $e) {

            DB::rollBack();

            return response()->json(["message"=>$e->getMessage()], 500);
        }

    }

    function deleteUnit(Request $request) {
        
        DB::delete('delete from unit_rumahs where id = ?', [$request]);
        return response()->json("success", 200);

    }
}
