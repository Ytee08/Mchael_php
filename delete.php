<?php 
    require_once './includes/conn.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        echo "Item id is = $id" ;

        $query = "DELETE from employess WHERE id ='$id'";
        $stmt = $conn->prepare($query);
        
        $stmt->execute();

        
        header('location: ./index.php');
        echo "Data deleted successfully";

    }
 
?>