<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami - MTRIX</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!-- SwiperJS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('favicon.ico') ?>">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- Header (JANGAN DIUBAH) -->
  <?php include 'partials/header.php'; ?>

  <!-- HERO SECTION -->
  <section class="pt-28 pb-12 bg-blue-700 text-white text-center">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl font-bold mb-3">Tentang Kami</h1>
      <p class="opacity-90 max-w-2xl mx-auto">
        MTRIX adalah platform top-up dan voucher digital yang cepat, aman, dan terpercaya.
        Kami hadir untuk memberikan pengalaman transaksi terbaik untuk para gamer dan pengguna layanan digital.
      </p>
    </div>
  </section>

  <!-- SIAPA KAMI -->
  <section class="py-16">
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">

      <div>
        <h2 class="text-3xl font-bold text-blue-900 mb-4">Siapa Kami?</h2>
        <p class="text-gray-600 leading-relaxed mb-4">
          MTRIX (Media Trix) adalah marketplace digital yang menyediakan berbagai pilihan top-up game,
          voucher platform digital, langganan aplikasi, dan akun premium.
        </p>
        <p class="text-gray-600 leading-relaxed">
          Kami berkomitmen untuk memberikan layanan digital terbaik dengan harga terjangkau,
          proses cepat, dan keamanan transaksi yang terjamin.
        </p>
      </div>

      <div class="flex justify-center">
        <img 
          src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png"
          alt="Tentang Kami"
          class="w-full max-w-sm drop-shadow-lg"
        >
      </div>
    </div>
  </section>

  <!-- MISI KAMI -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">

      <h2 class="text-3xl font-bold text-center text-blue-900 mb-10">Misi Kami</h2>

      <div class="grid md:grid-cols-3 gap-8">

        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow p-6 text-center">
          <div class="text-blue-700 text-4xl mb-3">
            <i class="fa-solid fa-bolt"></i>
          </div>
          <h3 class="font-bold mb-2 text-lg">Transaksi Super Cepat</h3>
          <p class="text-gray-600 text-sm">
            Semua pesanan diproses otomatis hanya dalam hitungan detik.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow p-6 text-center">
          <div class="text-blue-700 text-4xl mb-3">
            <i class="fa-solid fa-shield-halved"></i>
          </div>
          <h3 class="font-bold mb-2 text-lg">Keamanan Terjamin</h3>
          <p class="text-gray-600 text-sm">
            Data dan transaksi pengguna dilindungi sistem enkripsi modern.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow p-6 text-center">
          <div class="text-blue-700 text-4xl mb-3">
            <i class="fa-solid fa-headset"></i>
          </div>
          <h3 class="font-bold mb-2 text-lg">Support Responsif</h3>
          <p class="text-gray-600 text-sm">
            Admin siap membantu 24/7 untuk semua kebutuhan kamu.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- KENAPA MEMILIH KAMI -->
  <section class="py-16">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-blue-900 mb-8">Kenapa Memilih MTRIX?</h2>

      <div class="grid md:grid-cols-4 gap-8">

        <div class="p-6 bg-blue-50 rounded-xl shadow text-center">
          <i class="fa-solid fa-tags text-3xl text-blue-700 mb-3"></i>
          <h4 class="font-bold mb-2">Harga Terbaik</h4>
          <p class="text-sm text-gray-600">Harga bersaing untuk semua produk digital.</p>
        </div>

        <div class="p-6 bg-blue-50 rounded-xl shadow text-center">
          <i class="fa-solid fa-wallet text-3xl text-blue-700 mb-3"></i>
          <h4 class="font-bold mb-2">Banyak Metode Pembayaran</h4>
          <p class="text-sm text-gray-600">Dana, OVO, ShopeePay, GoPay, Bank Transfer, dan lainnya.</p>
        </div>

        <div class="p-6 bg-blue-50 rounded-xl shadow text-center">
          <i class="fa-solid fa-cart-shopping text-3xl text-blue-700 mb-3"></i>
          <h4 class="font-bold mb-2">Produk Lengkap</h4>
          <p class="text-sm text-gray-600">Dari top-up game hingga aplikasi premium.</p>
        </div>

        <div class="p-6 bg-blue-50 rounded-xl shadow text-center">
          <i class="fa-solid fa-thumbs-up text-3xl text-blue-700 mb-3"></i>
          <h4 class="font-bold mb-2">Terpercaya</h4>
          <p class="text-sm text-gray-600">Dipercaya ribuan pelanggan setiap hari.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- TEAM DEVELOPER -->
<section class="py-16 bg-blue-50">
  <div class="container mx-auto px-4">

    <h2 class="text-3xl font-bold text-center text-blue-900 mb-12" data-aos="fade-down">
      Tim Developer MTRIX
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-8 justify-center">

      <!-- Developer 1 -->
      <div data-aos="fade-up" 
           class="bg-white rounded-xl shadow p-6 text-center hover:shadow-2xl transition transform hover:-translate-y-2 hover:rotate-1">
        <img 
          src="http://downloader.minipul.com//uploads/WhatsApp%20Image%202025-11-25%20at%2013.29.25_e7e88f68.jpg" 
          class="w-32 h-32 mx-auto rounded-full object-cover mb-4"
        >
        <h3 class="font-bold text-lg text-blue-800">Ayu Galuh</h3>
        <p class="text-gray-600 text-sm mb-3">Fullstack Developer</p>

        <!-- Sosial Media -->
        <div class="flex justify-center gap-4 text-blue-700">
          <a href="#"><i class="fa-brands fa-facebook text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-instagram text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-github text-xl"></i></a>
        </div>
      </div>

      <!-- Developer 2 -->
      <div data-aos="fade-up" 
           data-aos-delay="100"
           class="bg-white rounded-xl shadow p-6 text-center hover:shadow-2xl transition transform hover:-translate-y-2 hover:rotate-1">
        <img 
          src="http://downloader.minipul.com//uploads/WhatsApp%20Image%202025-11-25%20at%2013.36.13_ef120ea2.jpg" 
          class="w-32 h-32 mx-auto rounded-full object-cover mb-4"
        >
        <h3 class="font-bold text-lg text-blue-800">Ayu Sinta</h3>
        <p class="text-gray-600 text-sm mb-3">Frontend Engineer</p>

        <div class="flex justify-center gap-4 text-blue-700">
          <a href="#"><i class="fa-brands fa-facebook text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-instagram text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-dribbble text-xl"></i></a>
        </div>
      </div>

      <!-- Developer 3 -->
      <div data-aos="fade-up" 
           data-aos-delay="200"
           class="bg-white rounded-xl shadow p-6 text-center hover:shadow-2xl transition transform hover:-translate-y-2 hover:rotate-1">
        <img 
          src="https://i.pravatar.cc/200?img=13" 
          class="w-32 h-32 mx-auto rounded-full object-cover mb-4"
        >
        <h3 class="font-bold text-lg text-blue-800">Lanny</h3>
        <p class="text-gray-600 text-sm mb-3">Backend Engineer</p>

        <div class="flex justify-center gap-4 text-blue-700">
          <a href="#"><i class="fa-brands fa-facebook text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-instagram text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-github text-xl"></i></a>
        </div>
      </div>

      <!-- Developer 4 -->
      <div data-aos="fade-up" 
           data-aos-delay="300"
           class="bg-white rounded-xl shadow p-6 text-center hover:shadow-2xl transition transform hover:-translate-y-2 hover:rotate-1">
        <img 
          src="https://i.pravatar.cc/200?img=14" 
          class="w-32 h-32 mx-auto rounded-full object-cover mb-4"
        >
        <h3 class="font-bold text-lg text-blue-800">Brian</h3>
        <p class="text-gray-600 text-sm mb-3">UI/UX Designer</p>

        <div class="flex justify-center gap-4 text-blue-700">
          <a href="#"><i class="fa-brands fa-facebook text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-instagram text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-behance text-xl"></i></a>
        </div>
      </div>

      <!-- Developer 5 -->
      <div data-aos="fade-up" 
           data-aos-delay="400"
           class="bg-white rounded-xl shadow p-6 text-center hover:shadow-2xl transition transform hover:-translate-y-2 hover:rotate-1">
        <img 
          src="http://downloader.minipul.com//uploads/WhatsApp%20Image%202025-11-25%20at%2015.37.09_a3bbba02.jpg" 
          class="w-32 h-32 mx-auto rounded-full object-cover mb-4"
        >
        <h3 class="font-bold text-lg text-blue-800">Wahyu Tomat</h3>
        <p class="text-gray-600 text-sm mb-3">Quality Assrance</p>

        <div class="flex justify-center gap-4 text-blue-700">
          <a href="#"><i class="fa-brands fa-facebook text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-instagram text-xl"></i></a>
          <a href="#"><i class="fa-brands fa-github text-xl"></i></a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- AOS Animation -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 900,
    once: true,
  });
</script>


  <!-- Footer (JANGAN DIUBAH) -->
  <?php include 'partials/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
