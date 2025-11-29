<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTRIX - Kontak Kami</title>

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
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- Header (JANGAN DIUBAH) -->
  <?php include 'partials/header.php'; ?>


  <!-- =============================== -->
  <!--           CONTACT PAGE          -->
  <!-- =============================== -->

  <!-- Hero Section -->
  <section class="pt-24 pb-10 bg-blue-700 text-white text-center shadow-md">
    <div class="container mx-auto px-4">
      <h1 class="text-3xl font-bold">Hubungi Kami</h1>
      <p class="mt-2 text-blue-200">
        Ada kendala atau pertanyaan? Tim MTRIX siap membantu Anda.
      </p>
    </div>
  </section>

  <!-- Main Content -->
  <section class="container mx-auto px-4 py-14 grid md:grid-cols-2 gap-10">

    <!-- Informasi Kontak -->
    <div>
      <h2 class="text-2xl font-bold text-blue-700 mb-5">Informasi Kontak</h2>

      <div class="space-y-5">

        <div class="flex items-start gap-4">
          <i class="fa-solid fa-location-dot text-blue-700 text-2xl"></i>
          <div>
            <p class="font-semibold">Alamat</p>
            <p>Jl. Kampus Bukit Jimbaran, Kuta Selatan Badung</p>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <i class="fa-solid fa-phone text-blue-700 text-2xl"></i>
          <div>
            <p class="font-semibold">Telepon</p>
            <a href="tel:+628123456789" class="text-blue-700 hover:underline">
              +62 812-3456-789
            </a>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <i class="fa-solid fa-envelope text-blue-700 text-2xl"></i>
          <div>
            <p class="font-semibold">Email</p>
            <a href="mailto:cs@mtrix.id" class="text-blue-700 hover:underline">
              cs@mtrix.id
            </a>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <i class="fa-solid fa-clock text-blue-700 text-2xl"></i>
          <div>
            <p class="font-semibold">Jam Operasional</p>
            <p>Senin – Minggu • 08:00 – 22:00</p>
          </div>
        </div>

      </div>

      <!-- Sosial Media -->
      <h3 class="text-2xl font-bold text-blue-700 mt-10 mb-4">Ikuti Kami</h3>
      <div class="flex gap-6 text-blue-700 text-3xl">
        <a href="#" class="hover:text-blue-900"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/gung_galuh1/" target="_blank" class="hover:text-blue-900">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="#" class="hover:text-blue-900"><i class="fa-brands fa-github"></i></a>
      </div>
    </div>

   <!-- Formulir Kontak -->
<div class="bg-white p-6 rounded-xl shadow-md">
  <h2 class="text-2xl font-bold text-blue-700 mb-5">Kirim Pesan</h2>

  <form action="<?= base_url('kontak/send') ?>" method="POST" class="space-y-5">

    <div>
      <label class="font-semibold">Nama Lengkap</label>
      <input type="text" name="nama"
        class="w-full px-4 py-3 border rounded-lg focus:ring focus:ring-blue-300"
        placeholder="Isi nama lengkap Anda" required>
    </div>

    <div>
      <label class="font-semibold">Email</label>
      <input type="email" name="email"
        class="w-full px-4 py-3 border rounded-lg focus:ring focus:ring-blue-300"
        placeholder="Email aktif" required>
    </div>

    <div>
      <label class="font-semibold">Subjek</label>
      <input type="text" name="subjek"
        class="w-full px-4 py-3 border rounded-lg focus:ring focus:ring-blue-300"
        placeholder="Judul pesan / keperluan" required>
    </div>

    <div>
      <label class="font-semibold">Pesan</label>
      <textarea name="pesan"
        class="w-full px-4 py-3 border rounded-lg focus:ring focus:ring-blue-300" rows="5"
        placeholder="Tulis pesan Anda" required></textarea>
    </div>

    <button class="bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-900 transition">
      Kirim Pesan
    </button>

  </form>
</div>
  </section>




  <!-- Footer (JANGAN DIUBAH) -->
  <?php include 'partials/footer.php'; ?>

</body>
</html>
