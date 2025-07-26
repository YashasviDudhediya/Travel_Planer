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
  
  // List of travel-related keywords
  const travelKeywords = [
      "destination", "hotel", "tourism", "vacation", "landmark", "resort", 
      "tourist", "attraction", "travel", "trip", "holiday", "airport", 
      "city", "country", "beach", "mountain", "adventure", "cruise"
  ];

  // Check if the query contains any of the travel-related keywords
  const isTravelRelated = travelKeywords.some(keyword => query.toLowerCase().includes(keyword.toLowerCase()));

  if (query && isTravelRelated) {
      // Redirect to Wikipedia search page for travel-related terms
      const wikipediaUrl = `https://en.wikipedia.org/wiki/${encodeURIComponent(query)}`;
      window.location.href = wikipediaUrl;
  } else {
      // Show an error message if the query doesn't match the travel-related keywords
      alert("Please enter a valid travel-related search term (e.g., destinations, hotels, landmarks).");
  }
});
