<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Admin
            [
                'name'     => 'Admin User',
                'email'    => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            // Teachers
            [
                'name'     => 'Teacher Smith',
                'email'    => 'teacher@example.com',
                'password' => password_hash('teacher123', PASSWORD_DEFAULT),
                'role'     => 'teacher',
            ],
            [
                'name'     => 'Prof. Johnson',
                'email'    => 'professor@example.com',
                'password' => password_hash('teacher123', PASSWORD_DEFAULT),
                'role'     => 'teacher',
            ],
           
            // Students
            [
                'name'     => 'Student One',
                'email'    => 'student1@example.com',
                'password' => password_hash('student123', PASSWORD_DEFAULT),
                'role'     => 'student',
            ],
            [
                'name'     => 'Student Two',
                'email'    => 'student2@example.com',
                'password' => password_hash('student123', PASSWORD_DEFAULT),
                'role'     => 'student',
            ],
            [
                'name'     => 'Student Three',
                'email'    => 'student3@example.com',
                'password' => password_hash('student123', PASSWORD_DEFAULT),
                'role'     => 'student',
            ],
        ];

        // Insert all users at once
        $this->db->table('users')->insertBatch($data);
    }
}
