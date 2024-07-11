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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Asif</td>
                        <td>10001</td>
                        <td></td>
                        <td>
                            <a class="btn btn-success" href="#">Edit</a>
                            <a class="btn btn-warning" href="#">Delet</a>

                        </td>
                    </tr>
                </tbody>
            </thead>
        </table>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>