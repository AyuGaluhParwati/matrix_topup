<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lupa Password - MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-6 rounded-lg shadow w-full max-w-md">
  <h2 class="text-2xl font-bold text-center mb-4 text-blue-600">
    Lupa Password
  </h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-500 text-white p-2 rounded mb-3 text-sm">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="bg-green-500 text-white p-2 rounded mb-3 text-sm">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <form method="post" action="/forgot-password">
    <label class="block text-sm mb-1">Email Terdaftar</label>
    <input type="email" name="email" required
           class="w-full p-2 border rounded mb-4"
           placeholder="contoh@gmail.com">

    <button type="submit"
            class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
      Kirim Link Reset
    </button>
  </form>

  <div class="text-center mt-4 text-sm">
    <a href="/login" class="text-blue-600 hover:underline">
      Kembali ke Login
    </a>
  </div>
</div>

</body>
</html>
