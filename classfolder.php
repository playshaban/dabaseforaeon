<?php



class employee
{
    public $c;
    public $id;
    public $name;
    public $email;
    public $age;

    function __construct() {
        $this->name = "Name Not Set";
        $this->email = "Email Not Set";
        $this->id = "0000";
        $this->age = "0000";

      }

    public function set_conn($c)
    {
        $this->c=$c;
    }

    public function set_id($i)
    {
        $this->id = $i;
    }
    public function set_name($n)
    {
        $this->name = $n;
    }
    public function set_email($e)
    {
        $this->email = $e;
    }
    public function set_age($a)
    {
        $this->age = $a;
    }

    
    
    public function add_employee()
    {
        $random_new_id = rand(100000,999999) ;
         
        $sqlr = mysqli_query($this->c ,"INSERT INTO `employee`(`id`, `name`, `email`, `age`) VALUES ( '$random_new_id','$this->name','$this->email','$this->age' )");

        return $sqlr;
        
    }
    public function remove_employee()
    {
        $sqlr = mysqli_query($this->c ,"DELETE FROM `employee` WHERE `id` = '$this->id'  ");

        return $sqlr;
        
    }


    public function employee_list()
    {
        $sqlr = mysqli_query($this->c ,"SELECT * FROM `employee` ");

        if(mysqli_num_rows($sqlr)>0)
     {
         $output="";
         $slno=1;
         
           // the "pretitle" and "posttitle" is used for generating table for the databse "
           $pre_titles .= '
           <table id="data_table">
           <tr>
           <td><strong>SL/No.</strong></td>
           <td><strong>Employee Id</strong></td>
           <td><strong>Name</strong></td>
           <td><strong>Email</strong></td>
           <td><strong>Age</strong></td>
           <td><strong>Edit Details </strong></td>
           <td><strong>Delete </strong></td>
           
           </tr> ';
           $post_title.= ' </table > ';

           while($row = mysqli_fetch_assoc($sqlr))
         {
            $parameters = ' ' .$row['id'] .' ,'.$row['age'] .' ';
            $output.= '
            <tr  id= "' .$row['id'] .'" >
            <td><strong>' .$slno .'</strong></td>
            <td> ' .$row['id']  .' </td>
            <td> ' .$row['name']  .' </td>
            <td>  ' .$row['email']  .' </td>
            <td> ' .$row['age']  .'</td>
            <td><button style="color: rgb(136, 9, 195); text-decoration: none;" id="update_e" onclick="update_e(' .$row['id'] .')"><i class="far fa-edit" ></i> Update </button> </td>
            <td> <button href="" style="color: red; text-decoration: none;" id="remove_e" onclick="remove_e(' .$row['id'] .')"><i class="fas fa-trash"></i> Delete</button> </td>
           
           </tr>
            ';

            $slno++;
         }


         echo $pre_titles.$output.$post_title;
     }
     else{
     echo "unable to read from the list";
     }
     
    }

    public function employee_update()
    {
        $sqlr = mysqli_query($this->c ," UPDATE `employee` SET `name`='$this->name',`email`='$this->email',`age`= '$this->age' WHERE `id` = '$this->id' ");

        return $sqlr;
    }
    public function employee_search_like()
    {
        $sqlr = mysqli_query($this->c ," SELECT * FROM `employee` WHERE `name` LIKE '$this->name' ");

        if(mysqli_num_rows($sqlr)>0)
       {
         $slno=1;
         $output="";
         
           while($row = mysqli_fetch_assoc($sqlr))
         {
            $output .= '<li> <a href="' .$row[id] .'">' .$row[name] .' </a> </li>';
         }


         echo $output;
     }
     else
     {
        echo "unable to read from the list";
     }
     
    }

    public function check_cred($con,$id_l,$pass_l)
    {
        $sqlr = mysqli_query($con,"SELECT `login_id`, `login_pass` FROM `cred` WHERE `login_id` = '$id_l' AND `login_pass` = '$pass_l'");

        if(mysqli_num_rows($sqlr)>0)
        {
            return true;
        }

       

    }
    





    

}






?>