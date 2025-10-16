
<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $uri = $request->getUri();
        $path = $uri->getPath();

        // Remove leading slash for consistency
        $path = ltrim($path, '/');

        $userRole = strtolower($session->get('role'));

        // Define role-based access rules
        $accessRules = [
            'admin' => ['admin'], // admins can access any route starting with /admin
            'teacher' => ['teacher'], // teachers can access routes starting with /teacher
            'student' => ['student', 'announcements'] // students can access /student/* and /announcements
        ];

        $allowedPrefixes = $accessRules[$userRole] ?? [];

        // Check if user has access to the current path
        $hasAccess = false;

        foreach ($allowedPrefixes as $prefix) {
            if (strpos($path, $prefix) === 0) {
                $hasAccess = true;
                break;
            }
        }

        // Special case: allow access to /announcements for all logged-in users
        if (!$hasAccess && $path === 'announcements') {
            $hasAccess = true;
        }

        if (!$hasAccess) {
            $session->setFlashdata('error', 'Access Denied: Insufficient Permissions');
            return redirect()->to('/announcements');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after request
    }
}
