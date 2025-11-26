<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTRIX - Top-Up & Voucher</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!-- SwiperJS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Alpine.js for FAQ -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <?php include 'partials/header.php'; ?>


</head>

<body class="text-gray-900">

  <?php include 'partials/hero-section.php' ?>

  <br>
  <br>
  <br>

  <!-- ==================== GAME STEAM TERPOPULER ==================== -->
 <?php include 'partials/steam-game.php'; ?>

  <!-- ==================== FAQ SECTION ==================== -->
<section id="faq" class="py-12 bg-gray-100">
  <div class="container mx-auto px-4">
    <h3 class="text-3xl font-bold text-center text-blue-900 mb-8">
      <i class="fa-solid fa-circle-question mr-2"></i>
      Pertanyaan yang Sering Diajukan
    </h3>

    <div class="space-y-4 max-w-2xl mx-auto">
      <!-- FAQ 1 -->
      <div x-data="{ open: false }" class="border rounded-lg shadow bg-white overflow-hidden">
        <button 
          @click="open = !open" 
          class="w-full px-5 py-3 text-left font-semibold flex justify-between items-center hover:bg-blue-50 transition"
        >
          Marketplace Games Terbesar dan Terlengkap
          <i :class="open ? 'fa-solid fa-minus text-blue-900' : 'fa-solid fa-plus text-blue-900'"></i>
        </button>
        <div x-show="open" x-transition class="px-5 py-3 text-gray-700 border-t">
          Kami menyediakan berbagai pilihan top-up dan voucher digital untuk memenuhi kebutuhan gaming kamu — dari Mobile Legends, PUBG, hingga Genshin Impact.
        </div>
      </div>

      <!-- FAQ 2 -->
      <div x-data="{ open: false }" class="border rounded-lg shadow bg-white overflow-hidden">
        <button 
          @click="open = !open" 
          class="w-full px-5 py-3 text-left font-semibold flex justify-between items-center hover:bg-blue-50 transition"
        >
          Apa itu MTRIX?
          <i :class="open ? 'fa-solid fa-minus text-blue-900' : 'fa-solid fa-plus text-blue-900'"></i>
        </button>
        <div x-show="open" x-transition class="px-5 py-3 text-gray-700 border-t">
          MTRIX (Media Trix) adalah platform penjualan produk digital seperti voucher, aplikasi, dan top-up game — cepat, mudah, dan aman.
        </div>
      </div>

      <!-- FAQ 3 -->
      <div x-data="{ open: false }" class="border rounded-lg shadow bg-white overflow-hidden">
        <button 
          @click="open = !open" 
          class="w-full px-5 py-3 text-left font-semibold flex justify-between items-center hover:bg-blue-50 transition"
        >
          Apakah MTRIX aman?
          <i :class="open ? 'fa-solid fa-minus text-blue-900' : 'fa-solid fa-plus text-blue-900'"></i>
        </button>
        <div x-show="open" x-transition class="px-5 py-3 text-gray-700 border-t">
          Keamanan adalah prioritas utama MTRIX. Kami menggunakan sistem enkripsi dan autentikasi berlapis untuk melindungi data dan transaksi pengguna.
        </div>
      </div>
    </div>
  </div>
</section>

  </section>

  <!-- ==================== FEATURES SECTION ==================== -->
  <section id="features" class="py-12 bg-white">
    <div class="container mx-auto px-4 text-center">
      <h3 class="text-3xl font-bold text-blue-900 mb-4"><i class="fa-solid fa-fire mr-2"></i>Kenapa Pilih Kami?</h3>
      <p class="text-gray-600 mb-8">Nikmati kemudahan bertransaksi digital di platform top-up game, voucher, dan akun terpercaya.</p>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition">
          <div class="text-blue-600 mb-3 text-5xl"><i class="fa-solid fa-bolt"></i></div>
          <h4 class="font-bold mb-2">Top-Up Game Tercepat</h4>
          <p class="text-gray-600">Proses pengisian hanya dalam hitungan detik. Langsung masuk tanpa ribet!</p>
        </div>
        <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition">
          <div class="text-blue-600 mb-3 text-5xl"><i class="fa-solid fa-gift"></i></div>
          <h4 class="font-bold mb-2">Voucher & Gift Card</h4>
          <p class="text-gray-600">Voucher Play Store, iTunes, Steam, Netflix, dan banyak lagi. Dapatkan promo menarik tiap minggu!</p>
        </div>
        <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition">
          <div class="text-blue-600 mb-3 text-5xl"><i class="fa-solid fa-user-shield"></i></div>
          <h4 class="font-bold mb-2">Akun Premium & Aman</h4>
          <p class="text-gray-600">Akun ML, Valorant, Spotify, dan Netflix dengan garansi keamanan dan harga terbaik.</p>
        </div>
      </div>
    </div>
  </section>

  <?php include 'partials/footer.php'; ?>
</body>
</html>
