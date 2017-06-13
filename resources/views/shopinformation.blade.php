@extends('layouts.app')

@section('content')
 <div class="col-md-offset-3 col-md-6">
 <div id="commentcontainer">
<table  class="table table-bordered" id="test">
    <tbody>
       <col width="15%"><col width="35%"> <col width="15%"><col width="35%">
        <tr><th colspan="4"><h1>{{$Shop->name}}</h1></th></tr>     
        <tr><td>營業時間</td><td>{{$Shop->businessFrom}}~{{$Shop->businessTo}}</td><td>電話</td><td>{{$Shop->telephone}}</td></tr>
         <tr><td>食物排行</td><td colspan="3"><a href="/shop/{{$Shop->id}}/meal">more...</a><td></tr>
        <tr><td>位置</td><td colspan="3">{{$Shop->address}}</td></tr>
        <tr><td>喜歡人數</td><td colspan="3">
                    <form action="/shop/{{$Shop->id}}/like/result" id="likeshop" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{$shoplikenum}}
                    @if($userlikes==1)
                    <!--留言的人bug-->
                    <button type="submit" name="loveheart" value="1" class="redbutton" style="color:red" form="likeshop"><span class="glyphicon glyphicon-heart" aria-hidden="true"></button>
                    @elseif($userlikes==0)
                    <button type="submit" name="cancelheart" value="0" class="redbutton" style="color:black" form="likeshop"><span class="glyphicon glyphicon-heart" aria-hidden="true"></button>
                   
                    @endif
                </form>
                </td></tr>
    </tbody>
</table>
<table class="table table">
    <tbody>
    

       <col width="10%"><col width="35%"><col width="55%">
        <tr><td colspan="3">留言</td></tr>
    
        @foreach($shopcomments as $shopcomment)
    
        <tr rowspan="3">
            <td colspan="3">
            <div style="text-align:left">{{$shopcomment->commenter}}<div> 
         <div class="commentwords" style="text-align:center">  {{$shopcomment->comment}}</div><div  style="text-align:right">{{$shopcomment->time}}</div></tr>
        @endforeach
            <td colspan="3">
                 <form action="/shop/comment/{{$Shop->id}}" method="POST" id="comment" enctype="multipart/form-data">
                    {{ csrf_field() }}

                <textarea name="commentword" placeholder="留些甚麼..." form="comment" required autofocus></textarea>           
            </td>

        </tr>
        <tr>
                <td colspan="3" style="text-align:right">
                    <input type="submit" value="留言" form="comment">
                </td>
</form>
        </tr>
                
     </tbody>
</table>
</div>
</div>
@endsection