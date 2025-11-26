<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Produk - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a2e0c1a7b6.js" crossorigin="anonymous"></script>

  <!-- Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 font-[Poppins]">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white flex flex-col">
      <div class="p-6 text-center border-b border-blue-600">
        <h1 class="text-2xl font-bold">
          <i class="fa-solid fa-gamepad mr-2"></i>Admin MTRIX
        </h1>
      </div>

      <nav class="flex-1 p-4 space-y-3">
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-gauge mr-3"></i> Dashboard</a>
        <a href="<?= base_url('admin/users') ?>" class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-users mr-3"></i> Pengguna
        </a>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-cart-shopping mr-3"></i> Transaksi</a>
        <a href="<?= base_url('produk') ?>" class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-tags mr-3"></i> Produk
        </a>
      </nav>

      <div class="p-4 border-t border-blue-600">
        <a href="<?= base_url('logout') ?>" class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
        </a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="max-w-6xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h1 class="text-2xl font-bold text-blue-700 mb-4">Manajemen Produk</h1>

        <!-- Flash Message -->
        <?php if (session()->getFlashdata('success')): ?>
          <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <!-- Form Tambah Produk -->
        <form action="<?= base_url('produk/store') ?>" method="post" enctype="multipart/form-data" class="mb-6 grid md:grid-cols-2 gap-4">
          <?= csrf_field() ?>
          <div>
            <label class="block mb-1 font-medium">Nama Produk</label>
            <input type="text" name="nama_produk" required class="w-full border rounded p-2">
          </div>
          <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <input type="text" name="kategori" required class="w-full border rounded p-2">
          </div>
          <div>
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="harga" required class="w-full border rounded p-2">
          </div>
          <div>
            <label class="block mb-1 font-medium">Gambar</label>
            <input type="file" name="gambar" accept="image/*" required class="w-full border rounded p-2">
          </div>
          <div class="md:col-span-2">
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="w-full border rounded p-2"></textarea>
          </div>
          <div class="md:col-span-2 text-right">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Tambah Produk</button>
          </div>
        </form>

        <!-- Tabel Produk -->
        <div class="overflow-x-auto">
          <table class="min-w-full border border-gray-300">
            <thead class="bg-blue-600 text-white">
              <tr>
                <th class="p-2">No</th>
                <th class="p-2">Gambar</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Harga</th>
                <th class="p-2">Deskripsi</th>
                <th class="p-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($produk)): ?>
                <tr><td colspan="7" class="text-center p-4 text-gray-500">Belum ada produk.</td></tr>
              <?php else: $no = 1; foreach ($produk as $p): ?>
                <tr class="border-b hover:bg-gray-50">
                  <td class="p-2 text-center"><?= $no++ ?></td>
                  <td class="p-2 text-center">
                    <img src="<?= base_url('images/produk/' . ($p['gambar'] ?? 'default.png')) ?>" alt="<?= esc($p['nama_produk']) ?>" class="h-12 mx-auto rounded">
                  </td>
                  <td class="p-2"><?= esc($p['nama_produk']) ?></td>
                  <td class="p-2"><?= esc($p['kategori']) ?></td>
                  <td class="p-2">Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                  <td class="p-2"><?= esc($p['deskripsi']) ?></td>
                  <td class="p-2 text-center space-x-2">
                    <button 
                      onclick="openEditModal(<?= $p['id_produk'] ?>, '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>', '<?= htmlspecialchars($p['kategori'], ENT_QUOTES) ?>', '<?= htmlspecialchars($p['harga'], ENT_QUOTES) ?>', '<?= htmlspecialchars($p['deskripsi'], ENT_QUOTES) ?>')" 
                      class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                      Edit
                    </button>
                    <a href="<?= base_url('produk/delete/' . $p['id_produk']) ?>" 
                       onclick="return confirm('Hapus produk ini?')" 
                       class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                      Hapus
                    </a>
                  </td>
                </tr>
              <?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <!-- Modal Edit Produk -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <form id="editForm" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg w-[400px] shadow-md">
      <?= csrf_field() ?>
      <h2 class="text-xl font-bold text-blue-700 mb-4">Edit Produk</h2>
      <input type="hidden" name="id_produk" id="edit_id">

      <label class="block mb-1">Nama Produk</label>
      <input type="text" name="nama_produk" id="edit_nama" class="w-full border rounded p-2 mb-2">

      <label class="block mb-1">Kategori</label>
      <input type="text" name="kategori" id="edit_kategori" class="w-full border rounded p-2 mb-2">

      <label class="block mb-1">Harga</label>
      <input type="number" name="harga" id="edit_harga" class="w-full border rounded p-2 mb-2">

      <label class="block mb-1">Deskripsi</label>
      <textarea name="deskripsi" id="edit_deskripsi" class="w-full border rounded p-2 mb-2"></textarea>

      <label class="block mb-1">Gambar Baru (opsional)</label>
      <input type="file" name="gambar" class="w-full border rounded p-2 mb-4">

      <div class="text-right space-x-2">
        <button type="button" onclick="closeEditModal()" class="bg-gray-400 text-white px-4 py-1 rounded">Batal</button>
        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>

  <script>
    function openEditModal(id, nama, kategori, harga, deskripsi) {
      document.getElementById('editModal').classList.remove('hidden');
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_nama').value = nama;
      document.getElementById('edit_kategori').value = kategori;
      document.getElementById('edit_harga').value = harga;
      document.getElementById('edit_deskripsi').value = deskripsi;
      document.getElementById('editForm').action = "<?= base_url('produk/update/') ?>" + id;
    }

    function closeEditModal() {
      document.getElementById('editModal').classList.add('hidden');
    }
  </script>
</body>
</html>
