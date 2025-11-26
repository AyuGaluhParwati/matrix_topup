<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - MTRIX</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      /* background image yang kamu kirim */
      background: url('https://downloader.minipul.com//uploads/WhatsApp%20Image%202025-11-03%20at%2020.49.18_9250d762.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }

    /* glass card */
    .glass-card {
      backdrop-filter: blur(12px);
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 1rem;
      border: 1px solid rgba(255, 255, 255, 0.4);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
      padding: 2rem;
      width: 100%;
      max-width: 420px;
      text-align: center;
      animation: fadeIn 0.7s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(18px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .input-field {
      background-color: #f3f4f6;
      padding: 0.6rem 0.75rem;
      border-radius: 0.6rem;
      width: 100%;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 0.9rem;
    }

    .input-field input {
      border: none;
      outline: none;
      background: transparent;
      flex: 1;
      font-size: 0.95rem;
    }

    .btn-login {
      background-color: #3b82f6;
      color: white;
      font-weight: 600;
      padding: 0.75rem 0;
      width: 100%;
      border-radius: 0.6rem;
      transition: all 0.25s ease;
    }

    .btn-login:hover { background-color: #2563eb; }

    /* tombol eye di dalam input password */
    .eye-btn {
      background: transparent;
      border: none;
      padding: 0.15rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      border-radius: 0.35rem;
    }
    .eye-btn:focus { outline: 2px solid rgba(59,130,246,0.2); }

    /* kecilkan icon svg agar rapi */
    .icon-sm { width: 20px; height: 20px; }
  </style>
</head>
<body>

  <div class="glass-card">
    <h2 class="text-2xl font-bold mb-2">Login<span class="text-blue-600">MTRIX</span></h2>
    <p class="text-gray-700 mb-6 uppercase text-sm tracking-wide">Masuk Akun</p>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="bg-red-500 text-white p-2 rounded mb-4 text-sm">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form action="/login" method="post" autocomplete="on">
      <!-- Email Input -->
      <div class="input-field">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H6m2 0h8m0 0h2m-2 0v4m0-4V8"/>
        </svg>
        <input id="email" type="email" name="email" placeholder="Masukkan email" required aria-label="email">
      </div>

      <!-- Password Input with show/hide -->
      <div class="input-field">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c.828 0 1.5-.672 1.5-1.5S12.828 8 12 8s-1.5.672-1.5 1.5S11.172 11 12 11z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13v7m-6 0h12"/>
        </svg>

        <input id="password" type="password" name="password" placeholder="Masukkan password" required aria-label="kata sandi">

        <!-- tombol untuk toggle visibility -->
        <button type="button" id="togglePassword" class="eye-btn" aria-label="Tampilkan kata sandi" title="Tampilkan / Sembunyikan kata sandi">
          <!-- eye (show) icon; we'll toggle innerHTML via JS -->
          <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="icon-sm text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
          </svg>
          <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="icon-sm text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.967 9.967 0 012.223-3.402M6.6 6.6A9.955 9.955 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.966 9.966 0 01-1.223 2.75M3 3l18 18"/>
          </svg>
        </button>
      </div>

      <button type="submit" class="btn-login mb-4">Masuk</button>
    </form>

    <div class="flex justify-between text-sm">
      <a href="/register" class="text-green-600 hover:underline">Buat Akun Baru</a>
      <a href="/forgot-password" class="text-blue-600 hover:underline">Lupa Kata Sandi?</a>
    </div>
  </div>

  <script>
    // Toggle visibility password
    (function() {
      const passwordInput = document.getElementById('password');
      const toggleBtn = document.getElementById('togglePassword');
      const eyeOpen = document.getElementById('eyeOpen');
      const eyeClosed = document.getElementById('eyeClosed');

      toggleBtn.addEventListener('click', function() {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        // update aria-label and icon
        toggleBtn.setAttribute('aria-label', isPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
        if (isPassword) {
          eyeOpen.style.display = 'none';
          eyeClosed.style.display = '';
        } else {
          eyeOpen.style.display = '';
          eyeClosed.style.display = 'none';
        }
      });

      // opsional: toggle with keyboard (Enter/Space) when tombol fokus
      toggleBtn.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          toggleBtn.click();
        }
      });
    })();
  </script>

</body>
</html>
