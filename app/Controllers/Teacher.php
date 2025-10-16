<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Teacher extends Controller
{
    public function dashboard()
    {
        $session = session();

        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            $session->setFlashdata('login_error', 'Please login to access the dashboard.');
            return redirect()->to('login');
        }

        $role = strtolower((string) $session->get('role'));

        // Check if user has teacher role
        if ($role !== 'teacher') {
            $session->setFlashdata('error', 'Access Denied: Teacher privileges required.');
            return redirect()->to('/announcements');
        }

        // Dashboard data
        $data = [
            'user_name' => $session->get('user_name'),
            'user_email' => $session->get('user_email'),
            'role' => $role
        ];

        return view('teacher_dashboard', $data);
    }
}
