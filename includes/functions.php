<?php include "db.php" ?>

<?php
function confirm($result) {
    global $connection;
    
    if (!$result) {

        die("failed posting" . mysqli_error($connection));
        
    }
}

?>