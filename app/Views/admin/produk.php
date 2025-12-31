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

<!-- ================= SIDEBAR ================= -->
<aside class="w-64 bg-blue-700 text-white flex flex-col">
  <div class="p-6 text-center border-b border-blue-600">
    <h1 class="text-2xl font-bold">
      <i class="fa-solid fa-gamepad mr-2"></i> Admin MTRIX
    </h1>
  </div>

  <nav class="flex-1 p-4 space-y-3">
    <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
      <i class="fa-solid fa-gauge mr-3"></i> Dashboard
    </a>
    <a href="<?= base_url('admin/users') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
      <i class="fa-solid fa-users mr-3"></i> Pengguna
    </a>
    <a href="<?= base_url('admin/transaksi') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
      <i class="fa-solid fa-cart-shopping mr-3"></i> Transaksi
    </a>
    <a href="<?= base_url('produk') ?>" class="flex items-center p-2 rounded bg-blue-600">
      <i class="fa-solid fa-tags mr-3"></i> Produk
    </a>
          <a href="<?= base_url('pesan') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
        <i class="fa-solid fa-envelope mr-3"></i> Pesan
      </a>
  </nav>

  <div class="p-4 border-t border-blue-600">
    <a href="<?= base_url('logout') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
      <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
    </a>
  </div>
</aside>

<!-- ================= CONTENT ================= -->
<main class="flex-1 p-8">

<h2 class="text-3xl font-bold mb-6 text-blue-700">
  <i class="fa-solid fa-tags mr-2"></i> Manajemen Produk
</h2>

<!-- ================= FORM TAMBAH ================= -->
<div class="bg-white shadow rounded-lg p-6 mb-6">
  <h3 class="text-xl font-semibold mb-4 text-blue-700">Tambah Produk</h3>

  <form action="<?= base_url('produk/store') ?>" method="post" enctype="multipart/form-data"
        class="grid md:grid-cols-2 gap-4">
    <?= csrf_field() ?>

    <div>
      <label class="font-medium">Nama Produk</label>
      <input type="text" name="nama_produk" required class="w-full p-2 border rounded">
    </div>

    <div>
      <label class="font-medium">Kategori</label>
      <select name="kategori_slug" required class="w-full p-2 border rounded">
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $k): ?>
          <option value="<?= $k['slug'] ?>"><?= $k['nama_kategori'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label class="font-medium">Tipe Game</label>
      <select name="tipe_game" required class="w-full p-2 border rounded">
        <option value="">-- Pilih --</option>
        <option value="ml">Mobile Legends</option>
        <option value="roblox">Roblox</option>
      </select>
    </div>

    <div>
      <label class="font-medium">Harga</label>
      <input type="number" name="harga" required class="w-full p-2 border rounded">
    </div>

    <div>
      <label class="font-medium">Gambar</label>
      <input type="file" name="gambar" accept="image/*" required
             class="w-full p-2 border rounded">
    </div>

    <div class="md:col-span-2">
      <label class="font-medium">Deskripsi</label>
      <textarea name="deskripsi" rows="3"
                class="w-full p-2 border rounded"></textarea>

    <div class="md:col-span-2 text-right">
      <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Tambah Produk
      </button>
    </div>
  </form>
</div>

<!-- ================= TABLE ================= -->
<div class="bg-white shadow rounded-lg p-6">
<table class="table-auto w-full border">
<thead>
<tr class="bg-blue-100 text-blue-700">
  <th class="p-3">No</th>
  <th class="p-3">Gambar</th>
  <th class="p-3">Nama</th>
  <th class="p-3">Kategori</th>
  <th class="p-3">Tipe Game</th>
  <th class="p-3">Harga</th>
  <th class="p-3">Aksi</th>
</tr>
</thead>

<tbody>
<?php if (empty($produk)): ?>
<tr>
  <td colspan="7" class="p-4 text-center text-gray-500">
    Belum ada produk
  </td>
</tr>
<?php else: $no=1; foreach ($produk as $p): ?>
<tr class="border-b hover:bg-gray-50">
  <td class="p-3"><?= $no++ ?></td>
  <td class="p-3">
    <img src="<?= base_url('images/produk/'.$p['gambar']) ?>" class="h-12 rounded">
  </td>
  <td class="p-3"><?= $p['nama_produk'] ?></td>
  <td class="p-3"><?= $p['nama_kategori'] ?></td>
  <td class="p-3 uppercase"><?= $p['tipe_game'] ?></td>
  <td class="p-3">Rp <?= number_format($p['harga'],0,',','.') ?></td>
  <td class="p-3">
    <button class="text-yellow-600 mr-3"
      onclick="openEditModal(
        '<?= $p['id_produk'] ?>',
        '<?= esc($p['nama_produk']) ?>',
        '<?= esc($p['kategori_slug']) ?>',
        '<?= esc($p['tipe_game']) ?>',
        '<?= esc($p['harga']) ?>',
        '<?= esc($p['deskripsi']) ?>'
      )">Edit</button>

    <a href="<?= base_url('produk/delete/'.$p['id_produk']) ?>"
       onclick="return confirm('Hapus produk ini?')"
       class="text-red-600">Hapus</a>
  </td>
</tr>
<?php endforeach; endif; ?>
</tbody>
</table>
</div>

</main>
</div>

<!-- ================= MODAL EDIT ================= -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
<form id="editForm" method="post" enctype="multipart/form-data"
      class="bg-white p-6 rounded w-[420px] shadow">

<?= csrf_field() ?>

<input type="hidden" name="id_produk" id="edit_id">

<label>Nama Produk</label>
<input id="edit_nama" name="nama_produk"
       class="w-full p-2 border rounded mb-2">

<label>Kategori</label>
<select id="edit_kategori" name="kategori_slug"
        class="w-full p-2 border rounded mb-2">
<?php foreach ($kategori as $k): ?>
<option value="<?= $k['slug'] ?>"><?= $k['nama_kategori'] ?></option>
<?php endforeach; ?>
</select>

<label>Tipe Game</label>
<select id="edit_tipe_game" name="tipe_game"
        class="w-full p-2 border rounded mb-2">
<option value="ml">Mobile Legends</option>
<option value="roblox">Roblox</option>
</select>

<label>Harga</label>
<input id="edit_harga" name="harga" type="number"
       class="w-full p-2 border rounded mb-2">

<label>Deskripsi</label>
<textarea id="edit_deskripsi" name="deskripsi"
          class="w-full p-2 border rounded mb-2"></textarea>

<label>Gambar Baru (Opsional)</label>
<input type="file" name="gambar" accept="image/*"
       class="w-full p-2 border rounded mb-3">

<div class="text-right">
<button type="button"
        onclick="closeEditModal()"
        class="bg-gray-400 text-white px-3 py-1 rounded">
  Batal
</button>

<button class="bg-blue-600 text-white px-3 py-1 rounded">
  Simpan
</button>
</div>
</form>
</div>

<script>
function openEditModal(id, nama, kategori, tipe, harga, desk) {

  document.getElementById('edit_id').value        = id;
  document.getElementById('edit_nama').value      = nama;
  document.getElementById('edit_kategori').value  = kategori;
  document.getElementById('edit_tipe_game').value = tipe.toLowerCase(); // 🔥 FIX ROBLOX
  document.getElementById('edit_harga').value     = harga;
  document.getElementById('edit_deskripsi').value = desk;

  document.getElementById('editForm').action =
    "<?= base_url('produk/update/') ?>" + id;

  document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
  document.getElementById('editModal').classList.add('hidden');
}
</script>


</body>
</html>
