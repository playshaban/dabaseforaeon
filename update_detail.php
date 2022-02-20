<div class="update">
            <h2>Update Information Of Employee</h2>
            <form action="methods.php" method="post">
                <table>
                    <input type="text" name="form" value = "004" hidden>
                    <input type="text" name="id" id="id_update" value="" hidden> 
                    <tr>
                    <td><label >Full Name</label></td>
                    <td><input type="text" id="name_update" value="" name="name"></td>
                    </tr>
                    <tr>
                    <td><label >Email </label></td>
                    <td><input type="text" id="email_update" value="" name="email"></td>
                    </tr>
                    <tr>
                    
                    <td><label >Age</label></td>
                    <td><input type="number"  id="age_update" value="" min="10" max="45" name="age"></td>
                    </tr> 
                    </table>
                    <div class="sbm">
                    <input type="button" value="Cancel" onclick="cancel_u()">
                    <input type="submit" value="Update">
                   </div>
                
            </form>

        </div>