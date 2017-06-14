@extends('layouts.app')

@section('content')
<div class="col-xs-offset-3  col-xs-6">

    <div id="searchresults">
            <form  action="{{url('search')}}" method="POST"  role="search" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{$search_input}}" name="search_input">
                <div id="custom-search-input">
                     <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Search for your food" name="search_input1">
                            <span class="input-group-btn">
                            <button class="btn btn-default btn-lg" type="submit" id="searchbutton" name="search">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </span>
                    </div>   
            </div>

            <div class="btn pull-right" id="choicebutton">
                    <button type="submit" name="meal_only" class="btn btn-primary" value="0">Meal-Only</button>
                    <button type="submit" name="shop_only" class="btn btn-primary" value="0">Shop-Only</button>
                    <button type="submit" name="show_all" class="btn btn-success" value="0">Show-All</button>
            </div>
            </form>
    </div>


    <div id="searchresults">
        @if($showshop==1)
    <table class="table">
    <tbody>
    <col width="25%"><col width="25%"><col width="25%"><col width="25%">
    <tr><th colspan="5" style="font-size:25px;">店家資訊</th></tr>
    <tr><th>店名</th><th>食物類型</th><th>喜歡人數</th><th>more</th></tr>
    @foreach($Allshop as $shop)
    <tr>
        <td>{{$shop->name}}</td>

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
        <td>{{$shop->likenum}}</td>
        <td><a href="shop/{{$shop->id}} ">{{$shop->name}}</a></td>
    </tr>
    @endforeach
    <tr><td colspan="5"> &nbsp;</td></tr>
    </tbody>

</table>
            @endif
</div>
    @if($showmeal==1)
    <div class="searchresult" id="searchresults">
        <table class="table">
        <tbody>
        <col width="25%"><col width="25%"><col width="25%"><col width="25%">
    <tr><th colspan="5" style="font-size:25px;">食物</th></tr>
    <tr  style="text-align:center"><th  style="text-align:center">食物名</th><th>價格</th><th>喜歡人數</th><th>more</th></tr>
    @foreach($Allmeal as $meal)
    <tr>
        <td>{{$meal->name}}</td>

        <td>{{$meal->price}}</td>
        <td>{{$meal->likenum}}</td>
        <td><a href="shop/{{$meal->shops_id}}/meal">{{$meal->shops_name}}</a></td></tr>
    @endforeach
        <tr><td colspan="5"> &nbsp;</td></tr>
        </tbody>                    
    </table>

    </div>
        @endif
    </div> 
@endsection