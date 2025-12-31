<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthTransaksiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // ❌ BELUM LOGIN
        if (! $session->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login untuk melakukan transaksi.');
        }

        // ❌ ADMIN TIDAK BOLEH TRANSAKSI (opsional)
        if ($session->get('role') === 'admin') {
            return redirect()->to('/admin/dashboard')
                ->with('error', 'Admin tidak dapat melakukan transaksi.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak digunakan
    }
}
