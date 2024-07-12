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
        $query = "SELECT * FROM student ORDER BY id";
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($this->conn));
        }

        return $result;
    }

    public function get_data_by_id($id) {
        $query = "SELECT * FROM student WHERE id = $id";
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($this->conn));
        }

        return mysqli_fetch_assoc($result);
    }

    public function update_data($data) {
        $id = $data['id'];
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
            $query = "UPDATE student SET std_name = '$std_name', std_roll = '$std_roll', std_img = '$std_img' WHERE id = $id";

            if (mysqli_query($this->conn, $query)) {
                return "Information Updated Successfully";
            } else {
                return "Failed to Update Information: " . mysqli_error($this->conn);
            }
        } else {
            return "Failed to Upload Image";
        }
    }

    public function delete_data($id) {
        $query = "DELETE FROM student WHERE id = $id";

        if (mysqli_query($this->conn, $query)) {
            // Reorder IDs sequentially
            $this->reorder_ids();

            return "Information Deleted Successfully";
        } else {
            return "Failed to Delete Information: " . mysqli_error($this->conn);
        }
    }

    private function reorder_ids() {
        $query = "SET @count = 0;
                  UPDATE student SET id = @count := @count + 1;
                  ALTER TABLE student AUTO_INCREMENT = 1;";

        if (mysqli_multi_query($this->conn, $query)) {
            do {
                // Consume all results
                if ($result = mysqli_store_result($this->conn)) {
                    mysqli_free_result($result);
                }
            } while (mysqli_next_result($this->conn));
        } else {
            die("Reorder IDs Query Failed: " . mysqli_error($this->conn));
        }
    }
}

?>
