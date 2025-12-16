<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: url('https://downloader.minipul.com//uploads/WhatsApp%20Image%202025-11-03%20at%2020.49.18_9250d762.jpg')
        no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }

    /* efek glass */
    .glass-card {
      backdrop-filter: blur(12px);
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 1rem;
      border: 1px solid rgba(255, 255, 255, 0.4);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
      padding: 2rem;
      width: 100%;
      max-width: 420px;
      animation: fadeIn 0.6s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(18px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>

<body>

  <div class="glass-card">
    <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">
      Daftar <span class="text-blue-500">MTRIX</span>
    </h2>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="bg-red-500 text-white p-2 rounded mb-4 text-sm">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form action="/register" method="post">
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Nama Lengkap</label>
        <input type="text" name="nama" required
          class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Email</label>
        <input type="email" name="email" required
          class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Username</label>
        <input type="text" name="username" required
          class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Nomor HP</label>
        <input type="text" name="no_hp" required
          class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Password</label>
        <input type="password" name="password" required
          class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold">
        Daftar
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Sudah punya akun?
      <a href="/login" class="text-blue-600 hover:underline">Login di sini</a>
    </p>
  </div>

</body>
</html>
