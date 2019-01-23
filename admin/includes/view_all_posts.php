<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Author</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Status</th>
            <th scope="col">Image</th>
            <th scope="col">Content</th>
            <th scope="col">Tags</th>
            <th scope="col">Comments</th>
            <th scope="col">Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $query); 

        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 20) . '.....';
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            


            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            $select_categories = mysqli_query($connection, $query); 

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id']; 
                $cat_title = $row['cat_title']; 
            }
            echo 
                "
                <tr>
                    <th scope='row'>{$post_id}</th>
                    <td>{$post_author}</td>
                    <td>{$post_title}</td>
                    <td>{$cat_title}</td>
                    <td>{$post_status}</td>
                    <td style='text-align:center;'><img src='../img/{$post_image}' width='150' height='80'></td>
                    <td>{$post_content}</td>
                    <td>{$post_tags}</td>
                    <td>{$post_comment_count}</td>
                    <td>{$post_date}</td>
                    <td><a href='posts.php?source=edit_post&p_id={$post_id}' class='btn btn-primary'>Edit</a></td>
                    <td><a href='posts.php?delete={$post_id}' class='btn btn-primary'>Delete</a></td>
                </tr>";
        }

        if(isset($_GET['delete'])) {
            $post_id = $_GET['delete'];


            $query = "DELETE FROM posts WHERE post_id = $post_id ";

            $delete_query = mysqli_query($connection, $query);

            confirm($delete_query);


            header("Location: posts.php");
        }
    ?>
    </tbody>
</table>