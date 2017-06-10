<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImportController extends Controller
{
    public function importshop(Request $request)
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

        return redirect('/importfood');
    }
    public function importfood(Request $request)
    {
        $shopid=DB::table('shops')->max('id');
        $shop=DB::table('shops')->select('mealtype')->where('id',$shopid)->first();
        $mealtype=$shop->mealtype;
        $foodset = [];
        foreach ($request->food as $food)
        {
                if(!is_null($food['name']))
                {
                 $foodset[] = [
                'name' => $food['name'],
                'price' => $food['price'],
                'mealtype' => $mealtype,
                'seller' => $shopid

            ];
        }
        }
        DB::table('meals')->insert($foodset);
        return redirect('/');
    }
}