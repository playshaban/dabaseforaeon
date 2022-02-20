<?php



class employee
{
    public $id;
    public $name;
    public $email;
    public $age;


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

    
    public function add_employee($this->id,$this->name,$this->email,$this->age)
    {
        echo "hello form actions";
        
    }

}


?>