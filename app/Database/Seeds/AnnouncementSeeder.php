<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\AnnouncementModel;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $announcementModel = new AnnouncementModel();

        $announcements = [
            [
                'title' => 'Welcome to the Online Student Portal',
                'content' => 'We are excited to announce the launch of our new Online Student Portal! This platform will serve as a central hub for all your academic needs, including course materials, grades, announcements, and more.',
                'date_posted' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'New Course Registration Period Open',
                'content' => 'The registration period for the upcoming semester is now open. Students can log in to their accounts to view available courses and register for classes. Please complete your registration by the deadline to secure your preferred schedule.',
                'date_posted' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'title' => 'System Maintenance Scheduled',
                'content' => 'Please be advised that the Online Student Portal will be undergoing routine maintenance this weekend from Saturday 10:00 PM to Sunday 2:00 AM. During this time, the system may be temporarily unavailable.',
                'date_posted' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
        ];

        foreach ($announcements as $announcement) {
            $announcementModel->insert($announcement);
        }

        echo "Seeded announcements table with sample data.\n";
    }
}
