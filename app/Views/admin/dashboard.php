<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans text-gray-800">

  <!-- Sidebar -->
  <div class="flex min-h-screen">
    <aside class="w-64 bg-blue-700 text-white flex flex-col">
      <div class="p-6 text-center border-b border-blue-600">
        <h1 class="text-2xl font-bold"><i class="fa-solid fa-gamepad mr-2"></i>Admin MTRIX</h1>
      </div>
      <nav class="flex-1 p-4 space-y-3">
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-gauge mr-3"></i> Dashboard</a>
        <a href="<?= base_url('admin/users') ?>" class="flex items-center p-2 rounded hover:bg-blue-600 transition">
    <i class="fa-solid fa-users mr-3"></i> Pengguna
</a>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-cart-shopping mr-3"></i> Transaksi</a>
        <a href="<?= base_url('produk') ?>" 
   class="flex items-center p-2 rounded hover:bg-blue-600 transition">
  <i class="fa-solid fa-tags mr-3"></i>
  Product
</a>
 <a href="<?= base_url('pesan') ?>" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-cart-shopping mr-3"></i> pesan</a>

      </nav>
      <div class="p-4 border-t border-blue-600">
        <a href="/logout" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-right-from-bracket mr-3"></i> Logout</a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <h2 class="text-3xl font-bold mb-6 text-blue-700"><i class="fa-solid fa-gauge mr-2"></i>Dashboard Admin</h2>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
          <div class="flex items-center">
            <div class="text-3xl text-blue-600 mr-4"><i class="fa-solid fa-users"></i></div>
            <div>
             <h3 class="text-xl font-bold"><?= $totalUsers ?></h3>
              <p class="text-gray-500">Total Pengguna</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
          <div class="flex items-center">
            <div class="text-3xl text-green-600 mr-4"><i class="fa-solid fa-cart-shopping"></i></div>
            <div>
              <h3 class="text-xl font-bold">246</h3>
              <p class="text-gray-500">Total Transaksi</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
          <div class="flex items-center">
            <div class="text-3xl text-yellow-500 mr-4"><i class="fa-solid fa-tags"></i></div>
            <div>
              <h3 class="text-xl font-bold"><?= $total_produk ?></h3>
              <p class="text-gray-500">Total Produk</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-10 bg-white p-6 rounded-lg shadow">
        <h3 class="text-2xl font-bold mb-4 text-blue-700">Selamat datang, Admin 👋</h3>
        <p class="text-gray-600">Ini adalah halaman utama dashboard Anda. Dari sini, Anda bisa mengelola pengguna, transaksi, dan produk.</p>
      </div>
    </main>
  </div>

</body>
</html>
