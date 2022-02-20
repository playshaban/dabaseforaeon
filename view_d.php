<?php

session_start();

if(!isset($_SESSION['login_id']))
{
    ?> <script> location.href = 'index.php' </script> <?php
}

?>

<!DOCTYPE html>
<head>
 <title>View Database</title>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<link rel="stylesheet" href="view_d.css">

</head>
<body>

    <header>
        <div class="logo"><img src="https://www.aeonlogiciel.com/images/logo-1.png" width="15%" alt=""></div>

        <h1> AEON LOGICIEL EMPLOYEE DATEBASE </h1>

    <h2>All Employe Data presented</h2>
    </header>


    
<nav>
    <button id="add_btn"><i class="fas fa-folder-plus"></i> Add A Record </button>
    <div class="search">

        
            <div class="search_list">
            <form method="post" autocomplete="off">
            <input type="text" name="form" value="005" hidden>
            <input type="text" id="search_input" name="search_e" value="" placeholder="Search employee">
            <button id="search_btn">Search</button>
            </form>
            <ul class="search_results">
               
            </ul>
            </div>
        
          
         
        
     </div>
</nav>

         <?php include "add_new_employ.php"; ?>
         <?php include "update_detail.php"; ?>
         <?php include "remove_employe.php"; ?>
        
       

      
        <div class="container">
        
      
    </div>
    <!--
    from here i will decleare a form of value 002 using ajax, which will give me a generated list inside table


     -->
     <form id="list_form" method="post" >
            <input type="text" name="form" value="002" hidden>
            
     <input type="submit" value="Save" hidden>
    </form>


    <footer>
        <a href="welcome.php"> <i class="fa-solid fa-trash-can"></i> Back</a>
        
        <div class="version" >
       <h4> © A Shaban Khan Software AL Logicial <br> Version 1.0.0 </h4>
       
</div>
    </footer>



    <script>
        const add = document.querySelector("nav #add_btn");


        const add_e = document.querySelector(".add_e");
       
        const table = document.querySelector(".container");

        const edit = document.querySelector(".update");

        const update = table.querySelector("tr td #update_e");
       
        const delete_e = document.querySelector(".delete_e");
        

        const search_e = document.querySelector(".search");
        const search_input = search_e.querySelector("#search_input");
        const search_list = search_e.querySelector(".search .search_results ");
        const search_btn = search_e.querySelector("#search_btn")



        const form = document.querySelector("#list_form");

        const form_five = document.querySelector(".search form");


        add.onclick=()=>
        {
            
            add_e.style.display = "block";
            
        }
        function cancel_a()
        {
            
            add_e.style.display = "none";
           
        }
        


        function update_e(i)
        {
            edit.style.display ="block";
            document.querySelector(".update #id_update").value = i;
            

        }
        function cancel_u()
        {
            edit.style.display ="none";
        }


        function remove_e(ide)
        {
            
            delete_e.style.display="block";
            document.querySelector(".delete_e #id_e").value = ide;
        }
        
        function cancel_d()
        {
            
            delete_e.style.display="none";
        }





        setInterval(function search_employe()
        { 
            if(search_input.value !="")
            {

                search_list.style.display ="block";
                
                
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "search_bar.php",true);
                xhr.onload = ()=>
               {
                  if(xhr.readyState === XMLHttpRequest.DONE)
                  {
                      if(xhr.status === 200)
                      {
                        let data = xhr.response;
                        search_list.innerHTML = data;
                        console.log(data);
                      }
                      else
                      {
                        console.log("connection not made");
                      }
               }
            }
           let formdata = new FormData(form_five);
           xhr.send(formdata);

            }
            else
            {
                search_list.style.display ="none";
            }
           
        },500);

       setInterval(() => {

                let xhr = new XMLHttpRequest();
            xhr.open("POST", "methods.php",true);
            xhr.onload = ()=>
             {
                if(xhr.readyState === XMLHttpRequest.DONE)
                {
                 if(xhr.status === 200)
                   {
                    let data = xhr.response;
                    table.innerHTML = data;
                   }
                    else
                   {
                      console.log("connection not made");
                   }
               }
            }
           let formdata = new FormData(form);
           xhr.send(formdata);
                
        }, 1000);
            

       


    </script>
</body>