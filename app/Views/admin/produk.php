<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Produk - Admin MTRIX</title>
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

        <a href="#" 
           class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-cart-shopping mr-3"></i> Transaksi
        </a>

        <a href="<?= base_url('produk') ?>" 
           class="flex items-center p-2 rounded bg-blue-600 transition">
          <i class="fa-solid fa-tags mr-3"></i> Produk
        </a>

        <a href="<?= base_url('pesan') ?>" 
           class="flex items-center p-2 rounded bg-blue-600 transition">
          <i class="fa-solid fa-envelope mr-3"></i> Pesan
        </a>

      </nav>

      <div class="p-4 border-t border-blue-600">
        <a href="<?= base_url('logout') ?>" class="flex items-center p-2 rounded hover:bg-blue-600 transition">
          <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
        </a>
      </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">

      <h2 class="text-3xl font-bold mb-6 text-blue-700">
        <i class="fa-solid fa-tags mr-2"></i> Manajemen Produk
      </h2>

      <!-- Form Tambah -->
      <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4 text-blue-700">Tambah Produk</h3>

        <form action="<?= base_url('produk/store') ?>" method="post" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-4">
          <?= csrf_field() ?>

          <div>
            <label class="font-medium">Nama Produk</label>
            <input type="text" name="nama_produk" required class="w-full p-2 border rounded">
          </div>

          <div>
            <label class="font-medium">Kategori</label>
            <input type="text" name="kategori" required class="w-full p-2 border rounded">
          </div>

          <div>
            <label class="font-medium">Harga</label>
            <input type="number" name="harga" required class="w-full p-2 border rounded">
          </div>

          <div>
            <label class="font-medium">Gambar</label>
            <input type="file" name="gambar" accept="image/*" required class="w-full p-2 border rounded">
          </div>

          <div class="md:col-span-2">
            <label class="font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="w-full p-2 border rounded"></textarea>
          </div>

          <div class="md:col-span-2 text-right">
            <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
              Tambah Produk
            </button>
          </div>

        </form>
      </div>

      <!-- Table -->
      <div class="bg-white shadow rounded-lg p-6">
        <table class="table-auto w-full border rounded-lg overflow-hidden">
          <thead>
            <tr class="bg-blue-100 text-blue-700">
              <th class="p-3 text-left">No</th>
              <th class="p-3 text-left">Gambar</th>
              <th class="p-3 text-left">Nama</th>
              <th class="p-3 text-left">Kategori</th>
              <th class="p-3 text-left">Harga</th>
              <th class="p-3 text-left">Deskripsi</th>
              <th class="p-3 text-left">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php if (empty($produk)): ?>
              <tr><td colspan="7" class="p-4 text-center text-gray-500">Belum ada produk.</td></tr>

            <?php else: $no = 1; foreach ($produk as $p): ?>
            <tr class="border-b hover:bg-gray-50">
              <td class="p-3"><?= $no++ ?></td>

              <td class="p-3">
                <img src="<?= base_url('images/produk/' . $p['gambar']) ?>" 
                     class="h-14 w-14 rounded object-cover">
              </td>

              <td class="p-3"><?= $p['nama_produk'] ?></td>
              <td class="p-3"><?= $p['kategori'] ?></td>
              <td class="p-3">Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
              <td class="p-3"><?= $p['deskripsi'] ?></td>

              <td class="p-3">
                <button 
                  onclick="openEditModal(`<?= $p['id_produk'] ?>`, `<?= esc($p['nama_produk']) ?>`, `<?= esc($p['kategori']) ?>`, `<?= esc($p['harga']) ?>`, `<?= esc($p['deskripsi']) ?>`)" 
                  class="text-yellow-600 hover:underline mr-3">
                  Edit
                </button>

                <a href="<?= base_url('produk/delete/'.$p['id_produk']) ?>" 
                   class="text-red-600 hover:underline"
                   onclick="return confirm('Hapus produk ini?')">
                  Hapus
                </a>
              </td>
            </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>

    </main>
  </div>

  <!-- Modal -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <form id="editForm" class="bg-white p-6 rounded-lg w-[400px] shadow-md" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <h2 class="text-xl font-bold mb-4 text-blue-700">Edit Produk</h2>

      <input type="hidden" name="id_produk" id="edit_id">

      <label>Nama Produk</label>
      <input id="edit_nama" name="nama_produk" class="w-full p-2 border rounded mb-2">

      <label>Kategori</label>
      <input id="edit_kategori" name="kategori" class="w-full p-2 border rounded mb-2">

      <label>Harga</label>
      <input id="edit_harga" name="harga" type="number" class="w-full p-2 border rounded mb-2">

      <label>Deskripsi</label>
      <textarea id="edit_deskripsi" name="deskripsi" class="w-full p-2 border rounded mb-2"></textarea>

      <label>Gambar Baru (Opsional)</label>
      <input type="file" name="gambar" class="w-full p-2 border rounded mb-4">

      <div class="text-right">
        <button type="button" class="px-4 py-1 bg-gray-400 text-white rounded" onclick="closeEditModal()">Batal</button>
        <button class="px-4 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>

  <script>
    function openEditModal(id, nama, kategori, harga, deskripsi) {
      document.getElementById('editModal').classList.remove('hidden');
      edit_id.value = id;
      edit_nama.value = nama;
      edit_kategori.value = kategori;
      edit_harga.value = harga;
      edit_deskripsi.value = deskripsi;

      document.getElementById('editForm').action = "<?= base_url('produk/update/') ?>" + id;
    }

    function closeEditModal() {
      document.getElementById('editModal').classList.add('hidden');
    }
  </script>

</body>
</html>
