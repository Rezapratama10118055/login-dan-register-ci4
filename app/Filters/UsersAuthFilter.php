<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');
    
    // Jika pengguna mencoba mengakses halaman login atau register,
    // lewati pengecekan autentikasi.
    if ($uri->getSegment(1) == 'login' || $uri->getSegment(1) == 'register') {
        return;
    }

    if (is_null(session()->get('logged_in'))) {
        return redirect()->to(base_url('login/index'));
    }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}