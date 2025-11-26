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
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white flex flex-col">
      <div class="p-6 text-center border-b border-blue-600">
        <h1 class="text-2xl font-bold"><i class="fa-solid fa-gamepad mr-2"></i>Admin MTRIX</h1>
      </div>
      <nav class="flex-1 p-4 space-y-3">
        <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-gauge mr-3"></i> Dashboard</a>
        <a href="<?= base_url('admin/users') ?>" class="flex items-center p-2 rounded bg-blue-600"><i class="fa-solid fa-users mr-3"></i> Pengguna</a>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-cart-shopping mr-3"></i> Transaksi</a>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-tags mr-3"></i> Produk</a>
      </nav>
      <div class="p-4 border-t border-blue-600">
        <a href="/logout" class="flex items-center p-2 rounded hover:bg-blue-600 transition"><i class="fa-solid fa-right-from-bracket mr-3"></i> Logout</a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <h2 class="text-3xl font-bold mb-6 text-blue-700"><i class="fa-solid fa-users mr-2"></i>Daftar Pengguna</h2>

      <div class="overflow-x-auto bg-white rounded-lg shadow p-4">
        <table class="min-w-full divide-y divide-gray-200">
         <thead class="bg-gray-50">
    <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dibuat</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diupdate</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
    </tr>
</thead>
<tbody class="bg-white divide-y divide-gray-200">
    <?php foreach($users as $user): ?>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap"><?= $user['id'] ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?= $user['nama'] ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?= $user['email'] ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?= $user['role'] ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?= $user['created_at'] ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?= $user['updated_at'] ?></td>
        <td class="px-6 py-4 whitespace-nowrap space-x-2">
            <a href="<?= base_url('admin/users/edit/'.$user['id']) ?>" 
               class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">Edit</a>
            <a href="<?= base_url('admin/users/delete/'.$user['id']) ?>" 
               onclick="return confirm('Yakin ingin menghapus user ini?')"
               class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Hapus</a>
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
