@extends('layouts.app')

@section('content')
<div class="col-xs-offset-3  col-xs-6">
    <table class="table table-hover">
        <tbody id="foodinfor">
            <col width="25%"><col width="50%"><col widht="25%">
            <tr><th>like</th><th>名稱</th><th>價格</th></tr>
            @if($likefoodusernum->count()==0)
            @endif
            @foreach ($likefoodusernum as $food)
            <tr><td>
                    <form action="/shop/{{$shop}}/food/{{$food->foodid}}/like/result" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        {{$food->usernum}}
                        @foreach($userlike as $like)
                            @if($like->foodid==$food->foodid)
                             <?php   $test=1;?>
                            @endif
                        @endforeach
                    @if($test)                
                    <button type="submit" name="loveheart" value="1" class="redbutton" style="color:red"><span class="glyphicon glyphicon-heart" aria-hidden="true"></button>
                    @else
                    <button type="submit" name="cancelheart" value="0" class="redbutton" style="color:black"><span class="glyphicon glyphicon-heart" aria-hidden="true"></button>
                         
                    
                       
                    @endif
                    </form>
                    </td>
                        <?php $test=0; reset($userlike)?>
            <td>{{$food->foodname}}</td><td>{{$food->foodprice}}</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection