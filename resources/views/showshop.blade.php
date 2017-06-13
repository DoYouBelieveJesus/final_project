@extends('layouts.app')

@section('content')

    <div class="col-md-offset-2 col-md-8">
    <div id="showshop">
   <table class="table table-hover">
        <tbody>
            <col width="15%"><col width="18%"><col width="18%"><col width="3%"><col width="30%"><col width="7%">
            <tr><th>店名</th><th>電話</th><th>四餐類別</th><th>Rank</th><th>官網/粉絲專業</th><th>&nbsp;</th></tr>
                @if($AllShop->count()==0)
                <tr><td colspan="6">目前沒有資料</td></tr>
                @else   
                @foreach($AllShop as $shop)
                <tr>
                        <td>{{$shop->name}}</td><td>{{$shop->telephone}}</td>
                        <td>
                           <?php $mealtype=$shop->mealtype; ?>
                            @if($mealtype==1||$mealtype==3||$mealtype==5||$mealtype==7||$mealtype==9||$mealtype==11||$mealtype==13||$mealtype==15)
                                 <?php $mealtype=$mealtype-1 ?>
                                 早餐
                            @endif
                            @if($mealtype==2||$mealtype==6||$mealtype==10||$mealtype==14)
                                 <?php $mealtype=$mealtype-2 ?>
                                 午餐
                            @endif
                            @if($mealtype==4||$mealtype==12)
                                 <?php $mealtype=$mealtype-4 ?>
                                 晚餐
                            @endif
                            @if($mealtype==8)
                                 <?php $mealtype=$mealtype-8 ?>
                                 消夜
                            @endif
                            </td>
                            <td>{{$shop->likenum}}</td><td><a href="{{$shop->website}}">{{$shop->website}}<a></td><td><a href="/shop/{{$shop->id}}">more...</a></td>
                </tr>
                @endforeach
                <tr><td></td></tr>
             @endif
        </tbody>
   </table>
   </div>
</div>
@endsection