<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Announcement extends Controller
{
    public function index()
    {
        $announcementModel = new \App\Models\AnnouncementModel();

        // Use the correct field name for ordering
        $data['announcements'] = $announcementModel->orderBy('date_posted', 'DESC')->findAll();

        return view('announcements', $data);
    }
}
