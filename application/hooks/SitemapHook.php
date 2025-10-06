<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SitemapHook
{
    public function update_sitemap()
    {
        $CI =& get_instance();
        $CI->load->database();

        // ✅ Create table if not exists
        if (!$CI->db->table_exists('sitemap_urls')) {
            $CI->db->query("
            CREATE TABLE IF NOT EXISTS sitemap_urls (
                id INT AUTO_INCREMENT PRIMARY KEY,
                url VARCHAR(255) NOT NULL,
                page_name VARCHAR(255) DEFAULT '',
                last_modified DATE,
                change_frequency VARCHAR(50),
                priority DECIMAL(2,1)
            )
        ");
        }

        $view_path = APPPATH . 'views/';
        $base_url = base_url();

        // --- your existing logic for view_files and routes ---
        $view_files = array_filter(scandir($view_path), function ($file) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'php';
        });

        $routes_file = APPPATH . 'config/routes.php';
        $routes = [];
        if (file_exists($routes_file)) {
            $content = file_get_contents($routes_file);
            preg_match_all("/\\\$route\['([^']*)'\]/", $content, $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $route) {
                    if ($route !== 'default_controller' && $route !== '404_override' && $route !== 'translate_uri_dashes') {
                        $routes[] = $route;
                    }
                }
            }
        }

        $urls_to_insert = [];
        foreach ($routes as $route) {
            $url = ($route === '') ? $base_url : $base_url . $route;

            $page_name = 'N/A';
            foreach ($view_files as $vf) {
                $vf_name = pathinfo($vf, PATHINFO_FILENAME);
                if (($route === '' && ($vf_name === 'index' || $vf_name === 'home')) || $vf_name === $route) {
                    $page_name = $vf_name;
                    break;
                }
            }

            $file_path = $this->find_view_file($view_path, $page_name);

            $last_modified = date('Y-m-d');
            $changefreq = 'weekly';
            $priority = 0.8;

            if ($file_path && file_exists($file_path)) {
                $last_modified_ts = filemtime($file_path);
                $last_modified = date('Y-m-d', $last_modified_ts);
                $cp = $this->get_changefreq_priority($last_modified_ts);
                $changefreq = $cp['changefreq'];
                $priority = $cp['priority'];
            }

            $urls_to_insert[] = [
                'url' => $url,
                'page_name' => $page_name,
                'last_modified' => $last_modified,
                'change_frequency' => $changefreq,
                'priority' => $priority,
            ];
        }

        // ✅ Insert into DB
        foreach ($urls_to_insert as $data) {
            $CI->db->replace('sitemap_urls', $data);
        }
    }

    private function find_view_file($directory, $page_name)
    {
        if ($page_name === 'N/A') {
            return false;
        }
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

        foreach ($iterator as $file) {
            if ($file->isDir())
                continue;
            if ($file->getExtension() === 'php' && $file->getBasename('.php') === $page_name) {
                return $file->getPathname();
            }
        }
        return false;
    }

    private function get_changefreq_priority($lastmod_timestamp)
    {
        $now = time();
        $age = $now - $lastmod_timestamp;
        if ($age < 86400) {
            return ['changefreq' => 'daily', 'priority' => '1.0'];
        } elseif ($age < 7 * 86400) {
            return ['changefreq' => 'weekly', 'priority' => '0.8'];
        } elseif ($age < 30 * 86400) {
            return ['changefreq' => 'monthly', 'priority' => '0.5'];
        } else {
            return ['changefreq' => 'yearly', 'priority' => '0.3'];
        }
    }
}