<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - MTRIX</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center p-2 rounded bg-blue-600">
        <i class="fa-solid fa-gauge mr-3"></i> Dashboard
      </a>
      <a href="<?= base_url('admin/users') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
        <i class="fa-solid fa-users mr-3"></i> Pengguna
      </a>
      <a href="<?= base_url('admin/transaksi') ?>" class="flex items-center p-2 rounded hover:bg-blue-600">
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
      <i class="fa-solid fa-gauge mr-2"></i> Dashboard Admin
    </h2>

    <!-- ================= STAT CARD ================= -->
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
          <i class="fa-solid fa-users text-3xl text-blue-600 mr-4"></i>
          <div>
            <h3 class="text-xl font-bold"><?= $totalUsers ?></h3>
            <p class="text-gray-500">Total Pengguna</p>
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
          <i class="fa-solid fa-cart-shopping text-3xl text-green-600 mr-4"></i>
          <div>
            <h3 class="text-xl font-bold">246</h3>
            <p class="text-gray-500">Total Transaksi</p>
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
          <i class="fa-solid fa-tags text-3xl text-yellow-500 mr-4"></i>
          <div>
            <h3 class="text-xl font-bold"><?= $total_produk ?></h3>
            <p class="text-gray-500">Total Produk</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= GRAFIK ================= -->
    <div class="mt-10 bg-white p-6 rounded-lg shadow">
      <h3 class="text-2xl font-bold mb-6 text-blue-700">
        <i class="fa-solid fa-chart-column mr-2"></i> Statistik Data
      </h3>

      <!-- Bar Horizontal & Pie -->
      <div class="grid md:grid-cols-2 gap-6">
        <div class="h-[280px]">
          <canvas id="barHorizontal"></canvas>
        </div>
        <div class="h-[280px]">
          <canvas id="pieChart"></canvas>
        </div>
      </div>

      <!-- Line Chart Per Bulan -->
      <div class="mt-10 h-[320px]">
        <canvas id="monthlyChart"></canvas>
      </div>
    </div>

  </main>
</div>

<!-- ================= SCRIPT ================= -->
<script>
  const totalUsers = <?= $totalUsers ?>;
  const totalProduk = <?= $total_produk ?>;
  const totalTransaksi = 246;

  /* ================= BAR HORIZONTAL ================= */
  new Chart(document.getElementById('barHorizontal'), {
    type: 'bar',
    data: {
      labels: ['Pengguna', 'Transaksi', 'Produk'],
      datasets: [{
        data: [totalUsers, totalTransaksi, totalProduk],
        backgroundColor: ['#2563eb', '#16a34a', '#facc15'],
        borderRadius: 6
      }]
    },
    options: {
      indexAxis: 'y',
      responsive: true,
      maintainAspectRatio: false,
      plugins: { legend: { display: false } },
      scales: { x: { beginAtZero: true } }
    }
  });

  /* ================= PIE ================= */
  new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
      labels: ['Pengguna', 'Transaksi', 'Produk'],
      datasets: [{
        data: [totalUsers, totalTransaksi, totalProduk],
        backgroundColor: ['#2563eb', '#16a34a', '#facc15']
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });

  /* ================= LINE PER BULAN ================= */
  new Chart(document.getElementById('monthlyChart'), {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
      datasets: [
        {
          label: 'Pengguna',
          data: [5,8,12,15,18,20,22,25,28,30,32,35],
          borderColor: '#2563eb',
          tension: 0.4
        },
        {
          label: 'Transaksi',
          data: [10,15,20,25,30,28,35,40,45,48,50,55],
          borderColor: '#16a34a',
          tension: 0.4
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
</script>

</body>
</html>
