@extends('layouts.app')

@section('content')
 <div class="col-md-offset-3 col-md-6">
<table id="commentcontainer" class="table table-bordered">
    <tbody>
       <col width="15%"><col width="35%"> <col width="15%"><col width="35%">
        <tr><th colspan="4"><h1>{{$Shop->name}}</h1></th></tr>     
        <tr><td>營業時間</td><td>{{$Shop->businessFrom}}~{{$Shop->businessTo}}</td><td>電話</td><td>{{$Shop->telephone}}</td></tr>
         <tr><td>食物排行</td><td colspan="3"><a href="/shop/{{$Shop->id}}/meal">more...</a><td></tr>
        <tr><td>位置</td><td colspan="3">{{$Shop->address}}</td></tr>
        <tr><td>喜歡人數</td><td colspan="3"><button class="button"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
</button></td></tr>
        
    </tbody>
</table>
<table id="commentcontainer" class="table table">
    <tbody>
       <col width="10%"><col width="35%"><col width="55%">
        <tr><td colspan="3">留言</td></tr>
    
        @for($i=0;$i<3;$i++)
    
        <tr rowspan="3"><td colspan="3">留言者 <br>
            comment <br>time</tr>
        @endfor
            <td colspan="3">
                 <form action="" type="post" id="comment" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <textarea name="commentword" placeholder="留些甚麼..."></textarea>
                </form>
            
            </td>

        </tr>
        <tr>
                <td colspan="3" style="text-align:right">
                    <input type="submit" value="留言" form="comment">
                </td>
        </tr>
     </tbody>
</table>
</div>
@endsection