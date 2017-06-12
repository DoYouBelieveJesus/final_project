<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\shop;
use App\Meal;
use Auth;

class showshopcontroller extends Controller
{
    public function showshop()
    {
         $AllShops=DB::table('shops')->get();
         /*time format*/
          /*$AllShopTime=DB::table('shops')->select(DB::raw("TIME_FORMAT('businessFrom','%h:%i%p')");
          die($AllShopTime);*/
         return view('showshop',['AllShop'=>$AllShops,'test'=>0]);       
    }
    public function showshopdetial(shop $shop)
    {
        return view('shopinformation',['Shop'=>$shop]);
        //die("$shop->name");
    }
    public function showfood($shopid)
    {
        if(Auth::check())
        {
            $userid=Auth::id();
        }
        DB::connection()->enableQueryLog();
        $shopmeals=DB::table('meals')->where('seller',$shopid)->get();
        $likefood=DB::table('meals as meals1')->where('seller',$shopid)->Join('userlikefood as test','meals1.id','=','test.food');//->get()->leftjoin('userlikefoods'
        //dd($likefood);
        $likefood=DB::table('meals as meals1')->where('seller',$shopid)->LeftJoin('userlikefood','meals1.id','=','userlikefood.food')->select(DB::raw('count(userlikefood.food) as usernum, meals1.id as foodid, meals1.name as foodname, meals1.price as foodprice'))->groupBy('foodid')->get();
        //select('meals.name as foodname','userlikefood.food as foodid','meals.price as food price",'userlikefood.food as foodid')->
       // dd("$shopmeals");
      //  dd($userlike);
      /*foreach($shopmeals as $shopmeal)
      {
         

      }*/
        $queries=DB::getQueryLog();
        //dd($queries);
        dd($likefood);
      //  die("<br>test");
        return view('foodinformation',['meals'=>$shopmeals,'likefoodusernum'=>$likefood]);
    }
}


