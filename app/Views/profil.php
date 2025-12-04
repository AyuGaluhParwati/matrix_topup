<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTRIX - Profil Akun</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('favicon.ico') ?>">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <?php include 'partials/header.php'; ?>

  <!-- HERO -->
  <section class="pt-28 pb-12 bg-blue-700 text-white text-center shadow-md">
    <div class="max-w-3xl mx-auto px-4">
      <h1 class="text-4xl font-bold drop-shadow">Profil Akun</h1>
      <p class="mt-2 text-blue-200 text-lg">Kelola informasi akun Anda di sini.</p>
    </div>
  </section>

  <!-- MAIN CONTENT -->
  <section class="max-w-3xl mx-auto px-4 py-12">

    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">

      <!-- Info User -->
      <div class="flex items-center gap-6 mb-10">
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
             class="h-28 w-28 rounded-full border-4 border-blue-100 shadow">

        <div>
          <p class="text-3xl font-bold text-gray-900"><?= session()->get('user_name') ?></p>
          <p class="text-gray-500 text-sm mt-1">Member sejak: 2024</p>
        </div>
      </div>

      <!-- DETAIL -->
      <div class="space-y-6">

        <div>
          <p class="font-semibold text-blue-700 text-sm">Email</p>
          <p class="text-lg text-gray-800"><?= $email ?? '-' ?></p>
        </div>

        <div>
          <p class="font-semibold text-blue-700 text-sm">Nomor HP</p>
          <p class="text-lg text-gray-800"><?= $phone ?? '-' ?></p>
        </div>

        <div>
          <p class="font-semibold text-blue-700 text-sm">Saldo</p>
          <p class="text-blue-600 text-3xl font-extrabold">
            Rp <?= number_format($saldo ?? 0, 0, ',', '.') ?>
          </p>
        </div>

      </div>

      <!-- BUTTONS -->
      <div class="mt-10 flex gap-4">
        <a href="<?= base_url('topup') ?>"
           class="px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-900 transition shadow">
          Top-Up Saldo
        </a>

        <a href="<?= base_url('logout') ?>"
           class="px-6 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition shadow">
          Logout
        </a>
      </div>

    </div>

  </section>

  <!-- Footer -->
  <?php include 'partials/footer.php'; ?>

</body>
</html>
