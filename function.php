<?php

class crudApp {
    private $conn;

    public function __construct() {
        // database host, database user, password, name
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpassword = '';
        $dbname = 'crudapp';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

        if (!$this->conn) {
            die("Database Connection Error: " . mysqli_connect_error());
        }
    }

    public function add_data($data) {
        $std_name = $data['std_name'];
        $std_roll = $data['std_roll'];
        $std_img = $_FILES['std_img']['name'];
        $tmp_name = $_FILES['std_img']['tmp_name'];
        $upload_dir = 'uploads/';

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $target_file = $upload_dir . basename($std_img);

        if (move_uploaded_file($tmp_name, $target_file)) {
            $query = "INSERT INTO student (std_name, std_roll, std_img) VALUES ('$std_name', '$std_roll', '$std_img')";

            if (mysqli_query($this->conn, $query)) {
                return "Information Added Successfully";
            } else {
                return "Failed to Add Information: " . mysqli_error($this->conn);
            }
        } else {
            return "Failed to Upload Image";
        }
    }

    public function display_data() {
        $query = "SELECT * FROM student";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}

?>
