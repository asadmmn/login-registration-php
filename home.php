<?php
require_once "conn.php";
$query= "SELECT * FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP CRUD </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .btn{
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px;margin-bottom: 20px;">
                    <div class="card-body">
                        <h2 class="pull-left">User Details <a href="create.php" class="btn btn-success pull-right">Add New User</a><a href="logout.php" class="btn btn-success pull-right">Logout</a></h2>
                       <h2>Iam practicing web development<h2>
                    </div>
                </div>
                <?php
                if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Name</th>";
                        echo "<th>Address</th>";
                        echo "<th>Age</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['age'] . "</td>";
                            echo "<td>";
                            echo "<a href='read.php?id=" . $row['id'] . "' class='btn btn-primary'>Read</a>";
                            echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-info'>Update</a>";
                            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        $result->free();
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>