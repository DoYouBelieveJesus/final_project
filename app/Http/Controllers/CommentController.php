<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\shop;
use Carbon;

class CommentController extends Controller
{
    public function upload_comment(Request $request ,$shop)
    {        
         if(Auth::check())
         {
            $userid=Auth::id();
         }
         date_default_timezone_set('Asia/Taipei');
         $mytime = Carbon\Carbon::now();
          DB::table('shopcomments')->insert(
                    ['shoper'=>$shop,
                    'time'=>$mytime,
                    'commenter'=>$userid,
                    'comment'=>$request->commentword]);
       //  dd($request->commentword);
      //  $shopID = DB::table('shops')->where('name' , $shop)->value('id');
        // echo $shopID;
        return redirect()->back();
    }
}