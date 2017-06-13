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
         $All=DB::table('shops')->leftjoin('userlikeshop','shops.id','userlikeshop.shop')->select(DB::raw('shops.name as name , shops.address as address , shops.mealtype as mealtype , count(userlikeshop.user) as likenum, shops.telephone as telephone, shops.businessFrom, shops.businessTo, shops.website, shops.id'))->groupby('shops.id')->get();
        // dd($All);
         /*time format*/
          /*$AllShopTime=DB::table('shops')->select(DB::raw("TIME_FORMAT('businessFrom','%h:%i%p')");
          die($AllShopTime);*/
         return view('showshop',['AllShop'=>$All,'test'=>0]);       
    }
    public function showshopdetial(shop $shop)
    {
        if(Auth::check())
        {
            $userid=Auth::id();
        }
        else
        {
            $userid=0;
        }
        $Shopcomment=DB::table('shopcomments')->where('commenter',$userid)->where('shoper',$shop->id)->select('*')->get();
        $ShoplikeNum=DB::table('userlikeshop')->where('userlikeshop.shop',$shop->id)->select(DB::raw('count(*) as likenum'))->get();
        $ShoplikeNums=(int)$ShoplikeNum[0]->likenum;
        $Userlikes=DB::table('userlikeshop')->where('userlikeshop.shop',$shop->id)->where('userlikeshop.user',$userid)->select(DB::raw('count(*) as userlike'))->get();
        $Userlike=(int)$Userlikes[0]->userlike;
        //dd($Shopcomment);
        return view('shopinformation',['shopcomments'=>$Shopcomment,'Shop'=>$shop,'shoplikenum'=>$ShoplikeNums,'userlikes'=>$Userlike]);
    }
    public function showfood($shopid)
    {
        if(Auth::check())
        {
            $userid=Auth::id();
        }
        else
        {
            $userid=0;
        }
        DB::connection()->enableQueryLog();
        $userlike=DB::table('meals as meals1')->where('seller',$shopid)->LeftJoin('userlikefood','meals1.id','=','userlikefood.food')->select('userlikefood.food as foodid')->where('userlikefood.user',$userid)->get();//groupBy('foodid')->get();        //->leftjoin('users','users.id','=','test1.user')->get();//->select('users.id as userid','test1.food as foodid')->where('users.id','=','1')->get();
        //dd($userlike);
        $likefood=DB::table('meals as meals1')->where('seller',$shopid)->LeftJoin('userlikefood','meals1.id','=','userlikefood.food')->select(DB::raw('count(userlikefood.food) as usernum, meals1.id as foodid, meals1.name as foodname, meals1.price as foodprice'))->groupBy('foodid')->get();
       $test=0;
        return view('foodinformation',['userlike'=>$userlike,'likefoodusernum'=>$likefood,'test'=>$test,'shop'=>$shopid]);
    }
}


