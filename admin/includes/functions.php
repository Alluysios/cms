<?php

function confirm($result) {
    global $connection;

    if (!$result) {

        die("failed posting". mysqli_error($connection));
        
    }
}

function showAllCategory() {
    global $connection;
    
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query); 

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id']; 
        $cat_title = $row['cat_title']; 

        echo "<tr>
                <th scope='row'>{$cat_id}</th>
                <td>{$cat_title}</td>
                <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
            </tr>";
    }
}

?>


<?php
function createCategoryRow() { 
        if(isset($_POST['create'])) {

            global $connection;
            $cat_title = $_POST['cat_title'];


            if ($cat_title == "" || empty($cat_title)) {
                echo "This field is required";
            } else {
                $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";

                $create_category_query = mysqli_query($connection, $query);

                if(!$create_category_query) {

                    die("FAILED TO CREATE");

                }
            }
        }
}
?>

<?php
function showEditRow() {
        if(isset($_GET['edit'])) {
            global $connection;

            $update_cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $update_cat_id";
            $select_categories = mysqli_query($connection, $query); 

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id']; 
                $cat_title = $row['cat_title']; 
    ?>
            <input type="text" value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
    <?php
        }
    } 
} ?>

<?php
function updateCategoryRow() {
    if(isset($_POST['update'])) {
        global $connection;

        $update_cat_id = $_GET['edit'];
        $update_cat_title= $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = '$update_cat_title' WHERE cat_id = $update_cat_id";
        $update_query = mysqli_query($connection, $query);
        if (!$update_query) {
            die("QUERY FAILED");
        } else {
            header("Location: categories.php");
        }
    }
}
?>


<?php
function deleteCategoryRow() { // DELETE QUERY

    if(isset($_GET['delete'])) {
        global $connection;

        $delete_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = $delete_cat_id";

        $delete_query = mysqli_query($connection, $query);

        header("Location: categories.php");
    }
}
?>


