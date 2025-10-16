<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'title',
        'content',
        'date_posted',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get all announcements ordered by date posted (newest first)
     */
    public function getAllAnnouncements()
    {
        return $this->orderBy('date_posted', 'DESC')->findAll();
    }
}
