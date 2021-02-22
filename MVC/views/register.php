<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- Phone No -->
      <label class="control-label" for="phoneno">PhoneNo</label>
      <div class="controls">
        <input type="text" name="Login_phoneno" onkeyup="validateFeedback()" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your Phone No</p>
        <script>

          function validateFeedback(){
              var phone = document.getElementById("Login_phoneno");
              var RE = /^[\d\.\-]+$/;
              if(!RE.test(Login_phoneno.value))
              {
                  alert("You have entered an invalid phone number");
                  return false;
              }
              return true;
          }
        // function ValidateNo() {
        //   var val = Login_phoneno.value
        //   if (/^\d{10}$/.test(val)) {
        //       // value is ok, use it
        //   } else {
        //       alert("Invalid number; must be ten digits")
        //       number.focus()
        //       return false
        // }
        // }
        
        </script>
        
        
        <!-- <span id="usernameErrorMsg"></span>
                <script>
                function checkreq(e,spanId) {
                    if(e.value == ''){
                        $("#"+spanID).css("color","red")
                        $("#"+spanId).text("this field is required")
                    }else{
                        $("#"+spanId).text("")
                    }
                }
                </script> -->
      </div>
    </div>

     <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" name="login_email" onblur="emailcheck()" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
        <script>
        function emailcheck(){
                var string1=document.example.login_email.value
                if (string1.indexOf("@")==-1){
                    alert("Please input a valid email address!")
                    document.example.login_email.focus()
                }
            }
        </script>       

      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" name="login_password" placeholder="" class="input-xlarge" required>
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" name="btn-regist">Register</button>
      </div>
    </div>
  </fieldset>
</form>
</body>
</html>