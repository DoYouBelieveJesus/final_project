<!DOCTYPE html>
<html>
<head>
    <title> sds </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{'css/home.css'}}" type="text/css">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body class="fluid-container">
 @include('layout.navbar')
 <div class="col-md-offset-3 col-md-6">
<table id="commentcontainer">
    <tbody>
        <col width="10%"><col width="35%"><col width"55%">
        <tr><th colspan="3"><h1>店家名稱</h1></th></tr>
        <tr><td>食物排行</td><td><td rowspan="4"></td></tr>
        <tr><td>營業時間</td><td></td></tr>
        <tr><td>電話</td><td></td></tr>
        <tr><td>喜歡人數</td><td></td></tr>
        <tr><td class="active" colspan="3">留言</td></tr>
        @for($i=0;$i<3;$i++)
    
        <tr><td colspan="3"  class="table-danger">留言者</td></tr>
        <tr><td colspan="3" class="table-successs" style="height:70px">comment</td></tr>
        <tr><td colspan="3">time</td></tr>
        @endfor
        <tr><td colspan="3">留言</td></tr>
        <tr>
            <td colspan="3">
                 <form action="" type="post" id="comment" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <textarea name="commentword"></textarea>
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
</body>
</html>