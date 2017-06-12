@extends('layouts.app')

@section('content')

    <div class="col-md-offset-1 col-md-10">
   <table class="table table-hover">
        <tbody>
            <tr><th>店名</th><th>電話</th><th>營業時間</th><th>Rank</th><th>官網/粉絲專業</th><th>&nbsp;</th></tr>
                @if($AllShop->count()==0)
                <tr><td colspan="6" class="showshop">目前沒有資料</td></tr>
                @else   
                @foreach($AllShop as $shop)
                <tr class="showshop">
                        <td>{{$shop->name}}</td><td>{{$shop->telephone}}</td><td>{{$shop->businessFrom}}~{{$shop->businessTo}}</td><td>test</td><td><a href="{{$shop->website}}">{{$shop->website}}<a></td><td><a href="/shop/{{$shop->id}}">more...</a></td>
                </tr>
                @endforeach
                <tr class="showshop"><td></td></tr>
             @endif
        </tbody>
   </table>
</div>
@endsection