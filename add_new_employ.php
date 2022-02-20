

<div class="add_e">
<h2>Add A New Employee</h2>
<form action="methods.php" method="post" autocomplete="off">
<table>
    <input type="text" name="form" value="001" hidden>
    <tr>
    <td><label >Full Name</label></td>
    <td><input type="text" name="name" required></td>
    </tr>
    <tr>
    <td><label >Email </label></td>
    <td><input type="text" name="email" required></td>
    </tr>
    <tr>
    
    <td><label >Age</label></td>
    <td><input type="number" min="10" max="45" name="age" required></td>
    </tr> 
    </table>
    <div class="sbm">
    <input type="button" value="Cancel" onclick="cancel_a()">
    <input type="submit" value="Save">
   </div>

</form>
</div>

