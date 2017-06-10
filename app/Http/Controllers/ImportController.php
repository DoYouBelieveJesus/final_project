<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImportController extends Controller
{
    public function import(Request $request)
    {
        $timefrom = $request->hourfrom . ':' . $request->minfrom . ':00';
        $timeto = $request->hourto . ':' . $request->minto . ':00';


        DB::table('shops')->insert(
            [
                'name' => $request->shopname,
                'telephone' => $request->telephone,
                'address' => $request->telephone,
                'businessFrom' => $timefrom,
                'businessTo' => $timeto,
                'mealtype' => '1',
            ]
        );
        echo "test";
    }
}