<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit User</title>
</head>
<body>

<div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
    <h2 class="text-3xl font-bold mb-6 text-blue-700 text-center">
        <i class="fa-solid fa-user-pen mr-2"></i>Edit User
    </h2>

    <form action="<?= base_url('admin/users/update/'.$user['id']) ?>" method="post" class="space-y-6">

        <!-- Nama -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="nama" value="<?= $user['nama'] ?>" 
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Username -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Username</label>
            <input type="text" name="username" value="<?= $user['username'] ?>" 
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" 
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Nomor HP -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nomor HP</label>
            <input type="text" name="no_hp" value="<?= $user['no_hp'] ?>" 
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                   placeholder="08xxxxxxxxxx">
        </div>

        <!-- Role -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Role</label>
            <select name="role" 
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
                <option value="user" <?= $user['role']=='user'?'selected':'' ?>>User</option>
            </select>
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">
                Password <span class="text-gray-400">(kosongkan jika tidak ingin diubah)</span>
            </label>
            <input type="password" name="password" 
                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tombol Update -->
        <div class="text-center">
            <button type="submit" 
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Update
            </button>
        </div>

    </form>
</div>

</body>
</html>
