<?php
session_start();
include "koneksi.php";

// -------------------------------
// CEK LOGIN
// -------------------------------
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

// -------------------------------
// GET DATA USER
// -------------------------------
$query = mysqli_query($conn, "SELECT * FROM user WHERE id='$user_id'");
$data = mysqli_fetch_assoc($query);

// JIKA DATA TIDAK KETEMU
if (!$data) {
  echo "User tidak ditemukan";
  exit;
}

// Variabel tampilan
$namaPengguna = $data['nama'];
$email = $data['email'];
$username = $data['username'];
$nohp = $data['no_hp'];
$gameFavorit = $data['favorit'];
$coin = $data['coin'];            // Coin awal = 0
$totalTransaksi = $data['transaksi']; // TOTAL transaksi
$bergabung = $data['created_at'];     // Tanggal daftar user
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTRIX - Profil Akun</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f2f6ff;
    }

    .avatar-ring {
      background: linear-gradient(135deg, #0057ff, #ff7b00);
      padding: 4px;
      border-radius: 100%;
    }

    .card {
      background: white;
      border-radius: 20px;
      padding: 24px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header class="bg-white border-b shadow-sm">
    <div class="max-w-6xl mx-auto px-6 py-3 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-blue-600 flex items-center justify-center text-white font-bold rounded-lg">M</div>
        <div>
          <div class="text-lg font-bold">MTRIX</div>
          <div class="text-xs text-gray-500 -mt-1">Dashboard</div>
        </div>
      </div>

      <nav class="flex gap-6 text-sm text-gray-600 font-medium">
        <a href="index.php">Beranda</a>
        <a href="topup.php">Top Up</a>
        <a href="bantuan.php">Bantuan</a>
        <a href="profil.php" class="text-blue-600 font-bold">Profil</a>
      </nav>
    </div>
  </header>

  <!-- HERO -->
  <section class="bg-blue-600 text-white py-12 text-center shadow">
    <h1 class="text-4xl font-bold">Profil Akun</h1>
    <p class="mt-1 opacity-80">Kelola informasi akun top up game kamu</p>
  </section>

  <!-- MAIN -->
  <main class="max-w-5xl mx-auto px-6 -mt-10">

    <!-- STATUS -->
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
      <div class="bg-green-100 text-green-700 border border-green-300 p-3 rounded mb-4">
        Profil berhasil diperbarui!
      </div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
      <div class="bg-red-100 text-red-700 border border-red-300 p-3 rounded mb-4">
        Terjadi kesalahan saat menyimpan data.
      </div>
    <?php endif; ?>

    <div class="card">

      <!-- AVATAR + NAME -->
      <div class="flex flex-col md:flex-row items-center gap-8">
        <div class="avatar-ring">
          <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
               class="w-32 h-32 bg-white rounded-full object-cover">
        </div>

        <div>
          <h2 class="text-3xl font-bold"><?= $namaPengguna ?></h2>
          <p class="text-gray-500 text-sm">Pemain sejak <?= date("Y", strtotime($bergabung)) ?></p>
        </div>
      </div>

      <!-- INFO GRID -->
      <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="p-5 border rounded-xl">
          <p class="text-sm text-gray-500 font-semibold">Email</p>
          <p class="mt-1"><?= $email ?></p>
        </div>

        <div class="p-5 border rounded-xl">
          <p class="text-sm text-gray-500 font-semibold">Username</p>
          <p class="mt-1"><?= $username ?></p>
        </div>

        <div class="p-5 border rounded-xl">
          <p class="text-sm text-gray-500 font-semibold">No. HP</p>
          <p class="mt-1"><?= $nohp ?></p>
        </div>

        <div class="p-5 border rounded-xl">
          <p class="text-sm text-gray-500 font-semibold">Platform Favorit</p>
          <p class="mt-1"><?= $gameFavorit ?></p>
        </div>

        <div class="p-5 border rounded-xl bg-blue-50">
          <p class="text-sm text-gray-500 font-semibold">Coin</p>
          <p class="text-3xl font-bold text-blue-600 mt-1"><?= number_format($coin) ?></p>
        </div>

        <div class="p-5 border rounded-xl">
          <p class="text-sm text-gray-500 font-semibold">Total Transaksi</p>
          <p class="text-2xl font-bold mt-1"><?= $totalTransaksi ?></p>
        </div>

      </div>

      <!-- BUTTONS -->
      <div class="mt-10 flex flex-col md:flex-row gap-4">
        <a href="tambah_coin.php" class="bg-blue-600 text-white px-8 py-3 rounded-xl text-center font-semibold">
          Tambah Coin
        </a>

        <a href="riwayat.php" class="border border-blue-600 text-blue-600 px-8 py-3 rounded-xl text-center font-semibold">
          Riwayat
        </a>

        <a href="logout.php" class="bg-orange-500 text-white px-8 py-3 rounded-xl text-center font-semibold">
          Logout
        </a>
      </div>

      <!-- UPDATE PROFIL -->
      <div class="mt-10">
        <h3 class="text-xl font-bold mb-3">Update Profil</h3>

        <form action="update_profil.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">

          <div>
            <label class="text-sm font-semibold text-gray-600">Nama</label>
            <input type="text" name="nama" value="<?= $namaPengguna ?>"
                   class="w-full mt-1 p-3 border rounded-lg">
          </div>

          <div>
            <label class="text-sm font-semibold text-gray-600">Email</label>
            <input type="email" name="email" value="<?= $email ?>"
                   class="w-full mt-1 p-3 border rounded-lg">
          </div>

          <div>
            <label class="text-sm font-semibold text-gray-600">Username</label>
            <input type="text" name="username" value="<?= $username ?>"
                   class="w-full mt-1 p-3 border rounded-lg">
          </div>

          <div>
            <label class="text-sm font-semibold text-gray-600">No. HP</label>
            <input type="text" name="no_hp" value="<?= $nohp ?>"
                   class="w-full mt-1 p-3 border rounded-lg">
          </div>

          <div>
            <label class="text-sm font-semibold text-gray-600">Platform Favorit</label>
            <input type="text" name="favorit" value="<?= $gameFavorit ?>"
                   class="w-full mt-1 p-3 border rounded-lg">
          </div>

          <div>
            <label class="text-sm font-semibold text-gray-600">Password Baru</label>
            <input type="password" name="password"
                   class="w-full mt-1 p-3 border rounded-lg" placeholder="Kosongkan jika tidak diganti">
          </div>

          <div class="md:col-span-2">
            <button type="submit"
                    class="bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold w-full">
              Simpan Perubahan
            </button>
          </div>

        </form>
      </div>

    </div>
  </main>

  <footer class="text-center text-sm text-gray-500 mt-10 py-6">
    © 2025 MTRIX - Top Up Game
  </footer>

</body>

</html>
