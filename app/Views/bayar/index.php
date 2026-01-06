<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Pembayaran - MTRIX</title>

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
        <i class="fa-solid fa-credit-card"></i> Konfirmasi Pembayaran
      </h2>
      <p class="text-sm opacity-90 mt-1">
        Periksa detail sebelum melanjutkan
      </p>
    </div>

    <div class="p-6 space-y-5">

      <!-- ERROR -->
      <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-xl text-sm">
          <i class="fa-solid fa-circle-exclamation mr-1"></i>
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <!-- TOTAL BAYAR -->
      <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl flex justify-between items-center">
        <span class="font-semibold text-gray-600">Total Bayar</span>
        <span class="text-2xl font-extrabold text-blue-700">
          Rp <?= number_format($transaksi['total_bayar'], 0, ',', '.') ?>
        </span>
      </div>

      <!-- SALDO ANDA -->
      <div class="bg-indigo-50 border border-indigo-200 p-4 rounded-xl flex justify-between items-center">
        <span class="font-semibold text-gray-600">Saldo Anda</span>
        <span class="text-xl font-bold text-indigo-600">
          Rp <?= number_format($user['saldo'], 0, ',', '.') ?>
        </span>
      </div>

      <!-- SALDO DIBUTUHKAN -->
      <div class="bg-red-50 border border-red-200 p-4 rounded-xl flex justify-between items-center">
        <span class="font-semibold text-gray-600">Saldo Dibutuhkan</span>
        <span class="text-xl font-bold text-red-600">
          Rp <?= number_format($saldo_dibutuhkan, 0, ',', '.') ?>
        </span>
      </div>

      <hr>

      <!-- AKSI -->
      <?php if ($user['saldo'] >= $saldo_dibutuhkan): ?>
        <form action="<?= base_url('/bayar/proses') ?>" method="post">
          <?= csrf_field() ?>
          <input type="hidden" name="transaksi_id" value="<?= $transaksi['id'] ?>">

          <button
            type="submit"
            onclick="this.disabled=true; this.form.submit();"
            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-[1.02] transition text-white py-3 rounded-2xl font-bold shadow-lg">
            <i class="fa-solid fa-check-circle mr-2"></i> Bayar Sekarang
          </button>
        </form>
      <?php else: ?>
        <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-xl text-center text-sm">
          <i class="fa-solid fa-xmark-circle mr-1"></i>
          Saldo Anda tidak mencukupi untuk melakukan pembayaran
        </div>
      <?php endif; ?>

    </div>

    <!-- FOOTER CARD -->
    <div class="text-center pb-6">
      <a href="<?= base_url('ProdukUser') ?>" class="text-sm text-gray-500 hover:text-blue-600">
        ← Kembali ke Produk
      </a>
    </div>

  </div>
</div>

<?= $this->include('partials/footer') ?>

</body>
</html>
