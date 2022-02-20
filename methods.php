<?php
session_start();
include "config.php";
include "classfolder.php";




$form =$_POST['form']; //this will define what task are we going to use 






$user = new employee();

$user->set_conn($conn);
$user->set_id($_POST['id']);

$login_id = $_POST['login_id'];
$login_pass = $_POST['login_pass'];


 
$user->set_name($_POST['name']);
$user->set_email($_POST['email']);
$user->set_age($_POST['age']);



// form 001 is used for adding a new data 
if($form === "001")
{


    if($user->add_employee())
    {
        ?> 
        <script>
        console.log("added to databse");
        location.href = 'view_d.php';
        </script>
        <?php
    }
    else
    {
        ?> 
        <script>
        alert("Filed to  add to database");
        location.href = 'view_d.php';
        </script>
         <?php
    }
   


}

// form 002 is using for generating the whole list of data 
else if($form ==="002")
{
    $user->employee_list();
    
}


//form 003 is using to delete a data from database 
else if($form === "003")
{
    if($user->remove_employee())
    {
        ?> 
        <script>
        console.log("Employee Is Remove");
        location.href = 'view_d.php';
        </script>
        <?php
    }
    else
    {
        ?> 
        <script>
        alert("Unable to remove");
        location.href = 'view_d.php';
        </script>
        <?php
    }


}


//form 004 is using to updata a data 
else if ($form === "004")
{
    if($user->employee_update())
    {
        ?> 
        <script>
        console.log("Details is updated to databse");
        location.href = 'view_d.php';
        </script>
        <?php
    }
    else
    {
        ?> 
        <script>
        alert("Filed to updated to database");
        location.href = 'view_d.php';
        </script>
         <?php
    }
   

}

//form 005 is for searching a name , id , or email
else if($form === "005")
{
    $user->employee_search_like();

}

//i am adding a new section so for admin login 
else if($form === "006")
{

    if($user->check_cred($conn,$login_id,$login_pass))
    {
        $_SESSION['login_id'] = $login_id ;
        echo "Success";
    
        
    }
    else
    {
        echo "!!Login ID or Password Wrong!!";
    }

}
else
{
    echo "form insertion is incorrect ";
}









?>