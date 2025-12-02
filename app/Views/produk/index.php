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

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('favicon.ico') ?>">

  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <?= $this->include('partials/header') ?>

  <!-- SECTION: Pencarian Produk -->
  <section id="search" class="pt-24 pb-6 bg-blue-100 shadow-sm">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-blue-900 mb-3">
        <i class="fa-solid fa-magnifying-glass mr-2"></i>Cari Produk
      </h2>
      <p class="text-gray-600 mb-6">
        Temukan produk top-up, voucher, atau akun favoritmu dengan cepat!
      </p>

      <form action="<?= base_url('produk/cari') ?>" method="get" class="max-w-xl mx-auto">
        <div class="flex bg-white rounded-full shadow-md overflow-hidden border border-gray-200">
          <input 
            type="text" 
            name="keyword" 
            placeholder="Cari produk seperti 'Mobile Legends', 'Steam', 'Netflix'..." 
            class="w-full px-5 py-3 outline-none text-gray-700"
          >
          <button 
            type="submit" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 flex items-center justify-center"
          >
            <i class="fa-solid fa-search"></i>
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- Tombol Tambah Produk (Hanya Admin) -->
  <?php if (session()->get('role') === 'admin'): ?>
    <div class="container mx-auto px-4 mb-6 text-right">
      <a href="<?= base_url('produk/tambah') ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Produk
      </a>
    </div>
  <?php endif; ?>
 <!-- SECTION: Kategori Produk -->
  <section id="kategori" class="py-10 text-center">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold mb-6">Kategori Produk</h2>
      <div class="flex flex-wrap justify-center gap-8">
        <?php foreach ($kategori as $k): ?>
          <a href="<?= base_url('produk/kategori/' . $k['slug']) ?>" class="flex flex-col items-center hover:scale-105 transition">
            <div class="w-16 h-16 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-3xl mb-2">
              <i class="fa-solid <?= $k['icon'] ?>"></i>
            </div>
            <p><?= esc($k['nama_kategori']) ?></p>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  
  <!-- SECTION: Produk -->
  <section class="bg-blue-700 py-10 text-white">
    <div class="container mx-auto px-4">
      <h2 class="text-xl font-bold mb-6">TOPUP Games Cepat</h2>

      <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-6">
        <?php if (!empty($produk)): ?>
          <?php foreach ($produk as $p): ?>
            <div class="bg-white text-gray-800 rounded-lg shadow hover:shadow-lg overflow-hidden transition">
              <img src="<?= base_url('images/produk/' . $p['gambar']) ?>" 
                   alt="<?= esc($p['nama_produk']) ?>" 
                   class="w-full h-40 object-cover">
              <div class="p-3 text-center">
                <h3 class="font-semibold"><?= esc($p['nama_produk']) ?></h3>
                <p class="text-sm text-gray-500 mb-2"><?= esc($p['kategori']) ?></p>
                <p class="text-blue-700 font-bold mb-3">
                  Rp <?= number_format($p['harga'], 0, ',', '.') ?>
                </p>
                <a href="#" class="bg-blue-600 text-white px-3 py-2 rounded text-sm hover:bg-blue-800">
                  Beli Sekarang
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="col-span-5 text-center text-gray-200">Belum ada produk.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>


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

 

  <!-- Footer -->
  <?= $this->include('partials/footer') ?>

  <!-- JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
