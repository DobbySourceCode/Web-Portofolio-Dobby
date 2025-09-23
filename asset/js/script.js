// Navbar berubah warna saat discroll
window.addEventListener("scroll", function() {
  const navbar = document.getElementById("navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

// Smooth scroll ke anchor link
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function(e) {
    e.preventDefault();
    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth"
    });
  });
});

let slides = document.querySelectorAll('.slide');
let currentIndex = 0;
let slideInterval = setInterval(nextSlide, 4000); // auto slide tiap 4 detik

function showSlide(index) {
  slides.forEach(slide => slide.classList.remove('active'));
  slides[index].classList.add('active');
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

// tombol navigasi
document.querySelector('.next').addEventListener('click', () => {
  nextSlide();
  resetInterval();
});

document.querySelector('.prev').addEventListener('click', () => {
  prevSlide();
  resetInterval();
});

document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".slide");
  // semua kode slider dan interaktif disini...
});


// Background interaktif services
document.addEventListener("mousemove", (e) => {
  const cursorBg = document.querySelector(".services .cursor-bg");
  if (cursorBg) {
    cursorBg.style.setProperty("--x", e.clientX + "px");
    cursorBg.style.setProperty("--y", e.clientY + "px");
  }
});

// Slider otomatis + tombol navigasi
let slideIndex = 0;
const slide = document.querySelectorAll(".slide");
const nextBtn = document.querySelector(".next");
const prevBtn = document.querySelector(".prev");

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove("active");
    if (i === index) {
      slide.classList.add("active");
    }
  });
}

function nextSlide() {
  slideIndex = (slideIndex + 1) % slides.length;
  showSlide(slideIndex);
}

function prevSlide() {
  slideIndex = (slideIndex - 1 + slides.length) % slides.length;
  showSlide(slideIndex);
}

nextBtn.addEventListener("click", nextSlide);
prevBtn.addEventListener("click", prevSlide);

// Auto-slide setiap 5 detik
setInterval(nextSlide, 5000);

// Animasi muncul saat scroll
document.addEventListener("DOMContentLoaded", () => {
  const sections = document.querySelectorAll('.about'); // bisa lebih dari 1 section

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');

        // Stagger animasi child
        const children = entry.target.querySelectorAll('.about-box, .lanyard, h2');
        children.forEach((child, i) => {
          child.style.transitionDelay = `${i * 0.2}s`;
          child.classList.add('show');
        });

        obs.unobserve(entry.target); // hanya sekali
      }
    });
  }, { threshold: 0.2 });

  sections.forEach(section => observer.observe(section));
});

