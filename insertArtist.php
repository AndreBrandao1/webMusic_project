<?php


if (isset($_POST['submitBtn'])) {
  echo 'form is submitted';

  $name = $_POST['artist'];
  $biography = $_POST['biography'];
  $birthyear = $_POST['birthyear'];
  $gender = $_POST['gender'];

  //connect to DB

  $conn = mysqli_connect('localhost', 'root', '', 'spotify');
  if ($conn) {
    echo ' connection success';
  } else {
    echo ' not connecting';
  }

  $query = "INSERT INTO artist (name,biography,year_of_birth,gender) VALUES('$name','$biography','$birthyear','$gender')";
  echo $query;

  $results = mysqli_query($conn, $query);
  if ($results) {
    echo "it works";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Artist</title>
</head>

<body>

  <h1> FORM</h1>
  <form method="POST">

    <input type="text" name="artist" placeholder="insert an artist"> <br>
    <input type="text" name="biography" placeholder="biography"> <br>
    <input type="text" name="birthyear" placeholder="date of birth"><br>
    <input type="text" name="gender" placeholder="gender"><br>
    <input type="submit" name="submitBtn" value="send">

  </form>
</body>

</html>