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
        $mealtype = 0;
        if($request->hourfrom >= 6 and $request->hourfrom < 11)
        {
            $mealtype = $mealtype + 1;
        }
        if($request->hourfrom >= 11 and $request->hourfrom < 17)
        {
            $mealtype = $mealtype + 3;
        }
        if($request->hourfrom >= 17 and $request->hourfrom < 21)
        {
            $mealtype = $mealtype + 4;
        }
        if($request->hourfrom >= 21 or $request->hourfrom < 6)
        {
            $mealtype = $mealtype + 8;
        }




        DB::table('shops')->insert(
            [
                'name' => $request->shopname,
                'telephone' => $request->telephone,
                'address' => $request->telephone,
                'businessFrom' => $timefrom,
                'businessTo' => $timeto,
                'mealtype' => $mealtype,
            ]
        );

//        $foodset = [];
//        foreach ($request->food as $food)
//        {
//            $foodset[] = [
//                'name' => $food['name'],
//                'price' => $food['price'],
//                'mealtype' => $mealtype,
//
//            ];
//        }
//        DB::table('meals')->insert($foodset);
        return redirect('/');
    }
}