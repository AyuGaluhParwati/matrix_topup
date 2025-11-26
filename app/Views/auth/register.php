<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>body{font-family:'Poppins',sans-serif;}</style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">Daftar Akun Baru</h2>

    <form action="/register" method="post">
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Nama Lengkap</label>
        <input type="text" name="nama" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Email</label>
        <input type="email" name="email" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Password</label>
        <input type="password" name="password" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold">
        Daftar
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Sudah punya akun? <a href="/login" class="text-blue-600 hover:underline">Login di sini</a>
    </p>
  </div>

</body>
</html>
