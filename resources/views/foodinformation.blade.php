@extends('layouts.app')

@section('content')
<div class="col-xs-offset-3  col-xs-6">
    <table class="table table-hover">
        <tbody id="shopinfor">
            <col width="25%"><col width="50%"><col widht="25%">
            <tr><th>like</th><th>名稱</th><th>價格</th></tr>
            @foreach($meals as $meal)
            <tr><td><button class="button"><span class="glyphicon glyphicon-heart" aria-hidden="true"></td> <td> {{ $meal->name}}</td><td> {{ $meal->price}}</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection