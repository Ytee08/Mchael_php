<?php 

    require_once './includes/conn.php';

    if(isset($_GET['id'])){
        $id = $_GET['id']; 


        $query ="SELECT * FROM employess WHERE id= '$id' ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        // print_r($results["name"]);

        if(isset($_POST['submit'])){
           
            $name = $_POST['name'];
            $position = $_POST['position'];
            $age = $_POST['age'];            

            $query = "UPDATE employess SET name= '$name', position='$position' , age= '$age' WHERE id ='$id' ";
            $stmt = $conn->prepare($query);
            
            $stmt->execute();

            header('location: ./index.php');

            

            


        }      
    }




 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <h1 class="table">Employees Table</h1>
    <h2>Update</h2>
    <form  target = "" method="post" id="form">
        <label for="name">
        Name:
            <input name="name" id="name" value="<?php echo $results["name"]?>" type="text" >
        </label>

        <label for="position">
            position:
            <input name="position" id="position" value="<?php echo $results["position"]?>" type="text">
        </label>

        <label for="age">
            Prodct age:
            <input name="age" id="age" value="<?php echo $results["age"]?>" type="number">
        
        </label>


        <input name="submit" type="submit"  id="submit">
    </form>
    
</body>
</html>