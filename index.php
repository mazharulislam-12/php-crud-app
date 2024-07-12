<?php 
    include("function.php");

    $objectCrudAdmin = new crudApp();

    if(isset($_POST['add_info'])){
        $return_msg = $objectCrudAdmin -> add_data($_POST);
    }

    $students =  $objectCrudAdmin -> display_data(); 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD App</title>
  </head>
  <body>

    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index.php">Student Database</a></h2>

        <form class="form" action="" method="post" enctype="multipart/form-data">
            <?php if(isset($return_msg)) {echo $return_msg;} ?>
            <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter Your Name" id="">
            <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter Your Roll" id="">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-2" type="file" name="std_img" id="">
            <input type="submit" value="Add Information" name="add_info" class="form-control bg-warning">
        </form>
    </div>

    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($student = mysqli_fetch_assoc($students)) { ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['std_name']; ?></td>
                    <td><?php echo $student['std_roll']; ?></td>
                    <td><img src="uploads/<?php echo $student['std_img']; ?>" alt="Image" style="width:50px;height:50px;"></td>
                    <td>
                        <a class="btn btn-success" href="#">Edit</a>
                        <a class="btn btn-warning" href="#">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>
