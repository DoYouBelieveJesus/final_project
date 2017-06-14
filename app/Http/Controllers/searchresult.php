<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class searchresult extends Controller
{
    public function show(Request $request) {
//        echo $request->search_input;
        $showshop = 1;
        $showmeal = 1;

        if($request->search_input1 != null)
        {
            $search = $request->search_input1;
        }
        else
        {
            $search = $request->search_input;
        }


        if($request->meal_only != null)
        {
            $request->meal_only = null;
            $showshop = 0;
        }

        if($request->shop_only != null)
        {
            $request->shop_only = null;
            $showmeal = 0;
        }

        if($request->show_all != null)
        {
            $request->show_all = null;
            $showshop = 1;
            $showmeal = 1;
        }



        $shop = DB::table('shops')
            ->where('name', 'like' , '%' . $search . '%')
            ->select('shops.*')
            ->leftjoin('userlikeshop' , 'shops.id' , '=' , 'userlikeshop.shop')
            ->select(DB::raw('count(*) as likenum , shops.*'))->groupby('shops.id')
            ->get();

        $meal = DB::table('meals')

            ->leftjoin('userlikefood' , 'meals.id' , '=' , 'userlikefood.food')
            ->leftjoin('shops' , 'meals.seller' , '=' , 'shops.id')
            ->where('meals.name' , 'like' , '%' . $search . '%')
            ->select(DB::raw('count(*) as likenum , meals.* , shops.name as shops_name , shops.id as shops_id'))->groupby('meals.id')
            ->get();







        //dd($meal);
//        echo $shop[0]->id;
//        echo $ShoplikeNum[0];

//        dd($meal);
        return view("/searchresult")->with(['search_input' => $search , 'Allshop' => $shop , 'Allmeal' => $meal , 'showshop' => $showshop , 'showmeal' => $showmeal]);
    }
}

