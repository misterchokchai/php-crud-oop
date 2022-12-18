<?php
include_once('functions.php');

    $updatedata = new DB_con();

    if(isset($_POST['update'])){
        $userid = $_GET['id'];
        $fname = $_POST['Firstname'];
        $lname = $_POST['Lastname'];
        $email = $_POST['Email'];
        $phonenumber = $_POST['PhoneNumber'];
        $address = $_POST['Address'];
    
    $sql = $updatedata->update($fname, $lname, $email, $phonenumber, $address, $userid);
        if($sql){
            echo "<script>alert('Update data successfully');</script>" ;
            echo "<script>window.location.href='index.php' ;</script>";
        } else {
            echo "<script>alert('Something went wrong try again !');</script>" ;
            echo "<script>window.location.href='update.php' ;</script>";
        }
    }
?>

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
    <h1 class="mt-3">Udate user form<a href="index.php" class="btn btn-danger">Go back</a> </h1>

        <?php
        $userid = $_GET['id'];
        $userupdate = new DB_con();
        $sql = $userupdate->fetchonerecord($userid);
        
        while($row = mysqli_fetch_array($sql)){
        ?>

        <form action="" method="POST">

            <div class="mb-3">
                <label for="Firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="Firstname" value="<?php echo $row['Firstname'];?>" required >
            </div>
            <div class="mb-3">
                <label for="Lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="Lastname" value="<?php echo $row['Lastname'];?>" required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" name="Email" value="<?php echo $row['Email'];?>" required>
            </div>
            <div class="mb-3">
                <label for="PhoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="PhoneNumber" value="<?php echo $row['PhoneNumber'];?>" required>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <textarea name="Address" class="form-control" cols="30" rows="10"  required><?php echo $row['Address'];?> </textarea>

            </div>
            <?php } ?>

            <button type="submit" class="btn btn-success" name="update">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>