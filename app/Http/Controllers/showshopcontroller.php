<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class showshopcontroller extends Controller
{
    public function showshop()
    {
         $AllShops=DB::table('shops')->get();
         return view('showshop',['AllShop'=>$AllShops]);       
    }
}
