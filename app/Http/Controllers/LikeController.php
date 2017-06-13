<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Meal;
use Auth;
class LikeController extends Controller
{
     public function foodlike(Request $request,$shop,$meal)
     {
         //die("test");
         if(Auth::check())
         {
            $userid=Auth::id();
                if(!is_null($request->loveheart))
                {
                    DB::table('userlikefood')->where('user','=',"$userid")->where('food','=',"$meal")->delete();
                }
                else if(!is_null($request->cancelheart))
                {
                     DB::table('userlikefood')->insert(
                    ['user'=>$userid,'food'=>$meal]);
                }
                return redirect()->back();
         }
         else
         {
             $userid=0;
             return redirect()->back()->with('alert', 'Deleted!');
         }
         

         
     }
     public function shoplike(Request $request,$shop)
     {
         if(Auth::check())
         {
            $userid=Auth::id();
         }
         else
         {
             $userid=0;
         }
         if(!is_null($request->loveheart))
         {
                DB::table('userlikeshop')->where('user','=',$userid)->where('shop','=',$shop)->delete();
         }
         else if(!is_null($request->cancelheart))
         {
                DB::table('userlikeshop')->insert(
                    ['user'=>$userid,'shop'=>$shop]);
         }
         return redirect()->back();
     }
}
