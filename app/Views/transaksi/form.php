<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beli Produk - MTRIX</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

<?= $this->include('partials/header') ?>

<div class="container mx-auto px-4 pt-28 pb-16">
  <div class="max-w-lg mx-auto bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">

    <!-- HEADER -->
    <div class="bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 p-6 text-white text-center">
      <h2 class="text-2xl font-bold flex items-center justify-center gap-2">
        <i class="fa-solid fa-bag-shopping"></i> Beli Produk
      </h2>
      <p class="text-sm opacity-90 mt-1 truncate">
        <?= esc($produk['nama_produk']) ?>
      </p>
    </div>

    <form action="<?= base_url('transaksi/proses') ?>" method="post" class="p-6 space-y-5">
      <?= csrf_field() ?>

      <input type="hidden" name="produk_id" value="<?= $produk['id_produk'] ?>">

      <!-- HARGA -->
      <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl flex justify-between items-center">
        <span class="font-semibold text-gray-600">Harga Satuan</span>
        <span class="text-2xl font-extrabold text-blue-700">
          Rp <?= number_format($produk['harga'],0,',','.') ?>
        </span>
      </div>

      <!-- JUMLAH -->
      <div>
        <label class="text-sm font-semibold mb-1 block">Jumlah</label>
        <input type="number" name="jumlah" min="1" value="1"
          class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
      </div>

      <!-- ML -->
      <div id="formML" class="hidden bg-gray-50 p-4 rounded-xl border border-gray-200">
        <p class="text-sm font-semibold text-blue-600 mb-3">
          <i class="fa-solid fa-gamepad mr-1"></i> Data Mobile Legends
        </p>

        <div class="mb-3">
          <label class="text-sm font-medium">User ID ML</label>
          <input type="text" name="user_game"
            class="w-full border rounded-lg px-4 py-2"
            placeholder="Contoh: 12345678">
        </div>

        <div>
          <label class="text-sm font-medium">Server</label>
          <input type="text" name="server"
            class="w-full border rounded-lg px-4 py-2"
            placeholder="Contoh: 1234">
        </div>
      </div>

      <!-- ROBLOX -->
      <div id="formRoblox" class="hidden bg-gray-50 p-4 rounded-xl border border-gray-200">
        <p class="text-sm font-semibold text-indigo-600 mb-3">
          <i class="fa-solid fa-cube mr-1"></i> Data Roblox
        </p>

        <div class="mb-3">
          <label class="text-sm font-medium">Username Roblox</label>
          <input type="text" name="username"
            class="w-full border rounded-lg px-4 py-2"
            placeholder="Username Roblox">
        </div>

        <div class="mb-3">
          <label class="text-sm font-medium">Password Roblox</label>
          <input type="password" name="password"
            class="w-full border rounded-lg px-4 py-2"
            placeholder="Password sementara">
        </div>

        <div class="bg-red-50 border border-red-200 text-red-600 text-xs p-3 rounded-lg">
          ⚠️ Gunakan password sementara / akun cadangan
        </div>
      </div>

      <!-- PROMO -->
      <div>
        <label class="text-sm font-semibold mb-1 block">
          <i class="fa-solid fa-ticket mr-1"></i> Kode Promo
        </label>
        <input type="text" name="kode_promo"
          class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400"
          placeholder="HEMAT10 / MTRIX20">
      </div>

      <hr>

      <!-- KONTAK -->
      <div>
        <label class="text-sm font-semibold mb-1 block">Nama Lengkap</label>
        <input type="text" name="nama"
          class="w-full border rounded-lg px-4 py-2" required>
      </div>

      <div>
        <label class="text-sm font-semibold mb-1 block">Email / WhatsApp</label>
        <input type="text" name="kontak"
          class="w-full border rounded-lg px-4 py-2"
          placeholder="08xxxx / email@email.com" required>
      </div>

      <!-- TOTAL -->
      <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl text-center border border-blue-200">
        <p class="text-sm text-gray-600">Total Bayar</p>
        <p id="totalHarga" class="text-2xl font-extrabold text-blue-700 mt-1">
          Rp <?= number_format($produk['harga'],0,',','.') ?>
        </p>
      </div>

      <!-- BUTTON -->
      <button type="submit"
        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-[1.02] transition text-white py-3 rounded-2xl font-bold shadow-lg">
        <i class="fa-solid fa-credit-card mr-2"></i> Bayar Sekarang
      </button>
    </form>

    <div class="text-center mt-5 pb-6">
      <a href="<?= base_url('ProdukUser') ?>" class="text-sm text-gray-500 hover:text-blue-600">
        ← Kembali ke Produk
      </a>
    </div>
  </div>
</div>

<script>
const hargaSatuan = <?= $produk['harga'] ?>;
const tipeGame = "<?= $produk['tipe_game'] ?>";

const jumlahInput = document.querySelector('input[name="jumlah"]');
const promoInput  = document.querySelector('input[name="kode_promo"]');
const totalText   = document.getElementById('totalHarga');

const formML = document.getElementById('formML');
const formRoblox = document.getElementById('formRoblox');

// reset
formML.classList.add('hidden');
formRoblox.classList.add('hidden');

if (tipeGame === 'ml') formML.classList.remove('hidden');
if (tipeGame === 'roblox') formRoblox.classList.remove('hidden');

function hitungTotal() {
  let jumlah = parseInt(jumlahInput.value) || 1;
  let subtotal = hargaSatuan * jumlah;

  let diskon = 0;
  const promo = promoInput.value?.toUpperCase();

  if (promo === 'HEMAT10') diskon = 10;
  if (promo === 'MTRIX20') diskon = 20;

  let total = subtotal - (subtotal * diskon / 100);
  totalText.innerText = 'Rp ' + total.toLocaleString('id-ID');
}

jumlahInput.addEventListener('input', hitungTotal);
promoInput.addEventListener('input', hitungTotal);
</script>

<?= $this->include('partials/footer') ?>

</body>
</html>
