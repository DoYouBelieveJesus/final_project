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
<div class="col-xs-offset-4  col-xs-4"  >
    <table id="importshop" align="center">
    <tbody>
    <form id="importshop">
        </form>
    <tr><th colspan="2">店家資訊</th></tr>
    <tr><td>店名</td><td><input type="text"></td></tr>
    <tr><td>電話</td><td><input type="text"></td></tr>
    <tr><td>住址</td><td><input type="text"></td></tr>
    <tr><td>營業時間</td><td><input type="number" name="hourfrom" min="0" max="24">
            :<input type="number" name="minfrom" min="0" max="60">
            ~<input type="number" name="hourto" min="0" max="24">
            :<input type="number" name="minto" min="0" max="60">
    </td></tr>
    <tr><td>粉絲專業/網站</td><td><input type="text"></td></tr>
    <tr><th colspan="2">食物</th></tr>
    <tr><td>項目</td><td><input type="text" placeholder="名稱" style="width:60%">
                    <input type="text" placeholder="價格" style="width:20%"></td></tr>
    <tr><td>項目</td><td><input type="text" placeholder="名稱" style="width:60%">
                    <input type="text" placeholder="價格" style="width:20%"></td></tr>
    <tr><td>項目</td><td><input type="text" placeholder="名稱" style="width:60%">
                    <input type="text" placeholder="價格" style="width:20%"></td></tr>
    
    </tbody>
</table>
    <table id="importshop">
        <tbody>
        <tr>
                <td><button onclick="addrow()" class="addrowbutton">增加食物</button></td>    
                <td><button onclick="" class="addrowbutton">提交</button></td>
                </tr>
        </tbody>                    
    </table>
    </div> 
</body>
</html>