<input type="text" name="username" id="username" >
<input type="button" name="btn" onclick="savedata()" id="btn" value="save">




<script>
function savedata(){
    var name_data = $("#username").val();
    $.ajax({
        url:"ajaxload",
        data:{username:name_data},
        success:function(){
            console.table(name_data);
        }
    })
}
</script>