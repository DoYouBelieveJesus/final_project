@extends('layouts.app')

@section('content')
<div class="col-xs-offset-3  col-xs-6">
    <div id="searchresults">
            <form  action="" method="get"  role="search"> 
            
                <div id="custom-search-input">
                     <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Search for your food" id="search-input"/>
                            <span class="input-group-btn">
                            <button class="btn btn-default btn-lg" type="button" id="searchbutton">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </span>
                    </div>   
            </div>
            
            <div class="btn pull-right" id="choicebutton">
                    <button type="submit" class="btn btn-primary">Meal-Only</button>
                    <button type="submit" class="btn btn-success">Shop-Only</button>
            </div>
    </div>

    
    <div id="searchresults">
    <table class="table">
    <tbody>
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <tr><th colspan="5" style="font-size:25px;">店家資訊</th></tr>
    <tr><th>店名</th><th>住址</th><th>食物類型</th><th>喜歡人數</th><th>more</th></tr>
    @for($i=0;$i<3;$i++)
    <tr><td>test</td><td>test1</td><td>test2</td><td>test3</td><td>test4</td></tr>
    @endfor
    <tr><td colspan="5"> &nbsp;</td></tr>
    </tbody>
</table>
<div>
    <div class="searchresult" id="searchresults">
        <table class="table">
        <tbod>
        <col width="20%"><col width="20%"><col width="20%"><col width="20%"><col width="20%">
    <tr><th colspan="5" style="font-size:25px;">食物</th></tr>
    <tr  style="text-align:center"><th  style="text-align:center">食物名</th><th>店家</th><th>價格</th><th>喜歡人數</th><th>more</th></tr>
    @for($i=0;$i<3;$i++)
    <tr><td>test</td><td>test1</td><td>test2</td><td>test3</td><td>test4</td></tr>
    @endfor
        <tr><td colspan="5"> &nbsp;</td></tr>
        </tbody>                    
    </table>
    </div>
    </div> 
@endsection