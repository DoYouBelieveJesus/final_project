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
        $businesstimefrom=$request->hourfrom;
        $businesstimeto=$request->hourto;
        if($businesstimefrom>$businesstimeto)
        {
            $businesstime=24+$businesstimeto-$businesstimefrom;
        }
        else
        {
            $businesstime=$businesstimeto-$businesstimefrom;
        }

        if($businesstimefrom >= 6 and  $businesstimefrom < 11)
        {
            $mealtype = $mealtype + 1;
            $businesstime=$businesstime-5;
            if($businesstime>=0)
            {
                 $mealtype=$mealtype+2;
                 $businesstime=$businesstime-6;
                 if($businesstime>=0)
                 {
                     $mealtype=$mealtype+4;
                     $businesstime=$businesstime-4;
                      if($businesstime>=0)
                      {
                            $mealtype=$mealtype+8;
                      }
                 }


            }     
        }
        if( $businesstimefrom >= 11 and  $businesstimefrom < 17)
        {
            $mealtype = $mealtype + 2;
            $businesstime=$businesstime-6;
            if($businesstime>=0)
            {
                 $mealtype=$mealtype+4;
                 $businesstime=$businesstime-4;
                 if($businesstime>=0)
                 {
                     $mealtype=$mealtype+8;
                     $businesstime=$businesstime-9;
                      if($businesstime>=0)
                      {
                            $mealtype=$mealtype+1;
                      }
                 }
            }
        }
        if( $businesstimefrom >= 17 and  $businesstimefrom < 21)
        {
            $mealtype = $mealtype + 4;
            $businesstime=$businesstime-4;
            if($businesstime>=0)
            {
                 $mealtype=$mealtype+8;
                 $businesstime=$businesstime-9;
                 if($businesstime>=0)
                 {
                     $mealtype=$mealtype+1;
                     $businesstime=$businesstime-5;
                      if($businesstime>=0)
                      {
                            $mealtype=$mealtype+2;
                      }
                 }
            }
        }
        if( ($businesstimefrom >= 21 and $businesstimefrom <24) or ($businesstimefrom>=0 and $businesstimefrom < 6))
        {
            $mealtype = $mealtype + 8;
            $businesstime=$businesstime-9;
            if($businesstime>=0)
            {
                 $mealtype=$mealtype+1;
                 $businesstime=$businesstime-5;
                 if($businesstime>=0)
                 {
                     $mealtype=$mealtype+2;
                     $businesstime=$businesstime-6;
                      if($businesstime>=0)
                      {
                            $mealtype=$mealtype+4;
                      }
                 }
            }
        }

        DB::table('shops')->insert(
            [
                'name' => $request->shopname,
                'telephone' => $request->telephone,
                'address' => $request->address,
                'website'=> $request->website,
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