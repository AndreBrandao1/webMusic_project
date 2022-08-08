<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles/reset.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;600;700&family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/index.css">
</head>

<body>
  <div class="Maincontainer">
    <div class="songContainer">

      <?php
      $conn = new mysqli('localhost', 'root', '', "spotify");

      $songsQuery = mysqli_query($conn, "SELECT * from music ");

      $songs = mysqli_fetch_all($songsQuery, MYSQLI_ASSOC);



      foreach ($songs as $song) : ?>

        <?php
        $artistQuery = mysqli_query($conn, "SELECT artist.name AS artistName from artist INNER JOIN music on music.artist_id = artist.id
     WHERE artist.id = $song[artist_id]");

        $artists = mysqli_fetch_assoc($artistQuery);
        ?>
        <div class="songEl">
          <img src="assets/<?= $song['image'] ?>" />
          <p><?= $song['title'] ?></p>
          <p><?= $artists['artistName'] ?></p>
        </div>


      <?php endforeach; ?>
    </div>
    <input type="submit" name="ASC" value="ASC">
    <input type="submit" name="DSC" value="DSC">
  </div>
</body>

</html>