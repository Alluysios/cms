<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        
        <?php showEditRow(); ?>
        <?php updateCategoryRow(); ?>
        
        <!-- <input class="form-control" type="text" name="cat_title"> -->
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update">
    </div>
</form>