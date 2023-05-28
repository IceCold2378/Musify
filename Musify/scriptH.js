console.log("Welcome to Musify");

// Initialize the Variables
let songIndex = 0;
let audioElement = new Audio('songs/A.R. Rahman - Rang De Basanti.mp3');
let masterPlay = document.getElementById('masterPlay');
let myProgressBar = document.getElementById('myProgressBar');
let gif = document.getElementById('gif');
let masterSongName = document.getElementById('masterSongName');
//let songItems = Array.from(document.getElementsByClassName('songItem'));
let hindiItems = Array.from(document.getElementsByClassName('hindiItem'));
let playlistItems=Array.from(document.getElementsByClassName('playlistItem'));
let songlength= document.getElementById("duration");
let songTime= document.getElementById("duration1");
let songcurrenttime=document.getElementById("current_time");
let musicDuration = wrapper.querySelector(".duration1");
/*let songs = [
    {songName: "BlindingLights - Weeknd", filePath: "songs/BlindingLights.mp3", coverPath: "covers/BlindingLights.jpg"},
    {songName: "Khalid & Normani - Love Lies", filePath: "songs/Khalid & Normani - Love Lies.mp3", coverPath: "covers/lovelies.jpg"},
    {songName: "Tiesto - Red Lights", filePath: "songs/Tiesto_-_Red_Lights.mp3", coverPath: "covers/Rang De Basanti.jpg"},
    {songName: "Liggi - Ritviz", filePath: "songs/Liggi.mp3", coverPath: "covers/liggi.jpg"},
    {songName: "Let Me Love You (Ft. Justin Bieber) - Dj Snake", filePath: "songs/Let Me Love You (Ft. Justin Bieber) - Dj Snake.mp3", coverPath: "covers/5.jpg"},
    {songName: "Him & I", filePath: "songs/Him & I.mp3", coverPath: "covers/Him&I.jpg"},
    {songName: "25k jacket (feat. Lil Baby)", filePath: "songs/25k jacket (feat. Lil Baby).mp3", coverPath: "covers/25kjacket.jpg"},
    {songName: "Twenty One Pilots- Heathens", filePath: "songs/twenty one pilots- Heathens.mp3", coverPath: "covers/heathens.jpg"},
    {songName: "Ed_Sheeran - Shape You", filePath: "songs/Ed_Sheeran_Shape_You.mp3", coverPath: "covers/ShapeofYou.jpeg"},
    {songName: "Krewella - Team", filePath: "songs/Krewella - Team.mp3", coverPath: "covers/team.jpg"},
    {songName: "Martin Garrix and Justin Mylo - \n Burn Out (feat.Dewain Whitmore)", filePath: "songs/Martin_Garrix_and_Justin_Mylo_-_Burn_Out_(feat._Dewain_Whitmore)_.mp3", coverPath: "covers/burnout.jpg"},
    {songName: "Rae Sremmurd feat. Gucci Mane - Black Beatles", filePath: "songs/Rae Sremmurd feat. Gucci Mane - Black Beatles.mp3", coverPath: "covers/blackbeatles.jpg"},
    {songName: "Party Monster-the Weeknd", filePath: "songs/Party Monster.mp3", coverPath: "covers/PartyMonster.jpg"},
]*/
let songs = [
    {songName: "Rang De Basanti-A.R Rahman", filePath: "D:/xampp/htdocs/musicrough/Musify/songs", coverPath: "covers/Rang De Basanti.jpg"},
    {songName: "ABHI KUCH DINO SE", filePath: "songs/ABHI KUCH DINO SE.mp3", coverPath: "covers/abhi kuch dino se.jpg"},
    {songName: "Ambarsariya Fukrey", filePath: "songs/Ambarsariya Fukrey.mp3", coverPath: "covers/Ambarsariya.jpg"},
    {songName: "Bahara", filePath: "songs/Bahara.mp3", coverPath: "covers/bahara.jpg"},
    {songName: "GENDA PHOOL", filePath: "songs/GENDA PHOOL.mp3", coverPath: "covers/genda phool.jpg"},
    {songName: "Ghungroo", filePath: "songs/Ghungroo.mp3", coverPath: "covers/ghungroo.jpg"},
    {songName: "I Hate Luv Storys", filePath: "songs/I Hate Luv Storys.mp3", coverPath: "covers/i hate love stories.jpg"},
    {songName: "Jaane Kyun", filePath: "songs/Jaane Kyun.mp3", coverPath: "covers/jaane kyun.jpg"},
    {songName: "KABHI KABHI ADITI", filePath: "songs/KABHI KABHI ADITI.mp3", coverPath: "covers/kabhi kabhi aditi.jpeg"},
    {songName: "Makhna", filePath: "songs/Makhna.mp3", coverPath: "covers/makhna.jpg"},
    {songName: "Nagada - Remix", filePath: "songs/Nagada - Remix.mp3", coverPath: "covers/nagada.jpg"},
    {songName: "Sadi Gali", filePath: "songs/Sadi Gali.mp3", coverPath: "covers/sadi gali.jpg"},
    {songName: "Saibo", filePath: "songs/Saibo.mp3", coverPath: "covers/saibo.jpg"},
    {songName: "SOORAJ DOOBA HAIN", filePath:"songs/SOORAJ DOOBA HAIN.mp3", coverPath: "covers/Sooraj Dooba Hain.jpg"},
    {songName: "Tere Bina", filePath: "songs/Tere Bina.mp3", coverPath: "covers/tere bina.jpg"},
    {songName: "Tujh Mein Rab Dikhta Hai", filePath: "songs/Tujh Mein Rab Dikhta Hai.mp3", coverPath: "covers/tujh me rab dikhta he.jpg"},
    {songName: "TUM JO AAYE", filePath: "songs/TUM JO AAYE.mp3", coverPath: "covers/tum jo aaye.jpg"},
    {songName: "TUM SE HI", filePath: "songs/TUM SE HI.mp3", coverPath: "covers/Tum Se Hi.jpg"},
]
let playlists=[
    {playlistName:"Best of Rap Songs 2022",coverPath:""},
    {playlistName:"Best of Classical & Regional Songs 2022",coverPath:""},
    {playlistName:"Best of EDM Songs 2022",coverPath:""},
    {playlistName:"Best of Pop and R&B Songs",coverPath:""},
]
//displaying title,cover &duration of songs.
songItems.forEach((element, i)=>{ 
    element.getElementsByTagName("img")[0].src = songs[i].coverPath; 
    element.getElementsByClassName("songName")[0].innerText = songs[i].songName;
})
/*hindiItems.forEach((element, i)=>{ 
    element.getElementsByTagName("img")[0].src = hindi[i].coverPath; 
    element.getElementsByClassName("songName")[0].innerText = hindi[i].songName;
})*/

// Handle play/pause click
masterPlay.addEventListener('click', ()=>{
    if(audioElement.paused || audioElement.currentTime<=0){
        audioElement.play();
        masterPlay.classList.remove('fa-play-circle');
        masterPlay.classList.add('fa-pause-circle');
        gif.style.opacity = 1;
    }
    else{
        audioElement.pause();
        masterPlay.classList.remove('fa-pause-circle');
        masterPlay.classList.add('fa-play-circle');
        gif.style.opacity = 0;
    }
    //audioElement.getElementsByClassName("timestamp")[0].innerText =parseInt((audioElement.duration));
})
// Listen to Events
audioElement.addEventListener('timeupdate', ()=>{ 
    // Update Seekbar
    progress = parseInt((audioElement.currentTime/audioElement.duration)* 100); 
    myProgressBar.value = progress;
    //console.log(progress);
    //console.log(audioElement.duration)
    let min_duration=Math.floor(audioElement.duration/60);
    let sec_duration=Math.floor(audioElement.duration % 60);
    //console.log(min_duration);
    //console.log(sec_duration);
    if(sec_duration<10)
    {
        sec_duration=`0${sec_duration}`;
    }
    let tot_duration=`${min_duration}:${sec_duration}`;
    if(audioElement.duration){
        songlength.textContent=`${tot_duration}`;
        musicDuration.innerText=`${tot_duration}`;   
    }
    let min_currentTime=Math.floor(audioElement.currentTime/60);
    let sec_currentTime=Math.floor(audioElement.currentTime % 60);
    //console.log(min_currentTime);
    //console.log(sec_currentTime);
    if(sec_currentTime<10)
    {
        sec_currentTime=`0${sec_currentTime}`;
    }
    let tot_currentTime=`${min_currentTime}:${sec_currentTime}`;
    if(audioElement.currentTime){
        songcurrenttime.textContent=`${tot_currentTime}`;   
    }
   //audioElement.getElementsByClassName("timestamp")[0].innerText = tot_currentTime;
})
myProgressBar.addEventListener('change', ()=>{
    audioElement.currentTime = myProgressBar.value * audioElement.duration/100;
})
const makeAllPlays = ()=>{
    Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
        element.classList.remove('fa-pause-circle');
        element.classList.add('fa-play-circle');
    })
}

Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
    element.addEventListener('click', (e)=>{ 
        makeAllPlays();
        songIndex = parseInt(e.target.id);
        e.target.classList.remove('fa-play-circle');
        e.target.classList.add('fa-pause-circle');
        audioElement.src = `${songs[songIndex].filePath}`;
        masterSongName.innerText = songs[songIndex].songName;
        audioElement.currentTime = 0;
        audioElement.play();
        gif.style.opacity = 1;
        masterPlay.classList.remove('fa-play-circle');
        masterPlay.classList.add('fa-pause-circle');
        //audioElement.getElementsByClassName("timestamp")[0].innerText = audioElement.duration;
    })
})

document.getElementById('next').addEventListener('click', ()=>{
    if(songIndex>=18){
        songIndex = 0
    }
    else{
        songIndex += 1;
    }
    audioElement.src = `${songs[songIndex].filePath}`;
    masterSongName.innerText = songs[songIndex].songName;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play-circle');
    masterPlay.classList.add('fa-pause-circle');
})

document.getElementById('previous').addEventListener('click', ()=>{
    if(songIndex<=0){
        songIndex = 0
    }
    else{
        songIndex -= 1;
    }
    audioElement.src = `${songs[songIndex].filePath}`;
    masterSongName.innerText = songs[songIndex].songName;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play-circle');
    masterPlay.classList.add('fa-pause-circle');
})
console.log(songIndex);