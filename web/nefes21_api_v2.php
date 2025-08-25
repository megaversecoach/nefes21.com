<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200 );
    exit();
}

$action = $_GET['action'] ?? 'status';

switch ($action) {
    case 'health':
        echo json_encode([
            'status' => 'healthy',
            'timestamp' => date('c'),
            'service' => 'nefes21-api-v2'
        ]);
        break;
        
    case 'status':
        echo json_encode([
            'service' => 'nefes21-api-v2',
            'status' => 'running',
            'timestamp' => date('c'),
            'endpoints' => [
                'health' => '/nefes21_api_v2.php?action=health',
                'status' => '/nefes21_api_v2.php?action=status',
                'webhook' => '/nefes21_api_v2.php?action=webhook'
            ]
        ]);
        break;
        
    case 'webhook':
        $input = json_decode(file_get_contents('php://input'), true);
        echo json_encode([
            'received' => true,
            'timestamp' => date('c'),
            'data' => $input
        ]);
        break;
        
    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}
?>
