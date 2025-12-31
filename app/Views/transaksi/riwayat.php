<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi - MTRIX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

<!-- HEADER -->
<?= $this->include('partials/header') ?>

<!-- CONTENT -->
<section class="pt-24 pb-12">
    <div class="container mx-auto px-4 max-w-6xl">

        <h2 class="text-3xl font-bold text-blue-900 mb-6 flex items-center gap-2">
            <i class="fa-solid fa-clock-rotate-left"></i>
            Riwayat Transaksi
        </h2>

        <!-- Flash Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (empty($transaksi)): ?>
            <div class="bg-white rounded shadow p-6 text-center text-gray-500">
                <i class="fa-solid fa-receipt text-4xl mb-3"></i>
                <p>Belum ada transaksi.</p>
            </div>
        <?php else: ?>

        <!-- TABLE -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Produk</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Harga</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 1; foreach ($transaksi as $t): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3"><?= $no++ ?></td>

                        <td class="px-4 py-3 font-semibold">
                            <?= esc($t['nama_produk']) ?>
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-500">
                            <?= esc($t['nama_kategori']) ?>
                        </td>

                        <td class="px-4 py-3 text-blue-700 font-semibold">
                            Rp <?= number_format($t['harga'], 0, ',', '.') ?>
                        </td>

                        <td class="px-4 py-3">
                            <?php if ($t['status'] === 'pending'): ?>
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Pending
                                </span>
                            <?php elseif ($t['status'] === 'success'): ?>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Berhasil
                                </span>
                            <?php else: ?>
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Gagal
                                </span>
                            <?php endif; ?>
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-600">
                            <?= date('d M Y H:i', strtotime($t['created_at'])) ?>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <a href="<?= base_url('transaksi/detail/' . $t['id_transaksi']) ?>"
                               class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                Detail
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php endif; ?>

    </div>
</section>

<!-- FOOTER -->
<?= $this->include('partials/footer') ?>

</body>
</html>
