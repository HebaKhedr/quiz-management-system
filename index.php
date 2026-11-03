<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login_style.css">
  <title>Home Page</title>
  <link rel="icon" href="Quizzo_logo.png" type="image/x-icon"> 
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
 <div id ="myDiv">
  <div id="logo"><img src="Quizzo_main_logo.png" width="180px"/></div>
  <div class="copyright">
   Copyright &copy; Quizzo By HNAYA Team
  </div>
  <div class="dots-3"></div>
 </div>

 <div id="container" class="container">
  <div class="row">
   
   <div class="col align-items-center flex-col sign-up">
    <div class="form-wrapper align-items-center">
     <form action="auth.php" method="POST" class="form sign-up">
      <div class="input-group">
       <i class='bx bxs-user'></i>
       <input name="email" type="email" placeholder="Email *" required>
      </div>
      <div class="input-group">
       <i class='bx bx-mail-send'></i>
       <input name="username" type="text" placeholder="Username *" required>
      </div>
      <div class="input-group">
       <i class='bx bxs-lock-alt'></i>
       <input name="password" type="password" placeholder="Password *" required>
      </div>
      <div class="input-group">
       <i class='bx bxs-lock-alt'></i>
       <input name="confirm_password" type="password" placeholder="Confirm Password *" required>
      </div>
      <button type="submit" name="signup_btn">Create Account</button>
      <p><span>Already have an account?</span><b onclick="toggle()" class="pointer">Sign in here</b></p>
     </form>
    </div>
   </div>

   <div class="col align-items-center flex-col sign-in">
    <div class="form-wrapper align-items-center">
     <form action="auth.php" method="POST" class="form sign-in">
      <div class="input-group">
       <i class='bx bxs-user'></i>
       <input name="login_email" type="text" placeholder="Email *" required>
      </div>
      <div class="input-group">
       <i class='bx bxs-lock-alt'></i>
       <input name="login_password" type="password" placeholder="Password *" required>
      </div>
      <button type="submit" name="login_btn">Submit</button>
      <p><span>Don't have an account?</span><b onclick="toggle()" class="pointer">Sign up here</b></p>
     </form>
    </div>
   </div>

  </div>

  <div class="row content-row">
   <div class="col align-items-center flex-col">
    <div class="text sign-in"><h2>Happy to see you</h2></div>
    <div class="img sign-in"></div>
   </div>
   <div class="col align-items-center flex-col">
    <div class="img sign-up"></div>
    <div class="text sign-up"><h2>Team Quizzo Welcomes you</h2></div>
   </div>
  </div>
 </div>

 <script>
  document.querySelector(".container").classList.add("hidden");
  setTimeout(function(){
   document.getElementById("myDiv").style.display = "none";
   document.querySelector(".container").classList.remove("hidden");
  },5000);
    
  let container = document.getElementById('container')
  toggle = () => {
   container.classList.toggle('sign-in')
   container.classList.toggle('sign-up')
  }
  setTimeout(() => {
   container.classList.add('sign-in')
  }, 5200)
 </script>
</body>
</html>