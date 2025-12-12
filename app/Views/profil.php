<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - MTRIX</title>

<<<<<<< HEAD
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
=======
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('favicon.ico') ?>">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
>>>>>>> 359a932304a6baf468a0638ce4d1206d2ed1ac60
</head>

<body class="bg-gray-50 text-gray-800">

<<<<<<< HEAD
  <?= $this->include('partials/header'); ?>

  <section class="pt-28 pb-12 bg-blue-700 text-white text-center shadow-md">
    <div class="max-w-3xl mx-auto px-4">
      <h1 class="text-4xl font-bold drop-shadow">Profil Akun</h1>
      <p class="mt-2 text-blue-200 text-lg">Kelola informasi akun Anda di sini.</p>
    </div>
  </section>

  <section class="max-w-3xl mx-auto px-4 py-12">
=======
    <!-- Header Global -->
    <?php include 'partials/header.php'; ?>

    <!-- SECTION PROFIL -->
    <section class="pt-28 pb-12">
        <div class="container mx-auto px-4">

            <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
>>>>>>> 359a932304a6baf468a0638ce4d1206d2ed1ac60

                <!-- Header Title + Logout -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Profil Akun</h1>

<<<<<<< HEAD
      <div class="flex items-center gap-6 mb-10">
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
             class="h-28 w-28 rounded-full border-4 border-blue-100 shadow">

        <div>
          <p class="text-3xl font-bold text-gray-900"><?= esc($user_name) ?></p>
          <p class="text-gray-500 text-sm mt-1">Member sejak: <?= esc($member_since) ?></p>
=======
                    <a href="/logout" 
                       class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        <i class="fa-solid fa-right-from-brain"></i> Logout
                    </a>
                </div>

                <!-- Header Profil -->
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 rounded-full bg-gray-300 flex items-center justify-center text-3xl font-bold text-gray-600">
                        <?= strtoupper(substr($user['nama'] ?? 'U', 0, 1)) ?>
                    </div>

                    <div>
                        <h2 class="text-3xl font-bold"><?= esc($user['nama'] ?? 'Nama tidak tersedia') ?></h2>

                        <p class="text-gray-500 text-sm">
                            Joined: <?= isset($user['created_at']) ? esc(date("d M Y", strtotime($user['created_at']))) : '-' ?>
                        </p>
                    </div>
                </div>

                <hr class="my-6">

                <!-- Info Akun -->
                <h3 class="text-xl font-semibold mb-4">Informasi Akun</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <p class="text-sm font-semibold text-gray-600">Email</p>
                        <p class="p-3 bg-gray-50 rounded border"><?= esc($user['email'] ?? '-') ?></p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-600">Username</p>
                        <p class="p-3 bg-gray-50 rounded border"><?= esc($user['username'] ?? '-') ?></p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-600">No HP</p>
                        <p class="p-3 bg-gray-50 rounded border"><?= esc($user['no_hp'] ?? '-') ?></p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-600">Favorit</p>
                        <p class="p-3 bg-gray-50 rounded border"><?= esc($user['favorit'] ?? '-') ?></p>
                    </div>

                </div>

                <hr class="my-6">

                <!-- Statistik -->
                <h3 class="text-xl font-semibold mb-4">Statistik</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div class="bg-blue-50 p-5 rounded-lg shadow border">
                        <p class="text-sm font-semibold text-gray-600">Jumlah Transaksi</p>
                        <p class="text-4xl font-bold mt-1"><?= esc($user['transaksi'] ?? 0) ?></p>
                    </div>

                    <div class="bg-yellow-50 p-5 rounded-lg shadow border">
                        <p class="text-sm font-semibold text-gray-600">Koin</p>
                        <p class="text-4xl font-bold mt-1"><?= number_format($user['coin'] ?? 0) ?></p>
                    </div>

                </div>

                <hr class="my-6">

                <!-- Form Edit Profil -->
                <h3 class="text-xl font-semibold mb-4">Edit Profil</h3>

                <form action="/profil/update" method="post" class="space-y-4">

                    <div>
                        <label class="block font-semibold mb-1">Nama</label>
                        <input type="text" name="nama" class="w-full p-3 border rounded"
                               value="<?= esc($user['nama'] ?? '') ?>">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Email</label>
                        <input type="email" name="email" class="w-full p-3 border rounded"
                               value="<?= esc($user['email'] ?? '') ?>">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Username</label>
                        <input type="text" name="username" class="w-full p-3 border rounded"
                               value="<?= esc($user['username'] ?? '') ?>">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">No HP</label>
                        <input type="text" name="no_hp" class="w-full p-3 border rounded"
                               value="<?= esc($user['no_hp'] ?? '') ?>">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Favorit</label>
                        <input type="text" name="favorit" class="w-full p-3 border rounded"
                               value="<?= esc($user['favorit'] ?? '') ?>">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Password Baru (Opsional)</label>
                        <input type="password" name="password" class="w-full p-3 border rounded" 
                               placeholder="Isi jika ingin ganti password">
                    </div>

                    <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                        Simpan Perubahan
                    </button>
                </form>

            </div>

>>>>>>> 359a932304a6baf468a0638ce4d1206d2ed1ac60
        </div>
    </section>

<<<<<<< HEAD
      <div class="space-y-6">

        <div>
          <p class="font-semibold text-blue-700 text-sm">Email</p>
          <p class="text-lg text-gray-800"><?= esc($email) ?></p>
        </div>

        <div>
          <p class="font-semibold text-blue-700 text-sm">Nomor HP</p>
          <p class="text-lg text-gray-800"><?= esc($phone) ?></p>
        </div>

        <div>
          <p class="font-semibold text-blue-700 text-sm">Saldo</p>
          <p class="text-blue-600 text-3xl font-extrabold">
            Rp <?= number_format($saldo, 0, ',', '.') ?>
          </p>
        </div>

      </div>

      <div class="mt-10 flex gap-4">
        <a href="<?= base_url('topup') ?>"
           class="px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-900 transition shadow">
          Top-Up Saldo
        </a>

        <a href="<?= base_url('logout') ?>"
           class="px-6 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition shadow">
          Logout
        </a>
      </div>

    </div>

  </section>

  <?= $this->include('partials/footer'); ?>
=======
    <!-- Footer Global -->
    <?php include 'partials/footer.php'; ?>
>>>>>>> 359a932304a6baf468a0638ce4d1206d2ed1ac60

</body>
</html>
