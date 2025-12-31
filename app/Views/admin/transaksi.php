<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Transaksi</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
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
      <a href="<?= base_url('admin/transaksi') ?>" class="flex items-center p-2 rounded bg-blue-600">
        <i class="fa-solid fa-cart-shopping mr-3"></i> Transaksi
      </a>
      <a href="<?= base_url('produk') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
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

  <!-- ================= MAIN CONTENT ================= -->
  <main class="flex-1 p-8">
    <h2 class="text-3xl font-bold mb-6 text-blue-700">
      <i class="fa-solid fa-cart-shopping mr-2"></i> Data Transaksi
    </h2>

    <!-- Flash message -->
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <!-- Table Transaksi -->
    <div class="bg-white shadow rounded-lg overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="bg-gray-200">
          <tr>
            <th class="p-3 text-left">Kode</th>
            <th class="p-3 text-left">Pembeli</th>
            <th class="p-3 text-left">Produk</th>
            <th class="p-3 text-left">Harga</th>
            <th class="p-3 text-left">Status</th>
            <th class="p-3 text-left">Catatan</th>
            <th class="p-3 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($transaksi as $t): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="p-3">TRX-<?= str_pad($t['id'],4,'0',STR_PAD_LEFT) ?></td>
            <td class="p-3"><?= esc($t['user_game']) ?> (Server: <?= esc($t['server']) ?>)</td>
            <td class="p-3"><?= esc($t['nama_produk']) ?></td>
            <td class="p-3">Rp <?= number_format($t['harga']) ?></td>
            <td class="p-3">
              <?php if ($t['status'] == 'pending'): ?>
                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">Pending</span>
              <?php elseif ($t['status'] == 'success'): ?>
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Success</span>
              <?php else: ?>
                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Failed</span>
              <?php endif; ?>
            </td>
            <td class="p-3"><?= esc($t['catatan']) ?></td>
            <td class="p-3 text-center space-x-2">
              <a href="<?= base_url('admin/transaksi/update/'.$t['id'].'/success') ?>"
                 class="px-3 py-1 bg-green-500 text-white rounded text-xs hover:bg-green-600">✔</a>
              <a href="<?= base_url('admin/transaksi/update/'.$t['id'].'/failed') ?>"
                 class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">✖</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </main>

</div>
</body>
</html>
