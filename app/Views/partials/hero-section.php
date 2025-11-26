<!-- Tailwind CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

<!-- SwiperJS CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

<!-- ==================== HERO / SLIDER ==================== -->
<section id="hero" class="relative">
  <!-- Slider utama dengan tinggi 80% viewport -->
  <div class="swiper mySwiper h-[80vh] md:h-[80vh] mx-auto">
    <div class="swiper-wrapper">

<!-- Slide 2 -->
<div class="swiper-slide relative flex items-center justify-center bg-cover bg-center overflow-hidden">
  <!-- Gambar background -->
  <img src="http://downloader.minipul.com/uploads/14.png" 
       alt="MTRIX" 
       class="absolute inset-0 w-full h-full object-cover" />

  <!-- Overlay hitam transparan -->
  <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

  <!-- Teks di atas gambar -->
  <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white z-20 px-4">
    <h1 class="text-4xl md:text-6xl font-bold mb-4">
      Selamat Datang Di MTRIX
    </h1>
    <p class="text-lg md:text-2xl text-[#FAAF37]">
      Tempat Topup Game Terbaik Yang Siap Penuhi Semua Kebutuhan Gamers Kamu!
    </p>
  </div>
</div>

  <!-- Slide 2 -->
<div class="swiper-slide relative flex items-center justify-center bg-cover bg-center overflow-hidden">
  <!-- Video background -->
  <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
    <source src="https://downloader.minipul.com/uploads/WhatsApp%20Video%202025-11-03%20at%2020.50.40_ad581cce.mp4" type="video/mp4" />
  </video>

  <!-- Overlay hitam transparan -->
  <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

  <!-- Teks di atas video -->
  <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white z-20 px-4">
    <h1 class="text-4xl md:text-6xl font-bold mb-4">
      Game “Harry Potter: Hogwarts” resmi rilis!
    </h1>
<p class="text-lg md:text-2xl text-[#FAAF37]">
  Bergabunglah di Hogwarts dan buktikan bahwa kamu adalah penyihir sejati!
</p>

    </p>
  </div>
</div>


      <!-- Slide 2 -->
      <div class="swiper-slide relative flex items-center justify-center bg-cover bg-center">
          <img src="http://downloader.minipul.com//uploads/15.png" 
       alt="MTRIX" 
       class="absolute inset-0 w-full h-full object-cover" />
        <div class="text-center text-white z-10 px-4">
          <h1 class="text-4xl md:text-6xl font-bold mb-4">Game “Harry Potter: Hogwarts” resmi rilis!</h1>
          <p class="text-lg md:text-2xl">Bergabunglah di Hogwarts dan buktikan bahwa kamu adalah penyihir sejati!</p>
        </div>
      </div>

      <!-- Slide 3 -->
       <!-- Slide 2 -->
      <div class="swiper-slide relative flex items-center justify-center bg-cover bg-center">
        <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
          <source src="https://downloader.minipul.com//uploads/WhatsApp%20Video%202025-11-03%20at%2020.50.40_ad581cce.mp4" type="video/mp4" />
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="text-center text-white z-10 px-4">
          <h1 class="text-4xl md:text-6xl font-bold mb-4">Game “Harry Potter: Hogwarts” resmi rilis!</h1>
          <p class="text-lg md:text-2xl">Bergabunglah di Hogwarts dan buktikan bahwa kamu adalah penyihir sejati!</p>
        </div>
      </div>

    <!-- Panah navigasi -->
    <div class="swiper-button-next text-white"></div>
    <div class="swiper-button-prev text-white"></div>

    <!-- Pagination (bullets) -->
    <div class="swiper-pagination"></div>
  </div>
</section>

<!-- SwiperJS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper('.mySwiper', {
    loop: true,
    autoplay: false, // matikan auto slide
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    }
  });
</script>
