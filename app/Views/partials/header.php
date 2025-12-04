<!-- ==================== HEADER / NAVBAR ==================== -->
<header class="bg-white shadow sticky top-0 z-50">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    
    <!-- Logo -->
    <a href="<?= base_url('/') ?>" class="flex items-center">
      <img src="http://downloader.minipul.com//uploads/MTRIX.png" 
           alt="MTRIX Logo" class="h-14 w-auto mr-2">
    </a>

    <!-- Menu Navigasi (desktop) -->
    <nav id="desktopNav" class="hidden md:flex space-x-6 items-center text-gray-700 font-semibold">
      <a href="<?= base_url('/') ?>" class="hover:text-blue-600">Beranda</a>
      <a href="<?= base_url('ProdukUser') ?>" class="hover:text-blue-600">Produk</a>
      <a href="<?= base_url('tentang_kami')?>" class="hover:text-blue-600">Tentang Kami</a>
      <a href="<?= base_url('kontak')?>" class="hover:text-blue-600">Kontak</a>
    </nav>

    <!-- ==================== USER AREA ==================== -->
    <div class="hidden md:flex items-center space-x-4">

      <?php if(session()->has('user_id')): ?>
        <!-- SUDAH LOGIN → tampilkan ikon profil -->
        <!-- SUDAH LOGIN → tampilkan ikon profil -->
<a href="<?= base_url('profil') ?>" 
   class="p-2 border border-blue-300 rounded-full hover:bg-blue-50 transition">
    <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" class="w-6 h-6">
</a>


        <!-- TOMBOL KERANJANG (PENGGANTI LOGOUT) -->
        <a href="<?= base_url('keranjang') ?>" 
           class="relative px-4 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition flex items-center gap-2">

          <i class="fa fa-shopping-cart text-lg"></i>
          <span>Keranjang</span>

          <!-- Badge jumlah item (opsional) -->
          <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">
            <?= $cart_count ?? 0 ?>
          </span>
        </a>

      <?php else: ?>
        <!-- BELUM LOGIN -->
        <a href="<?= base_url('login') ?>" 
           class="px-4 py-2 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition">
          Login
        </a>

        <a href="<?= base_url('topup') ?>" 
           class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
          Top-Up
        </a>
      <?php endif; ?>

    </div>

    <!-- Hamburger (mobile) -->
    <div class="md:hidden">
      <button id="mobileMenuBtn">
        <svg class="w-6 h-6" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

  </div>

  <!-- MOBILE MENU -->
  <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-300">
    <nav class="flex flex-col px-4 py-2 space-y-2">

      <a href="<?= base_url('/') ?>" class="py-2 hover:text-blue-600">Beranda</a>
      <a href="<?= base_url('ProdukUser') ?>" class="py-2 hover:text-blue-600">Produk</a>
      <a href="<?= base_url('tentang_kami')?>" class="py-2 hover:text-blue-600">Tentang Kami</a>
      <a href="<?= base_url('kontak')?>" class="py-2 hover:text-blue-600">Kontak</a>

      <?php if(!session()->has('user_id')): ?>
      
        <a href="<?= base_url('login') ?>" class="py-2 border border-blue-600 text-blue-600 rounded text-center hover:bg-blue-600 hover:text-white">
          Login
        </a>

      <?php else: ?>

        <a href="<?= base_url('profil') ?>" class="py-2 hover:text-blue-600">Profil</a>

        <!-- KERANJANG MOBILE -->
        <a href="<?= base_url('keranjang') ?>" 
           class="py-2 bg-yellow-500 text-white rounded text-center hover:bg-yellow-600">
          <i class="fa fa-shopping-cart mr-1"></i> Keranjang
        </a>

      <?php endif; ?>

    </nav>
  </div>
</header>

<script>
  document.getElementById('mobileMenuBtn').onclick = () => {
    document.getElementById('mobileMenu').classList.toggle('hidden');
  };
</script>
