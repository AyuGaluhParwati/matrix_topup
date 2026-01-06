<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTRIX - Top Up Coin</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <?= $this->include('partials/header'); ?>

  <!-- HERO -->
  <section class="pt-28 pb-10 bg-blue-700 text-white text-center shadow-md">
    <h1 class="text-4xl font-bold drop-shadow">Top-Up Saldo</h1>
    <p class="mt-2 text-blue-200">Tambah saldo akun Anda dengan cepat dan aman.</p>
  </section>

  <!-- MAIN CONTENT -->
  <section class="max-w-xl mx-auto px-4 py-12">

    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">

      <!-- Coin Saat Ini -->
      <div class="text-center mb-10">
        <p class="text-gray-600 text-sm">Saldo Anda saat ini:</p>
        <h2 class="text-4xl font-bold text-blue-700">
          <?= number_format($saldo ?? 0, 0, ',', '.') ?> Saldo
        </h2>
      </div>

      <!-- FORM TOP-UP -->
      <form action="<?= base_url('topup/process') ?>" method="POST" class="space-y-6">

        <!-- Pilihan nominal -->
        <div>
          <p class="font-semibold text-blue-700 text-sm mb-3">Pilih Jumlah Saldo</p>

          <div class="grid grid-cols-2 gap-4">
          <?php 
            $nominalList = [50000, 100000, 200000, 500000, 1000000, 2000000, 5000000];
            foreach ($nominalList as $nominal): 
          ?>
            <label class="border rounded-xl p-4 text-center cursor-pointer hover:bg-blue-50">
              <input type="radio" name="nominal" value="<?= $nominal ?>" class="hidden peer" required>
              <div class="peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 border rounded-xl p-3">
                Rp <?= number_format($nominal, 0, ',', '.') ?>
              </div>
            </label>
          <?php endforeach; ?>
          </div>
        </div>

        <!-- Tombol Submit -->
        <button type="submit"
                class="w-full py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-800 transition shadow">
          Lanjutkan Pembayaran Coin
        </button>

      </form>

    </div>

  </section>

  <!-- Footer -->
  <?= $this->include('partials/footer'); ?>

</body>
</html>
