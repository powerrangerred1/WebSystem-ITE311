<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Admin extends Controller
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
        $userId = (int) $session->get('user_id');

        // Check if user has admin role
        if ($role !== 'admin') {
            $session->setFlashdata('error', 'Access Denied: Admin privileges required.');
            return redirect()->to('/announcements');
        }

        // Prepare admin dashboard data (similar to student dashboard structure)
        $db = \Config\Database::connect();
        $roleData = [];

        try {
            $userModel = new UserModel();
            $roleData['totalUsers'] = $userModel->countAllResults();
            $roleData['totalAdmins'] = $userModel->where('role', 'admin')->countAllResults();
            $roleData['totalTeachers'] = $userModel->where('role', 'teacher')->countAllResults();
            $roleData['totalStudents'] = $userModel->where('role', 'student')->countAllResults();

            try {
                $roleData['totalCourses'] = $db->table('courses')->countAllResults();
            } catch (\Throwable $e) {
                $roleData['totalCourses'] = 0;
            }

            $roleData['recentUsers'] = $userModel->orderBy('created_at', 'DESC')->limit(5)->find();
        } catch (\Throwable $e) {
            // If database operations fail, provide fallback data
            $roleData = [];
        }

        $data = array_merge([
            'user_name' => $session->get('user_name'),
            'user_email' => $session->get('user_email'),
            'role' => $role
        ], $roleData);

        return view('admin_dashboard', $data);
    }
}
