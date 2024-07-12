<?php 
include("function.php");

$objectCrudAdmin = new crudApp();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student_data = $objectCrudAdmin->get_data_by_id($id);
}

if (isset($_POST['update_info'])) {
    $return_msg = $objectCrudAdmin->update_data($_POST);
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Student</title>
</head>
<body>
<div class="container my-4 p-4 shadow">
    <h2><a style="text-decoration: none;" href="index.php">Edit Student</a></h2>
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <?php if (isset($return_msg)) { echo $return_msg; } ?>
        <input type="hidden" name="id" value="<?php echo $student_data['id']; ?>">
        <input class="form-control mb-2" type="text" name="std_name" value="<?php echo $student_data['std_name']; ?>" placeholder="Enter Your Name" id="">
        <input class="form-control mb-2" type="number" name="std_roll" value="<?php echo $student_data['std_roll']; ?>" placeholder="Enter Your Roll" id="">
        <label for="image">Upload Your Image</label>
        <input class="form-control mb-2" type="file" name="std_img" id="">
        <input type="submit" value="Update Information" name="update_info" class="form-control bg-warning">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
