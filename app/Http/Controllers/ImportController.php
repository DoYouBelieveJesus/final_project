<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImportController extends Controller
{
    public function importshop(Request $request)
    {
        //die("$request->canclebutton");
        $messages = [
            'shopname.required' => '該輸入店名ㄅ',
            'hourto.required'=> '要輸入營業時間喔',
            'hourfrom.required'=> '要輸入營業時間喔',
            'minto.required'=> '要輸入營業時間喔',
            'minfrom.required'=> '要輸入營業時間喔',                        
            'website.url'=>'輸入的網站怪怪ㄟ'
        ];
        $this->validate($request, [
        'shopname' => 'required',
        'hourto' => 'required',
        'hourfrom' => 'required',
        'minto'=>'required',
        'minfrom' =>'required',
        'website'=> 'nullable|url'
        ], $messages);
       // dd($errors[0]);
        if(is_null($request->cancelbutton))
        {
        
        
        $timefrom = $request->hourfrom . ':' . $request->minfrom;
        $timeto = $request->hourto . ':' . $request->minto;
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
            $businesstime=$businesstime-(11-$businesstimefrom);
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
            $businesstime=$businesstime-(17-$businesstimefrom);
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
            $businesstime=$businesstime-(21-$businesstimefrom);
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
            if($businesstimefrom<6)
            {
                $businesstime=$businesstime-(6-$businesstimefrom);
            }
            else
            {
                $businesstime=$businesstime-(30-$businesstimefrom);
            }
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
        else 
        {
            return redirect('/shop');
        }
    }
    public function importfood(Request $request)
    {
        $counter=0;
        foreach ($request->food as $food)
        {
            if(!is_null($food['name']))
            {
               // dd("test");
                $counter++;
            }
           // dd($request->food);
        }    
        if($counter==0)
        {
                    //dd("abc");
                    //die("$request->canclebutton");
           // dd($request->food[0]['name']);
            $messages = ["food[0]['name'].required" => '該輸入食物ㄅ'];
            $this->validate($request, ["food[0]['name']"=>'required'], $messages);
        }

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
         
        
        return redirect('/shop');
    }

   
}