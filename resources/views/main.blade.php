@extends('layouts.app')

@section('content')

   <div class="col-xs-offset-3 col-xs-6">
    <table class="searchbarcontainer">
        <tbody>
        <tr><td>Just Eat</td></tr>
        <tr><td class="searchbarcontainer">
        <form  action="" method="get"  role="search" > 
            <div class="col-xs-offset-2 col-xs-8">
                <div id="custom-search-input">
                     <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Search for your food" id="search-input"/>
                            <span class="input-group-btn">
                            <button class="btn btn-default btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </span>
                    </div>
                </div>
            </div>
        </form>
        </td></tr>
        </tbody>
            <table>
<div>

@endsection