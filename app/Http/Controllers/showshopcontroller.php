<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    public function showshopdetial()
    {
        
    }
}


