<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pengguna - Admin MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans text-gray-800">

<div class="flex min-h-screen">

  <!-- ================= SIDEBAR ================= -->
  <aside class="w-64 bg-blue-700 text-white flex flex-col">
    <div class="p-6 text-center border-b border-blue-600">
      <h1 class="text-2xl font-bold">
        <i class="fa-solid fa-gamepad mr-2"></i>Admin MTRIX
      </h1>
    </div>

    <nav class="flex-1 p-4 space-y-3">
      <a href="<?= base_url('admin/dashboard') ?>"
         class="flex items-center p-2 rounded hover:bg-blue-600 transition">
        <i class="fa-solid fa-gauge mr-3"></i> Dashboard
      </a>

      <a href="<?= base_url('admin/users') ?>"
         class="flex items-center p-2 rounded bg-blue-600 transition">
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
         class="flex items-center p-2 rounded hover:bg-blue-600 transition">
        <i class="fa-solid fa-envelope mr-3"></i> Pesan
      </a>
    </nav>

    <div class="p-4 border-t border-blue-600">
      <a href="<?= base_url('logout') ?>"
         class="flex items-center p-2 rounded hover:bg-blue-600 transition">
        <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
      </a>
    </div>
  </aside>
  <!-- =============== END SIDEBAR =============== -->

  <!-- ================= CONTENT ================= -->
  <main class="flex-1 p-8">

    <h2 class="text-3xl font-bold mb-6 text-blue-700">
      <i class="fa-solid fa-users mr-2"></i> Data Pengguna
    </h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow p-4">

      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-blue-100 text-blue-700">
          <tr>
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">Nama</th>
            <th class="px-4 py-3 text-left">Email</th>
            <th class="px-4 py-3 text-left">Username</th>
            <th class="px-4 py-3 text-left">No HP</th>
            <th class="px-4 py-3 text-left">Role</th>
            <th class="px-4 py-3 text-left">Dibuat</th>
            <th class="px-4 py-3 text-left">Diupdate</th>
            <th class="px-4 py-3 text-left">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
          <?php if (empty($users)): ?>
            <tr>
              <td colspan="9" class="p-4 text-center text-gray-500">
                Data user belum tersedia.
              </td>
            </tr>
          <?php else: foreach ($users as $user): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3"><?= $user['id'] ?></td>
              <td class="px-4 py-3"><?= esc($user['nama']) ?></td>
              <td class="px-4 py-3"><?= esc($user['email']) ?></td>
              <td class="px-4 py-3"><?= esc($user['username']) ?></td>
              <td class="px-4 py-3"><?= esc($user['no_hp']) ?></td>
              <td class="px-4 py-3"><?= esc($user['role']) ?></td>
              <td class="px-4 py-3"><?= $user['created_at'] ?></td>
              <td class="px-4 py-3"><?= $user['updated_at'] ?></td>
              <td class="px-4 py-3 space-x-2">
                <a href="<?= base_url('admin/users/edit/'.$user['id']) ?>"
                   class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                  Edit
                </a>
                <a href="<?= base_url('admin/users/delete/'.$user['id']) ?>"
                   onclick="return confirm('Yakin ingin menghapus user ini?')"
                   class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                  Hapus
                </a>
              </td>
            </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>

    </div>
  </main>
  <!-- =============== END CONTENT =============== -->

</div>
</body>
</html>
