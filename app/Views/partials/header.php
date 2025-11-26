<!-- ==================== HEADER / NAVBAR ==================== -->
<header class="bg-transparent shadow sticky top-0 z-50">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    
  <!-- Logo -->
<a href="#" class="flex items-center">
  <img src="http://downloader.minipul.com//uploads/MTRIX.png" alt="MTRIX Logo" class="h-16 w-auto mr-2">
</a>

<!-- Menu Navigasi (desktop) -->
<nav id="desktopNav" class="hidden md:flex space-x-6 items-center text-gray-700 font-semibold transition-colors duration-300">
  <a href="<?= base_url('/') ?>" class="hover:text-blue-600 transition">Beranda</a>
 <a href="<?= base_url('ProdukUser') ?>" class="hover:text-blue-600 transition">Produk</a>
  <a href="<?= base_url('tentang_kami')?>" class="hover:text-blue-600 transition">Tentang Kami</a>
  <a href="<?= base_url('kontak')?>" class="hover:text-blue-600 transition">Kontak</a>
</nav>

    
    <!-- Tombol Login / Top-Up -->
    <div class="hidden md:flex space-x-4">
<div class="hidden md:flex space-x-4">
    <?php if(session()->has('user_id')): ?>
        <!-- User sudah login -->
        <span class="px-4 py-2 border border-gray-300 text-gray-500 rounded-full cursor-not-allowed">
            <?= session()->get('user_name') ?>
        </span>
    <?php else: ?>
        <!-- User belum login -->
        <a href="<?= base_url('login') ?>" 
           class="px-4 py-2 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition">
           Login
        </a>
    <?php endif; ?>
</div>


      <a href="#topup" class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">Top-Up</a>
    </div>
    
    <!-- Hamburger Menu (mobile) -->
    <div class="md:hidden">
      <button id="mobileMenuBtn" class="focus:outline-none">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu (hidden by default) -->
  <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
    <nav class="flex flex-col px-4 py-2 space-y-2">
      <a href="#slider" class="py-2 hover:text-blue-600 font-semibold">Beranda</a>
      <a href="#popular-games" class="py-2 hover:text-blue-600 font-semibold">Game</a>
      <a href="#features" class="py-2 hover:text-blue-600 font-semibold">Produk</a>
      <a href="#faq" class="py-2 hover:text-blue-600 font-semibold">FAQ</a>
      <a href="#contact" class="py-2 hover:text-blue-600 font-semibold">Kontak</a>
      <a href="#login" class="py-2 border border-blue-600 text-blue-600 rounded-full text-center hover:bg-blue-600 hover:text-white transition">Login</a>
      <a href="#topup" class="py-2 bg-blue-600 text-white rounded-full text-center hover:bg-blue-700 transition">Top-Up</a>
    </nav>
  </div>

</header>

<!-- ==================== SCRIPT TOGGLE MOBILE MENU ==================== -->
<script>
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');

  mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
<script>
  const desktopNav = document.getElementById('desktopNav');

  window.addEventListener('scroll', () => {
    if(window.scrollY > 50){ // scroll lebih dari 50px
      desktopNav.classList.remove('text-gray-700');
      desktopNav.classList.add('text-white');
    } else {
      desktopNav.classList.remove('text-white');
      desktopNav.classList.add('text-gray-700');
    }
  });
</script>
