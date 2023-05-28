<!DOCTYPE html>
<?php
    session_start();
    //include('./dbcon.php');
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musify</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/Musify/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
        <ul>
            <li class="brand"><a href="index.html"><img src="https://i.pinimg.com/736x/91/67/43/9167433f004a4b108a228572866c882b.jpg" alt="Spotify"></a></li>
            <li><a href =".../pop.html">HOME</a></li>
            <li><a href ="/musicrough/about.html">ABOUT US</a></li>
            <<?php if(isset($_SESSION['verified_user_id'])): ?>
              <li><a class="btn btn-danger" data-toggle="modal"><?php echo "Welcome ".$_SESSION['status'] ?> <i class="fa fa-power-off"></i></a></li>
                        <!--<button class="btn btn-danger" data-toggle="modal">Logout</button>-->
                        <?php //unset($_SESSION['verified_user_id']) ?>
                      <?php else: ?>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#loginModal">Login</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>
                      <?php endif; ?>
            <li><a href="/musicrough/index.php">MAIN PAGE</a></li>
        </ul>
    </nav>
  <div class="wrapper">
    <div class="top-bar">
      <i class="material-icons">expand_more</i>
      <span>Now Playing</span>
      <i class="material-icons">more_horiz</i>
    </div>
    <div class="img-area">
      <img src="" alt="">
    </div>
    <div class="song-details">
      <p class="name"></p>
      <p class="artist"></p>
    </div>
    <div class="progress-area">
      <div class="progress-bar">
        <audio id="main-audio" src=""></audio>
      </div>
      <div class="song-timer">
        <span class="current-time">0:00</span>
        <span class="max-duration">0:00</span>
      </div>
    </div>
    <div class="controls">
      <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
      <i id="prev" class="material-icons">skip_previous</i>
      <div class="play-pause">
        <i class="material-icons play">play_arrow</i>
      </div>
      <i id="next" class="material-icons">skip_next</i>
      <i id="more-music" class="material-icons">queue_music</i>
    </div>
    <div>
      <?php if(isset($_SESSION['status'])):?>
        <iframe width="400" height="315" src="https://www.youtube.com/embed/4NRXx6U8ABQ?autoplay=1&loop=1&mute=1&playlist=4NRXx6U8ABQ&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <?php endif; ?>
          <!----<iframe width="560" height="315" src="https://www.youtube.com/embed/EOJtgk8a4YY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--->
    </div>
    <div class="music-list">
      <div class="header">
        <div class="row">
          <i class= "list material-icons">queue_music</i>
          <span>Music list</span>
        </div>
        <i id="close" class="material-icons">close</i>
      </div>
      <ul>
        <!-- here li list are coming from js -->
      </ul>
    </div>
  </div>
  <script src="js/music-list.js"></script>
  <script src="js/script.js"></script>

</body>
</html>