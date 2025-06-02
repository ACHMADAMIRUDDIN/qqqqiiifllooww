let slideIndex = 0;
const slides = document.querySelector('.slides');
const totalSlides = slides.children.length;

function showSlide(index) {
  if (index >= totalSlides) slideIndex = 0;
  else if (index < 0) slideIndex = totalSlides - 1;
  else slideIndex = index;
  
  const offset = -slideIndex * 100;
  slides.style.transform = `translateX(${offset}%)`;
}

function plusSlides(n) {
  showSlide(slideIndex + n);
}

setInterval(() => {
  plusSlides(1);
}, 10000); // ganti gambar tiap 5 detik

showSlide(slideIndex);
// Placeholder JS: nanti bisa ditambah buat fungsi dropdown di mobile atau darkmode, dll
console.log("Header loaded");


const video = document.getElementById('videoTentang');
const playBtn = document.getElementById('playBtn');

playBtn.addEventListener('click', () => {
  video.play();
  playBtn.style.display = 'none';
});

const scrollContainer = document.getElementById('promoScroll');
const lihatBtn = document.getElementById('lihatBtn');

scrollContainer.addEventListener('scroll', () => {
  if (scrollContainer.scrollLeft > scrollContainer.clientWidth / 2) {
    lihatBtn.style.display = 'inline-block';
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const toggleBtn = document.querySelector(".menu-toggle");
  const navMenu = document.querySelector(".nav-menu");
  const dropdowns = document.querySelectorAll(".dropdown");

  toggleBtn.addEventListener("click", () => {
    navMenu.classList.toggle("active");
  });

  // Untuk dropdown klik di mobile
  dropdowns.forEach(drop => {
    drop.addEventListener("click", function (e) {
      if (window.innerWidth <= 1024) {
        e.preventDefault();
        this.classList.toggle("open");
      }
    });
  });
});
// menu mobile                          
const menuToggle = document.querySelector('.menu-toggle');
const navMenu = document.querySelector('.nav-menu');
const dropdowns = document.querySelectorAll('.dropdown');

menuToggle.addEventListener('click', () => {
  navMenu.classList.toggle('active');
  dropdowns.forEach(dropdown => dropdown.classList.remove('open')); // Close any open dropdowns
});

dropdowns.forEach(dropdown => {
  const dropdownLink = dropdown.querySelector('a');
  dropdownLink.addEventListener('click', (e) => {
    if (window.innerWidth <= 1024) {
      e.preventDefault();
      dropdown.classList.toggle('open');
    }
  });
});

window.addEventListener('resize', () => {
  if (window.innerWidth > 1024) {
    navMenu.classList.remove('active'); // Hide menu on larger screens
    dropdowns.forEach(dropdown => dropdown.classList.remove('open')); // Close dropdowns
  }
});





