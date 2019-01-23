
<?php
    if(isset($_POST['add_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];

        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        move_uploaded_file($user_image_temp, "../img/$user_image");

        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_image, user_email, user_password) ";

        $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_image}', '{$user_email}', '{$user_password}') ";

        $create_user_query = mysqli_query($connection, $query);

        confirm($create_user_query);
    }
?>
<form action="" method="post" enctype="multipart/form-data">    
     
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" id="role" class="form-control" style="width: 15%;" required>
            <option value="">Select Options</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
            <option value="Contributor">Contributor</option>
            <option value="Editor">Editor</option>
        </select>
    </div>

      
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control "name="user_password">
    </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
      </div>

</form>