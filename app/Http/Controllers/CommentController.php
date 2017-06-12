<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\shop;

class CommentController extends Controller
{
    public function upload_comment(Request $request , $shop)
    {
//        echo Auth::id();
//        $shopID = DB::table('shops')->where('name' , $shop)->value('id');
//        echo $shopID;

    }
}