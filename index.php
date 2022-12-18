<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h1 class="mt-3">All user account <a href="insert.php" class="btn btn-success">Insert user</a> </h1> 
    <table id="mytable" class="table table-bordered table-stripped">
        <thead>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Posting Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

        <tbody>
            <?php
            include_once('functions.php');

            $fetchdata = new DB_con();
            $sql = $fetchdata->fetchdata();

            while($row = mysqli_fetch_array($sql)){

            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Firstname']; ?></td>
                    <td><?php echo $row['Lastname']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['PhoneNumber']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['PostingDate']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php
             }
            ?>
        </tbody>
    </table>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>