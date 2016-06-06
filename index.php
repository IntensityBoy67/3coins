<!DOCTYPE html>
<html lang="en">
 

 <?php require 'required/header.php'; ?>


  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" method= "POST" action="check_login.php">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" name = "uname"  autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name = "password" class="form-control" placeholder="Password">
            </div>
           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
          
        </div>

      </form>

    </div>


  </body>
</html>
