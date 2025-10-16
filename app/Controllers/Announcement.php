<?php

namespace App\Controllers;

class Announcement extends BaseController
{
    public function index()
    {
        // Load the announcement model
        $announcementModel = new \App\Models\AnnouncementModel();

        // Fetch all announcements from database (ordered by date posted, newest first)
        $data['announcements'] = $announcementModel->getAllAnnouncements();

        // Load the announcements view
        return view('announcements', $data);
    }
}
