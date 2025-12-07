<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="bg-blue-600 text-white py-12 text-center shadow">
  <h1 class="text-4xl font-bold">Profil Akun</h1>
  <p class="mt-1 opacity-80">Kelola informasi akun top up game kamu</p>
</section>

<main class="max-w-5xl mx-auto px-6 -mt-10">

  <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <div class="bg-green-100 text-green-700 border border-green-300 p-3 rounded mb-4">
      Profil berhasil diperbarui!
    </div>
  <?php endif; ?>

  <div class="bg-white rounded-2xl p-8 shadow">

    <div class="flex flex-col md:flex-row items-center gap-8">
      <div class="bg-gradient-to-r from-blue-600 to-orange-500 p-1 rounded-full">
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
             class="w-32 h-32 bg-white rounded-full object-cover">
      </div>

      <div>
        <h2 class="text-3xl font-bold"><?= $user['nama'] ?></h2>
        <p class="text-gray-500 text-sm">Pemain sejak <?= date("Y", strtotime($user['created_at'])) ?></p>
      </div>
    </div>

    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">

      <div class="p-5 border rounded-xl">
        <p class="text-sm text-gray-500 font-semibold">Email</p>
        <p><?= $user['email'] ?></p>
      </div>

      <div class="p-5 border rounded-xl">
        <p class="text-sm text-gray-500 font-semibold">Username</p>
        <p><?= $user['username'] ?></p>
      </div>

      <div class="p-5 border rounded-xl">
        <p class="text-sm text-gray-500 font-semibold">No. HP</p>
        <p><?= $user['no_hp'] ?></p>
      </div>

      <div class="p-5 border rounded-xl">
        <p class="text-sm text-gray-500 font-semibold">Platform Favorit</p>
        <p><?= $user['favorit'] ?></p>
      </div>

      <div class="p-5 border rounded-xl bg-blue-50">
        <p class="text-sm text-gray-500 font-semibold">Coin</p>
        <p class="text-3xl font-bold text-blue-600 mt-1">
          <?= number_format($user['coin']) ?>
        </p>
      </div>

      <div class="p-5 border rounded-xl">
        <p class="text-sm text-gray-500 font-semibold">Total Transaksi</p>
        <p class="text-2xl font-bold mt-1"><?= $user['transaksi'] ?></p>
      </div>

    </div>

    <div class="mt-10">
      <h3 class="text-xl font-bold mb-3">Update Profil</h3>

      <form action="/profil/update" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
          <label class="font-semibold text-gray-600">Nama</label>
          <input type="text" name="nama" value="<?= $user['nama'] ?>" class="w-full mt-1 p-3 border rounded-lg">
        </div>

        <div>
          <label class="font-semibold text-gray-600">Email</label>
          <input type="email" name="email" value="<?= $user['email'] ?>" class="w-full mt-1 p-3 border rounded-lg">
        </div>

        <div>
          <label class="font-semibold text-gray-600">Username</label>
          <input type="text" name="username" value="<?= $user['username'] ?>" class="w-full mt-1 p-3 border rounded-lg">
        </div>

        <div>
          <label class="font-semibold text-gray-600">No. HP</label>
          <input type="text" name="no_hp" value="<?= $user['no_hp'] ?>" class="w-full mt-1 p-3 border rounded-lg">
        </div>

        <div>
          <label class="font-semibold text-gray-600">Platform Favorit</label>
          <input type="text" name="favorit" value="<?= $user['favorit'] ?>" class="w-full mt-1 p-3 border rounded-lg">
        </div>

        <div>
          <label class="font-semibold text-gray-600">Password Baru</label>
          <input type="password" name="password" class="w-full mt-1 p-3 border rounded-lg" placeholder="Kosongkan jika tidak diganti">
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

<?= $this->endSection() ?>
