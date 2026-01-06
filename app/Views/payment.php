<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTRIX - Pembayaran Coin</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
      body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-100">

  <!-- Header -->
  <?= $this->include('partials/header'); ?>

  <section class="pt-28 pb-10 bg-blue-700 text-white text-center shadow-md">
    <h1 class="text-4xl font-bold drop-shadow">Pembayaran Coin</h1>
    <p class="mt-2 text-blue-200">Selesaikan pembayaran untuk menambah coin Anda.</p>
  </section>

  <section class="max-w-xl mx-auto px-4 py-10">

    <div class="bg-white p-8 rounded-2xl shadow-lg">

      <!-- RINGKASAN PEMBELIAN -->
      <div class="mb-8">
        <p class="text-sm text-gray-600">Jumlah Coin</p>
        <h2 class="text-3xl font-bold text-blue-700"><?= number_format($coin, 0, ',', '.') ?> Coin</h2>

        <p class="mt-4 text-sm text-gray-600">Harga (konversi)</p>
        <h3 class="text-xl font-semibold text-green-600">
          Rp <?= number_format($harga, 0, ',', '.') ?>
        </h3>
      </div>

      <!-- FORM PEMBAYARAN -->
      <form action="<?= base_url('topup/complete') ?>" method="POST" class="space-y-6">

        <input type="hidden" name="saldo" value="<?= $saldo ?>">
        <input type="hidden" name="harga" value="<?= $harga ?>">

        <div>
          <p class="font-semibold text-blue-700 text-sm mb-3">Metode Pembayaran</p>

          <div class="space-y-3">
            <!-- contoh metode -->
            <label class="flex items-center gap-3 bg-gray-50 px-4 py-3 rounded-lg cursor-pointer hover:bg-blue-50 border">
              <input type="radio" name="payment_method" value="bank_transfer" required>
              <span>Bank Transfer</span>
            </label>

            <label class="flex items-center gap-3 bg-gray-50 px-4 py-3 rounded-lg cursor-pointer hover:bg-blue-50 border">
              <input type="radio" name="payment_method" value="e_wallet" required>
              <span>E-Wallet (Dana, OVO, Gopay)</span>
            </label>

            <label class="flex items-center gap-3 bg-gray-50 px-4 py-3 rounded-lg cursor-pointer hover:bg-blue-50 border">
              <input type="radio" name="payment_method" value="qris" required>
              <span>QRIS</span>
            </label>
          </div>
        </div>

        <button type="submit"
                class="w-full py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-800">
          Bayar Sekarang
        </button>

      </form>

    </div>

  </section>

  <!-- Footer -->
  <?= $this->include('partials/footer'); ?>

</body>
</html>
