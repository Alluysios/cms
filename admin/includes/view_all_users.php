<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query); 

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];


            echo 
            "
            <tr>
                <th scope='row'>{$user_id}</th>
                <td>{$username}</td>
                <td>{$user_firstname}</td>";


                // GETTING IN RESPONSE
                // $query = "SELECT * FROM posts where post_id = $comment_post_id";
                // $select_post_id_query = mysqli_query($connection, $query);

                
            echo "
                <td>{$user_lastname}</td>
                <td>{$user_email}</td>";

/*                 while($row = mysqli_fetch_assoc($select_post_id_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];

                    echo "
                        <td><a href='../post.php?p_id=$comment_post_id'>{$post_title}</a></td>
                        ";
                } */
                
                // <td><a href='users.php?update_admin={$user_id}' class='btn btn-warning btn-sm text-black'>Admin</a></td>
                // <td><a href='users.php?update_subscriber={$user_id}' class='btn btn-warning btn-sm text-black'>Subscriber</a></td>
                // <td><a href='users.php?update_editor={$user_id}' class='btn btn-warning btn-sm text-black'>Editor</a></td>
            echo "
                <td>{$user_role}</td>
                <td><a href='users.php?delete={$user_id}' class='btn btn-primary'>Delete</a></td>
                <td><a href='users.php?source=edit_user&edit_user={$user_id}' class='btn btn-primary'>Edit</a></td>
            </tr>";
        }

        

            


            // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            // $select_categories = mysqli_query($connection, $query); 

            // while ($row = mysqli_fetch_assoc($select_categories)) {
            //     $cat_id = $row['cat_id']; 
            //     $cat_title = $row['cat_title']; 
            // }

        if(isset($_GET['update_admin'])) {

            $the_user_id = $_GET['update_admin'];

            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
            $admin_update_query = mysqli_query($connection, $query);

            confirm($admin_update_query);


            header("Location: users.php");
        }

        if(isset($_GET['update_subscriber'])) {

            $the_user_id = $_GET['update_subscriber'];

            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
            $subscriber_update_query = mysqli_query($connection, $query);

            confirm($subscriber_update_query);


            header("Location: users.php");
        }

        if(isset($_GET['update_editor'])) {

            $the_user_id = $_GET['update_editor'];

            $query = "UPDATE users SET user_role = 'Editor' WHERE user_id = $the_user_id";
            $admin_update_query = mysqli_query($connection, $query);

            confirm($admin_update_query);


            header("Location: users.php");
        }


        if(isset($_GET['delete'])) {
            $the_user_id = $_GET['delete'];


            $query = "DELETE FROM users WHERE user_id = $the_user_id ";

            $delete_query = mysqli_query($connection, $query);

            confirm($delete_query);


            header("Location: users.php");
        }
    ?>
    </tbody>
</table>