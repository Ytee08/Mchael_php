<?php 

require_once './includes/conn.php';
$query ="SELECT * FROM employess";
$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll();

// print_r($results);

// echo $host;

if(isset($_POST['submit'])) {
    // print_r($_POST);



    $name = $_POST['name'];
    $position = $_POST['position'];
    $age = $_POST['age'];

    $query = "INSERT INTO employess(name, position, age) VALUES (:name, :position, :age)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('name', $name);
    $stmt->bindParam('position', $position);
    $stmt->bindParam('age', $age);

    $stmt->execute();


    // Redirect to avoid resubmission on refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    echo "Data inserted successfully";
    exit();

   
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" >
    <title>CRUD</title>
</head>
<body>


    
    <h1 class="table">Employees Table</h1>

    <form  target = "" method="post" id="form">
        <label for="name">
          Name:
            <input name="name" id="name" type="text">
        </label>

        <label for="position">
            position:
            <input name="position" id="position" type="text">
        </label>

        <label for="age">
            Prodct age:
            <input name="age" id="age" type="number">
           
        </label>


        <input name="submit" type="submit" name="" id="submit">
    </form>


    
    <br>

    <div>
        <h1 class="table">Sample Table</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Product Name</th>
                    <th>Product position</th>
                    <th>age</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $id = 0;
                foreach($results as $employess){  
                   $id++; 
                ?>
                   <tr>
                       <td><?php echo $id ?></td>
                       <td><?php echo $employess['name'] ?></td>
                       <td><?php echo $employess['position'] ?></td>
                       <td><?php echo $employess['age'] ?></td>
                   </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
</body>
</html>