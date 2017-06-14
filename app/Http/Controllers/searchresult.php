<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class searchresult extends Controller
{
    public function show(Request $request) {
//        echo $request->search_input;

        $shop = DB::table('shops')
            ->where('name', 'like' , '%' . $request->search_input . '%')
            ->select('shops.*')
            ->leftjoin('userlikeshop' , 'shops.id' , '=' , 'userlikeshop.shop')
            ->select(DB::raw('count(*) as likenum , shops.*'))->groupby('shops.id')
            ->get();

        $meal = DB::table('meals')

            ->leftjoin('userlikefood' , 'meals.id' , '=' , 'userlikefood.food')
            ->leftjoin('shops' , 'meals.seller' , '=' , 'shops.id')
            ->where('meals.name' , 'like' , '%' . $request->search_input . '%')
            ->select(DB::raw('count(*) as likenum , meals.* , shops.name as shops_name , shops.id as shops_id'))->groupby('meals.id')
            ->get();







        //dd($meal);
//        echo $shop[0]->id;
//        echo $ShoplikeNum[0];

//        dd($meal);
        return view("/searchresult")->with(['Allshop' => $shop , 'Allmeal' => $meal]);
    }
}

