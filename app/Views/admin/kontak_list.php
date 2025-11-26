<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">

<h1 class="text-3xl font-bold mb-5">Data Pesan Masuk</h1>

<table class="w-full border-collapse">
  <thead>
    <tr class="bg-blue-700 text-white">
      <th class="p-3 border">No</th>
      <th class="p-3 border">Nama</th>
      <th class="p-3 border">Email</th>
      <th class="p-3 border">Pesan</th>
      <th class="p-3 border">Tanggal</th>
    </tr>
  </thead>

  <tbody>
    <?php $no=1; foreach($kontak as $k): ?>
    <tr class="bg-white">
      <td class="border p-3"><?= $no++ ?></td>
      <td class="border p-3"><?= $k['nama'] ?></td>
      <td class="border p-3"><?= $k['email'] ?></td>
      <td class="border p-3"><?= $k['pesan'] ?></td>
      <td class="border p-3"><?= $k['created_at'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>
