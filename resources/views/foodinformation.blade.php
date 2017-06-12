@extends('layouts.app')

@section('content')
<div class="col-xs-offset-3  col-xs-6">
    <table class="table table-hover">
        <tbody id="shopinfor">
            <col width="25%"><col width="50%"><col widht="25%">
            <tr><th>like</th><th>名稱</th><th>價格</th></tr>
            @if($likefoodusernum->count()==0)
            abc
            @endif
            @foreach ($likefoodusernum as $food)
            <tr><td>
                   
                    <form>
        
                    <button type="submit" class="redbutton" style="color:red"><span class="glyphicon glyphicon-heart" aria-hidden="true"></button>
    
                    </form>
                    
            </td> 
            <tr><td>$food->food</td><td>$food->usernum</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection