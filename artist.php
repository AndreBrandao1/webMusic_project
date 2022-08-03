<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artists</title>
  <link rel="stylesheet" href="styles/reset.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;600;700&family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/index.css">
</head>

<body>
  <?php
  $conn = new mysqli('localhost', 'root', '', "spotify");
  $artists = mysqli_query($conn, "SELECT * from artist ");


  ?>
  <table>
    <?php
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {


      foreach ($artists as $artist) : ?>
        <?php
        $musicQuery = mysqli_query($conn, "SELECT COUNT(*) as musicC from music INNER JOIN artist on music.artist_id = artist.id WHERE artist.id = " . $artist['id']);

        $musicCouting = mysqli_fetch_assoc($musicQuery);
        ?>
        <div class="artistEL">
          <p><?= $artist['name'] ?></p>
          <p><?= mb_strimwidth($artist['biography'], 0, 20, "...") ?></p>
          <p><?= $artist['gender'] ?></p>
          <p><?= $musicCouting['musicC'] ?> </p>
        </div>
    <?php endforeach;
    }
    ?>
  </table>
</body>

</html>