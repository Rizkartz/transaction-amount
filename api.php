<?php
// Izinkan akses dari mana saja (CORS) - penting buat local testing
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = 'localhost';
$dbname = 'expense_tracker';
$user = 'root'; 
$pass = '';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    
    echo json_encode(["status" => "error", "message" => "Koneksi DB Failed: " . $e->getMessage()]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Mengambil data untuk ditampilkan
    $stmt = $pdo->query("SELECT * FROM transactions ORDER BY id DESC");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} 
elseif ($method === 'POST') {
    // Menerima data baru
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Simpan ke DB
    $sql = "INSERT INTO transactions (transaction_type, amount, category, description) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$type, $amount, $category, $description]);
    
    echo json_encode(["status" => "success", "message" => "Berhasil disimpan!"]);
}
?>