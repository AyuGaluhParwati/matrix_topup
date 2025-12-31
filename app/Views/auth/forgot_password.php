<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Reset Password - MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-6 rounded-lg shadow w-full max-w-md">
  <h2 class="text-2xl font-bold text-center mb-4 text-blue-600">
    Reset Password
  </h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-500 text-white p-2 rounded mb-3 text-sm">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <form method="post" action="/forgot-password">
    <label class="block text-sm mb-1">Email</label>
    <input type="email" name="email" required
           class="w-full p-2 border rounded mb-3">

    <label class="block text-sm mb-1">Password Baru</label>
    <input type="password" name="password" required
           class="w-full p-2 border rounded mb-3">

    <label class="block text-sm mb-1">Konfirmasi Password</label>
    <input type="password" name="confirm_password" required
           class="w-full p-2 border rounded mb-4">

    <button class="w-full bg-blue-600 text-white p-2 rounded">
      Simpan Password Baru
    </button>
  </form>
</div>

</body>
</html>
