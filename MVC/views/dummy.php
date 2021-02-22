<!DOCTYPE html>
<html>
<body>

<table id="main" border="0" cellspacing="0">
<tr>
<td id="header">
Ajax
</td>
</tr>

<tr>
    <td>
    <input type="button" id="load-button" value="load Data">
    </td>  
</tr>

<tr>
    <td id="table-data">
        <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                <tr>
                    <td align="center"></td>
                </tr>
        </table>
    </td>
</tr>
</table>

<script type="text/javascript" src="js/jquery"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("#load-data").on("click",function(e){
        $.ajax({
            url:"ajax-load.php"
            success:function (data) {
                $("#table-data").html(data);
            }
        })
    });
});
</script>
</body>
</html>