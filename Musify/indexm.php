<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    //include('./dbcon.php');
?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Musify - Your favourite music is here</title>
        <link rel="stylesheet" href="style.css">
        </head>
<body>
    <nav>
        <ul>
            <li class="brand"><a href="index.html"><img src="https://i.pinimg.com/736x/91/67/43/9167433f004a4b108a228572866c882b.jpg" alt="Spotify"></a></li>
            <li><a href ="indexm.php">HOME</a></li>
            <li><a href ="../about.html">ABOUT US</a></li>
            <?php if(isset($_SESSION['verified_user_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""><?php echo "Welcome ".$_SESSION['status'] ?> <i class="fa fa-power-off"></i></a></li>
                        <?php //unset($_SESSION['verified_user_id']) ?>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">LOGIN</a></li>
                        <li><a href="registration.html">REGISTER</a></li>
                      <?php endif; ?>
            <li><a href="/musicrough/index.php">MAIN PAGE</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="songList">
            <div class="playlistItem">
                <h3>Best of Rap song 2022</h3>
            </div>
            <!---<span class="playlistName"><h1>play</h1></span>--->
            <div class="songItemContainer">
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me love you</span>
                    <span class="songlistplay"><span id="duration1">00:00 <i id="0" class="far songItemPlay fa-play-circle"></i></span></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="duration1">05:34 <i id="1" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="2" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="3" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="4" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="5" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="6" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="7" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="8" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="9" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="10" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="10" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
                <div class="songItem">
                    <img alt="1">
                    <span class="songName">Let me Love You</span>
                    <span class="songlistplay"><div id="timestamp">05:34 <i id="10" class="far songItemPlay fa-play-circle"></i> </div></span>
                </div>
            </div>
        </div>
        <div class="songBanner"></div>
    </div>

    <div class="bottom">
        <input type="range" name="range" id="myProgressBar" min="0" value="0" max="100">
        <div class="progress_duration_meter">
            <div id="current_time">0:00</div>
            <div id="duration">2:45</div>
        </div>
        <div class="icons">
            <!-- fontawesome icons -->
            <i class="fas fa-3x fa-step-backward" id="previous"></i>
            <i class="far fa-3x fa-play-circle" id="masterPlay"></i>
            <i class="fas fa-3x fa-step-forward" id="next"></i> 
        </div>
        <!---playing icon gif-->
        <div class="songInfo">
            <img src="playing.gif" width="42px" alt="" id="gif"> <a href="musicplay/index.php"><span id="masterSongName">Blinding Light- The Weeknd</span></a>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"></script>
</body>
</html>