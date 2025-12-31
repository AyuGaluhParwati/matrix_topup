<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pesan - Admin MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans text-gray-800">

  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white flex flex-col">
      <div class="p-6 text-center border-b border-blue-600">
        <h1 class="text-2xl font-bold"><i class="fa-solid fa-gamepad mr-2"></i>Admin MTRIX</h1>
      </div>

      <nav class="flex-1 p-4 space-y-3">
        <a href="<?= base_url('admin/dashboard') ?>" 
           class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-gauge mr-3"></i> Dashboard
        </a>

        <a href="<?= base_url('admin/users') ?>" 
           class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-users mr-3"></i> Pengguna
        </a>

        <a href="<?= base_url('admin/transaksi') ?>" 
           class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-cart-shopping mr-3"></i> Transaksi
        </a>

        <a href="<?= base_url('produk') ?>" 
           class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-tags mr-3"></i> Produk
        </a>

        <a href="<?= base_url('pesan') ?>" 
           class="flex items-center p-2 rounded bg-blue-600 transition">
          <i class="fa-solid fa-envelope mr-3"></i> Pesan
        </a>
      </nav>

      <div class="p-4 border-t border-blue-600">
        <a href="/logout" class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
        </a>
      </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">

      <h2 class="text-3xl font-bold mb-6 text-blue-700">
        <i class="fa-solid fa-envelope mr-2"></i> Daftar Pesan
      </h2>

      <!-- Table -->
      <div class="bg-white shadow rounded-lg p-6">
        <table class="table-auto w-full border rounded-lg overflow-hidden">
          <thead>
            <tr class="bg-blue-100 text-blue-700">
              <th class="p-3 text-left">Nama</th>
              <th class="p-3 text-left">Email</th>
              <th class="p-3 text-left">Subjek</th>
              <th class="p-3 text-left">Pesan</th>
              <th class="p-3 text-left">Status</th>
              <th class="p-3 text-left">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($pesan as $p): ?>
            <tr class="border-b hover:bg-gray-50">
              <td class="p-3"><?= $p['nama'] ?></td>
              <td class="p-3"><?= $p['email'] ?></td>
              <td class="p-3"><?= $p['subjek'] ?></td>
              <td class="p-3"><?= $p['pesan'] ?></td>
              <td class="p-3 capitalize">
                <?php if ($p['status'] == 'baru'): ?>
                  <span class="text-white bg-red-500 px-3 py-1 rounded text-sm">Baru</span>
                <?php elseif ($p['status'] == 'dibaca'): ?>
                  <span class="text-white bg-yellow-500 px-3 py-1 rounded text-sm">Dibaca</span>
                <?php else: ?>
                  <span class="text-white bg-green-600 px-3 py-1 rounded text-sm">Dibalas</span>
                <?php endif; ?>
              </td>

              <td class="p-3">
                <a href="/admin/pesan/<?= $p['id'] ?>"
                   class="text-blue-600 hover:underline mr-3">
                  Detail
                </a>

                <a href="/admin/pesan/delete/<?= $p['id'] ?>"
                   class="text-red-600 hover:underline"
                   onclick="return confirm('Hapus pesan ini?')">
                  Hapus
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </main>

  </div>

</body>
</html>
