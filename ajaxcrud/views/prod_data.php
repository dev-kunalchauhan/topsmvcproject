<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table border="1" align="center">
        <tr>
                <td>Product Title</td>
                <td><input type="text" name="prod_title" id="prod_title"></td>
        </tr>
        <tr>
                <td>Product Price</td>
                <td><input type="text" name="prod_price" id="prod_price"></td>
        </tr>
        <tr>     
                <td><colspan="2" align="center">
                <input type="button" name="btn_save" value="Save" id="btn_save">
                <input type="button" name="btn_save" value="Cancel" id="btn_save"></td>   
        </tr>
        
    </table>
    <br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Product Title</th>
                <th>Product Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>    
        </thead>
        <tbody id="disProdData">
        
        </tbody>
    </table>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$.ajax({                        // $ is jquery object
    url:'getproddata',
    success:function (res){
    // alert("called");
        // console.log(res);
        var data = $.parseJSON(res); //converted string into json format to access as a object

        // console.log(data[0].Code);
        var htmldata ='';
        //data[0].Code == 1
        if (data.Code == 1) {
            htmldata +='data'
           // console.log(data.Data);
            data.Data.forEach(element => {
                // console.log(element.product_id);
                htmldata+='<tr><td>'+element.product_id+'</td><td>'+element.product_title+'</td><td>'+element.product_price+'</td></tr>';
            });

        }else{
            htmldata+='<tr><td colspan="3" align="center">No Record Found</td></tr>';
        }
        $("#disProdData").html(htmldata);
    }
})
$("#btn_save").click(function(){
       var title = $("#prod_title").val();
        price = $("#prod_price").val();
    $.ajax({                        // $ is jquery object
        url:'storeproddata',
        data: {prod_ttl:title,prod_prc:price},
        type:'post',
    success:function(res){
    // alert("called");
        console.log(res);
        var data = $.parseJSON(res); //converted string into json format to access as a object
        console.log(data.Code);
        var htmldata = '';
        if (data.Code == 1) {
            data.Data.forEach(element => {
                // console.log(element.product_id);
                htmldata+='<tr><td>'+element.product_id+'</td><td>'+element.product_title+'</td><td>'+element.product_price+'</td></tr>';
            });
            // console.log(data.Data);
            //htmldata+='<tr><td colspan="3" align="center">No Record Found</td></tr>';
        }else{
            htmldata+='<tr><td colspan="3" align="center">No Record Found</td></tr>';
        }
        $("#disProdData").html(htmldata);
     }
})
});

</script>
</html>