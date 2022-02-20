<?php

include 'config.php';


$search_for =$_POST['search_e'];


$sqlr = mysqli_query($conn ," SELECT * FROM `employee` WHERE `name` LIKE '$search_for' or `email` LIKE '$search_for' or `id` LIKE '$search_for' ");

        if(mysqli_num_rows($sqlr)>0)
       {
         $slno=1;
      
         $output="";
         
           while($row = mysqli_fetch_assoc($sqlr))
         {
            $output .= '<li> <a href="#' .$row[id] .'">' .$row[name] .' </a> </li>';
         }


         echo $output;
     }
     else
     {
        echo "<li> No Data Matched </li>";
     }


?>