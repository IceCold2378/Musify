<?php
include('dbcon.php');
//include('logincode.php');
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Welcome to Musify. A blog for coding enthusiasts">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Musify - Perfect for Music Enthusiasts</title>
</head>
<style>
  .textalign{
    margin-bottom: 10%;
    font-size: 25px;
  }
  .button-link{
    text-decoration: none;
    color: white;
  }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a href="index.php"><img src="https://i.pinimg.com/736x/91/67/43/9167433f004a4b108a228572866c882b.jpg" width="50px" height="50px"></a>
      <a class="navbar-brand" href="#">Musify</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Playlists
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="https://open.spotify.com/playlist/37i9dQZF1DXbVhgADFy3im">Trending</a>
                      <a class="dropdown-item" href="https://open.spotify.com/playlist/37i9dQZF1DX0ieekvzt1Ic">Newest</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Help & Support</a>
                      <a class="dropdown-item" href="contact.php">Write to us</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <!---//localhost/rough/contactus2.php-->
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-4 my-sm-0" type="submit">Search</button>
            </form>
            <div class="mx-2">
            <?php if(isset($_SESSION['verified_user_id'])): ?>
                        <a class="btn btn-danger" data-toggle="modal"><?php echo "Welcome ".$_SESSION['status'] ?> <i class="fa fa-power-off"></i></a>
                        <!--<button class="btn btn-danger" data-toggle="modal">Logout</button>-->
                        <?php unset($_SESSION['verified_user_id']) ?>
                      <?php else: ?>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#loginModal">Login</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>
                      <?php endif; ?>
            </div>
        </div>
    </nav>

 
  
  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login to Musify</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="logincode.php" method="post" id="loginpg">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="username"aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1"name="password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary"name="login">Login</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        </div>
      </div>
    </div>
  </div>
  <!-- Sign Up Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Get an Musify Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php
          if(!isset($_SESSION['status']))
          {
              echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
              unset($_SESSION['status']);
          }
          ?>
        <form action="register.php" method="post" id="signuppg">
                <div class="form-group">
                  <label for="name">Nickname/Username</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" required> 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword2" name="exampleInputPassword2" required>
                </div>
                 
                <button type="submit" class="btn btn-primary" name="button" >Create Account</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        </div>
      </div>
    </div>
  </div>

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="m1.jpg" class="d-block w-100" width="1600" height ="600" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="textalign">
                      <h2>Welcome to Musify</h2>
                      <p>Discover, stream, and share a constantly expanding mix of music <br>from emerging and major artists around the world.</p>
                      <button class="btn btn-danger"><a href="https://open.spotify.com/playlist/37i9dQZF1DXcBWIGoYBM5M" class="button-link">Today's Top Hits</a></button>
                      <button class="btn btn-primary"><a href="https://open.spotify.com/playlist/37i9dQZF1DX2SaVGyZ9hsv" class="button-link">Rising Artists</a></button>
                      <button class="btn btn-success"><a href="https://open.spotify.com/playlist/37i9dQZEVXbLZ52XmnySJg" class="button-link">Top 50 Global</a></button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://morungexpress.com/sites/default/files/field/image/listening-to-music-1504007126-article-0.jpg" class="d-block w-100" width="1600" height ="600" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <div class="textalign">
                    <h2>The Best Music Steaming Site</h2>
                    <p>With a variety of albums,songs & artists</p>
                    <button class="btn btn-danger"><a href="https://open.spotify.com/playlist/37i9dQZF1DXcBWIGoYBM5M" class="button-link">Today's Top Hits</a></button>
                    <button class="btn btn-primary"><a href="https://open.spotify.com/playlist/37i9dQZF1DX2SaVGyZ9hsv" class="button-link">Rising Artists</a></button>
                    <button class="btn btn-success"><a href="https://open.spotify.com/playlist/37i9dQZEVXbLZ52XmnySJg" class="button-link">Top 50 Global</a></button>
                  </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1613093335399-829e30811789?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bXVzaWMlMjBzaG93fGVufDB8fDB8fA%3D%3D&w=1000&q=80" class="d-block w-100" width="1600" height ="600" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <div class="textalign">
                    <h2>Award nominations for being a popular music site.</h2>
                    <p>Among other sites like Spotify,Soundcloud,Gaana,etc</p>
                    <button class="btn btn-danger"><a href="https://open.spotify.com/playlist/37i9dQZF1DXcBWIGoYBM5M" class="button-link">Today's Top Hits</a></button>
                    <button class="btn btn-primary"><a href="https://open.spotify.com/playlist/37i9dQZF1DX2SaVGyZ9hsv" class="button-link">Rising Artists</a></button>
                    <button class="btn btn-success"><a href="https://open.spotify.com/playlist/37i9dQZEVXbLZ52XmnySJg" class="button-link">Top 50 Global</a></button>
                  </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container my-4">
        <div class="row mb-2">
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">Best of Rap</strong>
                  <h3 class="mb-0">Best rap songs of 2022</h3>
                  <div class="mb-1 text-muted">Nov 12</div>
                  <p class="card-text mb-auto">Best of latest and trending Drake,Travis Scott,Future,Polo G and many others</p>
                  <a href="Musify/indexm.php" id="playlist1" class="stretched-link">Go to playlist</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  <img class="bd-placeholder-img" width="200" height="250" src="https://townsquare.media/site/812/files/2021/07/attachment-best-hip-hop-projects-2021-so-far-photo.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-success">Best of Classical</strong>
                  <h3 class="mb-0">Best of Classical & Regional Songs 2022</h3>
                  <div class="mb-1 text-muted">Nov 11</div>
                  <p class="mb-auto">Songs in Spanish,Hindi,African languages and many more are available</p>
                  <a href="regional.php" id="playlist2" class="stretched-link">Go to playlist</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img class="bd-placeholder-img" width="200" height="250" src="https://i.scdn.co/image/ab67706c0000bebb1da40ad6c7704a5997ca72d7" alt="">

                </div>
              </div>
            </div>
          </div>
        <div class="row mb-2">
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-danger">Best of EDM</strong>
                  <h3 class="mb-0">Best of EDM Songs and Remixes</h3>
                  <div class="mb-1 text-muted">Nov 12</div>
                  <p class="card-text mb-auto">From Martin Garrix, Dimitri Vegas, DJ Snake to Ritwiz and Nucleya</p>
                  <a href="Musify/edm.php" id="playlist3" class="stretched-link">Go to playlist</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  <img class="bd-placeholder-img" width="200" height="250" src="https://www.industryfreak.com/wp-content/uploads/2019/02/Top-20-EDM-Artist.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-warning">Best of Pop</strong>
                  <h3 class="mb-0">Best of Pop and R&B songs</h3>
                  <div class="mb-1 text-muted">Nov 11</div>
                  <p class="mb-auto">From Ed Sheeran,Harry Styles,The Weeknd,BTS to Sonu Nigam,Armaan Malik, Arijit Singh and many more.</p>
                  <a href="Musify/pop.php" id="playlist4" class="stretched-link">Go to playlist</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img class="bd-placeholder-img" width="200" height="250" src="https://static.wixstatic.com/media/b8becd_a69aab20c99541eb88442b814673c098~mv2.jpg/v1/fill/w_1000,h_1000,al_c,q_90,usm_0.66_1.00_0.01/b8becd_a69aab20c99541eb88442b814673c098~mv2.jpg" alt="">

                </div>
              </div>
            </div>
          </div>
    </div>
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2020-2021 Musify, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>