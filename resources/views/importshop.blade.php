@extends('layouts.app')

@section('content')
<div class="col-xs-offset-4  col-xs-4">
<form action="{{url('/importshop/result')}}"  method="POST" id="importshop" enctype="multipart/form-data">
    <table id="importshopselector" align="center" name="firsttable">
    <tbody name="firsttbody">
        {{ csrf_field() }}
    <col width="20%">
    <col width="80%">
    <tr><th colspan="2">店家資訊</th></tr>
    <tr><td>店名</td><td><input type="text" form="importshop" name="shopname"></td></tr>
    <tr><td>電話</td><td><input type="text" form="importshop" name="telephone"></td></tr>
    <tr><td>住址</td><td><input type="text" form="importshop" name="address"></td></tr>
    <tr><td>營業時間</td><td><input type="number" name="hourfrom" min="0" max="24" form="importshop">
            :<input type="number" name="minfrom" min="0" max="60" form="importshop">
            ~<input type="number" name="hourto" min="0" max="24" form="importshop">
            :<input type="number" name="minto" min="0" max="60" form="importshop">
    </td></tr>
    <tr><td>粉專/官網</td><td><input type="text" name="website" form="importshop"></td></tr>
    @if(count($errors) > 0)
    <tr><td colspan="2">
    <div class="col-xs-offset-3  col-xs-6">
        <div class="alert alert-warning">
    <strong>@if($errors->has('shopname'))
            {{$errors->first('shopname')}}      
            @elseif($errors->has('hourfrom')||$errors->has('hourto')||$errors->has('minfrom')||$errors->has('minto'))
            {{$errors->first('hourfrom')}}
            @elseif($errors->has('website'))
            {{$errors->first('website')}}
            @endif</strong>
            </div>
           </div> </td></tr>
    @endif
    </tbody>
</table>
    <table id="importshopselector">
        <tbody>
        <col width="50%"><col width="50%">
        <tr>
               <td><input name="cancelbutton" type="submit" class="addrowbutton" value="取消"></td>
                <td>    
                    <input type="submit" class="addrowbutton" value="提交/輸入食物" form="importshop"></td>
        </tr>
        </tbody>                    
    </table>
    </form>
    </div> 
@endsection