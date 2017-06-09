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
<h1>店家名稱</h1>
<table id="commentcontainer">
    <tbody>
        <tr><th colspan="2">留言</th></tr>
        @for($i=0;$i<3;$i++)
    
        <tr><td  colsapn="2">留言者</td></tr>
        <tr><td>commenter</td><td style="width:20%">time</td></tr>
        @endfor
        <tr><td colspan="2">留言<td></tr>
        <tr>
            <td colspan="2">
            <form action="" type="" id="comment">
                <textarea rows="1" cols="96"></textarea>
            </from>
            </td>

        </tr>
        <tr>
                <td colspan="2" style="text-align:right">
                    <input type="submit" value="留言" form="comment">
                </td>
        </tr>
     </tbody>
<table>
<div>
</body>
</html>