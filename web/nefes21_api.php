<?php
/**
 * nefes21.com API Endpoint
 * Bu dosya nefes21.com sitesine yüklenecek ve API işlevselliği sağlayacak
 */

// CORS headers - n8n entegrasyonu için gerekli
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

// OPTIONS request için
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Basit authentication kontrolü
function checkAuth() {
    // Session kontrolü - admin paneline giriş yapmış mı?
    session_start();
    return isset($_SESSION['user_id']) || isset($_SESSION['admin_logged_in']);
}

// Veritabanı bağlantısı (nefes21.com'un mevcut bağlantısını kullan)
function getDbConnection() {
    // Bu kısım nefes21.com'un mevcut veritabanı ayarlarına göre düzenlenecek
    // Şimdilik mock data döndürüyoruz
    return null;
}

// API endpoint'leri
$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

// URL parsing
$path = parse_url($request_uri, PHP_URL_PATH);
$path_parts = explode('/', trim($path, '/'));

// API base path'i bul
$api_index = array_search('api', $path_parts);
if ($api_index === false) {
    http_response_code(404);
    echo json_encode(['error' => 'API endpoint not found']);
    exit();
}

$endpoint = isset($path_parts[$api_index + 1]) ? $path_parts[$api_index + 1] : '';
$action = isset($path_parts[$api_index + 2]) ? $path_parts[$api_index + 2] : '';

switch ($endpoint) {
    case 'health':
        echo json_encode([
            'status' => 'healthy',
            'timestamp' => date('c'),
            'service' => 'nefes21-api'
        ]);
        break;
        
    case 'status':
        echo json_encode([
            'service' => 'nefes21-api',
            'status' => 'running',
            'authenticated' => checkAuth(),
            'timestamp' => date('c'),
            'endpoints' => [
                'health' => '/api/health',
                'status' => '/api/status',
                'posts' => '/api/posts',
                'users' => '/api/users',
                'webhook' => '/api/webhook'
            ]
        ]);
        break;
        
    case 'posts':
        if (!checkAuth()) {
            http_response_code(401);
            echo json_encode(['error' => 'Authentication required']);
            exit();
        }
        
        if ($request_method === 'GET') {
            // Yazıları getir
            $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
            $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
            
            // Mock data - gerçek implementasyonda veritabanından çekilecek
            $posts = [];
            for ($i = $offset + 1; $i <= $offset + $limit; $i++) {
                $posts[] = [
                    'id' => 2532 - $i,
                    'title' => "Örnek Yazı $i",
                    'content' => "Bu $i. yazının içeriğidir...",
                    'author' => 'Kişiselgelişimtv',
                    'date' => date('c'),
                    'status' => 'published',
                    'category' => 'Yazılar',
                    'language' => 'Turkce',
                    'type' => 'Makale'
                ];
            }
            
            echo json_encode([
                'posts' => $posts,
                'total' => 1605,
                'limit' => $limit,
                'offset' => $offset
            ]);
        } elseif ($request_method === 'POST') {
            // Yeni yazı oluştur
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($input['title']) || !isset($input['content'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Title and content required']);
                exit();
            }
            
            // Mock response - gerçek implementasyonda veritabanına kaydedilecek
            echo json_encode([
                'success' => true,
                'message' => 'Post created successfully',
                'post' => [
                    'id' => 2532,
                    'title' => $input['title'],
                    'content' => $input['content'],
                    'author' => $input['author'] ?? 'API',
                    'created_at' => date('c')
                ]
            ]);
        }
        break;
        
    case 'users':
        if (!checkAuth()) {
            http_response_code(401);
            echo json_encode(['error' => 'Authentication required']);
            exit();
        }
        
        // Mock kullanıcı verisi
        echo json_encode([
            'users' => [
                ['id' => 1, 'username' => 'Onur95', 'email' => 'onur@example.com', 'status' => 'active'],
                ['id' => 2, 'username' => 'Handan TANIDIR', 'email' => 'handan@example.com', 'status' => 'active'],
                ['id' => 3, 'username' => 'eva_xurush01', 'email' => 'eva@example.com', 'status' => 'active'],
                ['id' => 4, 'username' => 'Kişiselgelişimtv', 'email' => 'tv@example.com', 'status' => 'active'],
                ['id' => 5, 'username' => 'SABA', 'email' => 'saba@example.com', 'status' => 'active'],
                ['id' => 6, 'username' => 'Felice', 'email' => 'felice@example.com', 'status' => 'active']
            ]
        ]);
        break;
        
    case 'webhook':
        // n8n webhook endpoint
        $input = json_decode(file_get_contents('php://input'), true);
        
        $webhook_type = $input['type'] ?? 'unknown';
        
        $response = [
            'received' => true,
            'type' => $webhook_type,
            'timestamp' => date('c'),
            'data' => $input
        ];
        
        // Webhook tipine göre işlem yap
        if ($webhook_type === 'new_post' && isset($input['title']) && isset($input['content'])) {
            // Yeni yazı webhook'u - gerçek implementasyonda veritabanına kaydedilecek
            $response['action_result'] = [
                'success' => true,
                'message' => 'Post created via webhook',
                'post_id' => 2533
            ];
        }
        
        echo json_encode($response);
        break;
        
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}
?>

