
<?php

    if(isset($_GET['edit_user'])) {
        $the_user_id = $_GET['edit_user'];

        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_users_by_id = mysqli_query($connection, $query);

        confirm($select_users_by_id);

        while ($row = mysqli_fetch_assoc($select_users_by_id)) {
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }

    

    if(isset($_POST['update_user'])) {
        $user_id = $_GET['edit_user'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];

        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        move_uploaded_file($user_image_temp, "../img/$user_image");

        if(empty($user_image)) {
            $query = "SELECT user_image FROM users WHERE user_id = $the_user_id";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image)) {
                $user_image = $row['user_image'];
            }

        }

        $query = "UPDATE users SET 
                    user_firstname          = '$user_firstname',
                    user_lastname           = '$user_lastname',
                    user_role               = '$user_role',
                    username                = '$username',
                    user_image              = '$user_image',
                    user_email              = '$user_email',
                    user_password           = '$user_password'
                    WHERE user_id           = $user_id";

        $update_post = mysqli_query($connection, $query);

        confirm($update_post);
    }
?>
<form action="" method="post" enctype="multipart/form-data">    
     
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
    </div>

    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" id="role" class="form-control" style="width: 15%;" required>
            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
            <?php

            if($user_role == 'Admin') {
                echo "<option value='Subscriber'> Subscriber </option>
                    <option value='Contributor'>Contributor</option>
                    <option value='Editor'>Editor</option>";
            } else if ($user_role == 'Subscriber') {
                echo "<option value='Admin'>Admin</option>
                    <option value='Contributor'>Contributor</option>
                    <option value='Editor'>Editor</option>";
            } else if ($user_role == 'Editor') {
                echo "<option value='Admin'> Admin </option>
                <option value='Contributor'>Contributor</option>
                <option value='Subscriber'>Subscriber</option>";
            } else {
                echo " <option value='Admin'>Admin</option>
                    <option value='Subscriber'> Subscriber </option>
                    <option value='Contributor'>Contributor</option>
                    <option value='Editor'>Editor</option>";
            }
            ?>
        </select>
    </div>

      
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    
    <div class="form-group">
        <img src="../img/<?php echo $user_image; ?>" alt="" width="250">
        <label for="user_image">Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control "name="user_password" value="<?php echo $user_password ?>">
    </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
      </div>

</form>