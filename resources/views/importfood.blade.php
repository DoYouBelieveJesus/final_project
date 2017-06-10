<!DOCTYPE html>
<html>
<head>
    <title> sds </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{'css/home.css'}}" type="text/css">
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="js/main.js"></script>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body class="fluid-container">
@include('layout.navbar')
<div class="col-xs-offset-4  col-xs-4">
    <table id="importshopselector" align="center" name="firsttable">
    <tbody name="firsttbody">
    <form action="{{url('/importfood/result')}}"  method="POST" id="importfood" enctype="multipart/form-data">
        {{ csrf_field() }}
        </form>
    <col width="20%">
    <col width="80%">
    <tr><th colspan="2">食物 <button onclick="addrow()" class="" type="button"  style="float: right;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button></th></tr>
    <tr><td>項目</td><td><input type="text" name="food[0][name]" placeholder="名稱" style="width:60%" form="importfood">
                    <input type="text" name="food[0][price]" placeholder="價格" style="width:20%" form="importfood">
                    </td></tr>
    <tr><td>項目</td><td><input type="text" name="food[1][name]" placeholder="名稱" style="width:60%" form="importfood">
                    <input type="text" name="food[1][price]" placeholder="價格" style="width:20%" form="importfood"></td></tr>
    <tr><td>項目</td><td><input type="text" name="food[2][name]" placeholder="名稱" style="width:60%" form="importfood">
                    <input type="text" name="food[2][price]" placeholder="價格" style="width:20%" form="importfood"></td></tr>
   <tr><td>項目</td><td><input type="text" name="food[3][name]" placeholder="名稱" style="width:60%" form="importfood">
                    <input type="text" name="food[3][price]" placeholder="價格" style="width:20%" form="importfood"></td></tr>
    <tr><td>項目</td><td><input type="text" name="food[4][name]" placeholder="名稱" style="width:60%" form="importfood">
                    <input type="text" name="food[4][price]" placeholder="價格" style="width:20%" form="importfood"></td></tr>
    <tr><td>項目</td><td><input type="text" name="food[5][name]" placeholder="名稱" style="width:60%" form="importfood">
                    <input type="text" name="food[5][price]" placeholder="價格" style="width:20%" form="importfood"></td></tr> 
    </tbody>
</table>
    <table id="importshopselector">
        <tbody>
        <col width="50%"><col width="50%">
        <tr>
                <td><button onclick="window.location='{{URL::to('/shop')}}'" class="addrowbutton">取消</button></td>    
                <td><input type="submit" class="addrowbutton" value="提交" form="importfood"></td>
        </tr>
        </tbody>                    
    </table>
    </div> 
</body>
</html>