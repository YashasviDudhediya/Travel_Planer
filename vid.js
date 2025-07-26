const videos = [
    './videos/13.mp4','./videos/second.mp4','./videos/eleven.mp4','./videos/12.mp4','./videos/ten (1).mp4','./videos/14.mp4','./videos/first.mp4','./videos/fifth.mp4','./videos/eight.mp4','./videos/forth.mp4','./videos/nine.mp4','./videos/six.mp4','./videos/third.mp4','./videos/seven.mp4'
];

const video1 = document.getElementById('video1');
const video2 = document.getElementById('video2');
let currentVideoIndex = 0;
let isVideo1Playing = true;


function playNextVideo() {
    const currentVideo = isVideo1Playing ? video1 : video2;
    const nextVideo = isVideo1Playing ? video2 : video1;

   
    nextVideo.src = videos[currentVideoIndex];
    nextVideo.play();

    
    nextVideo.style.opacity = 2; 
    currentVideo.style.opacity = 0; 

    
    currentVideoIndex = (currentVideoIndex + 1) % videos.length;
    isVideo1Playing = !isVideo1Playing;

    
    setTimeout(playNextVideo, 5000);
}


video1.src = videos[currentVideoIndex];
video1.play();
currentVideoIndex = (currentVideoIndex + 1) % videos.length;


setTimeout(playNextVideo, 4000);

function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('show');
}
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) { // Add class when scrolled 50px or more
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

document.getElementById('searchButton').addEventListener('click', function() {
    const query = document.getElementById('searchInput').value.trim();

    // Check if query is empty
    if (query === '') {
        alert("Please enter a valid search term.");
        return;
    }

    // Redirect to Wikipedia search page for the entered query
    const wikipediaUrl = `https://en.wikipedia.org/wiki/${encodeURIComponent(query)}`;
    window.location.href = wikipediaUrl;
});
  