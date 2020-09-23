<?php
    //DATABASE CONNECTION;
        $conn = mysqli_connect('localhost','root','','image_upload');
        //initialize msg variable;
        $message = '';

    //ON BUTTON CLICK
        if(isset($_POST['upload_btn'])){
            //get image name;
            $img = $_FILES['image']['name'];
            //get text;
            $img_text = mysqli_real_escape_string($conn, $_POST['image_text']);

            //img file directory;
            $location = "images/".basename($img);
            $insertQuery = 'INSERT INTO images(img,img_text) VALUES('$img','$img_text')';
            //execute querry ;
            mysqli_query($conn,$insertQuery);
            if(move_uploaded_file($_FILES['image']['tmp_name'],$location)){
                $message = 'Successfully uploaded image';
            }else{
                $message = 'Failed to upload image';
            }
        }
        $myresult = mysqli_query($conn, "SELECT * FROM images");


?>

<!DOCTYPE html>
<html>
<head>
    <title>User check</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <div class="container">
        <div>
            <?php
                $row = mysqli_feth_array($myresult);
                while($row){
                    echo "<div id = 'img_div'>";
                        echo "<img src = 'images/"$row['img']."'>";
                        echo "<p>".$row['img_text']."</p>";
                    echo "</div>";
                }

              ?>
        </div>
        <form method="post" action="main.php" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="size" value="1000000" class="form-control"><br>
            </div>
            <div class="form-group">
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <textarea name="image_text" placeholder="Hello" class="form-control z-depth-1">
                </textarea>
            </div>
            
            <button class="btn btn-primary btn-block" name="upload_btn" type="submit">POST</button>
            
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
</body>
</html>
