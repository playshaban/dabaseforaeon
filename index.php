<?php
session_start();

if(!empty($_SESSION['login_id']))
{
    ?> <script> location.href = 'welcome.php' </script> <?php
}
?>
<!DOCTYPE html>
<head>
<title>AL Databse</title>
<link rel="stylesheet" href="index.css">

</head>
<body>
    <div class="container">
        <header>
            <div class="logo"><img src="https://www.aeonlogiciel.com/images/logo-1.png" width="15%" alt=""></div>
        </header>
            <h1> Hello Mister Shaban Khan  </h1>
            <h2>Admin Login Pannel</h2>
            <div class="error_msg">
                <p>Reporting an error</p>
            </div>


            <div class="login">
           
            <form  method="post" autocomplete="off">
                <table>
                    <input type="text" name="form" value="006" hidden>
                    <tr>
                        <td><label >Enter Login ID</label></td>
                        <td><input type="text" name="login_id"  required></td>
                    </tr>
                    <tr>
                        <td><label >Enter Password </label></td>
                        <td><input type="password" name="login_pass" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" id="login_btn" value="Login" onclick="check_cred()">
                        </td>
                    </tr>
                </table>
            
                
    

            </form>
            </div>
    </div>

  <script>
        const error_msg = document.querySelector(".error_msg");

        const form = document.querySelector(".login form");

        form.onsubmit = (e)=>
        {
        e.preventDefault();
        }

        function check_cred()
       {
        console.log("sending and varifying the true data");
         let xhr = new XMLHttpRequest();
            xhr.open("POST", "methods.php",true);
            xhr.onload = ()=>
             {
                if(xhr.readyState === XMLHttpRequest.DONE)
                {
                 if(xhr.status === 200)
                   {
                    let data = xhr.response;

                    if(data=="Success")
                    {
                        location.href = 'welcome.php';
                    }
                    else
                    {
                        error_msg.style.display = "block";
                        error_msg.innerHTML = data;
                    }
                    
                   }
                    else
                   {
                     
                      console.log("connection not made");
                   }
               }
            }
           let formdata = new FormData(form);
           xhr.send(formdata);

    }
  </script>
</body>