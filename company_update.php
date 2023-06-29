<?php
// 入力項目のチェック
if (
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['address']) || $_POST['address'] === '' ||
  !isset($_POST['tel']) || $_POST['tel'] === '' ||
  !isset($_POST['id']) || $_POST['id'] === ''
) {
  exit('paramError');
}

$name = $_POST['name'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$id = $_POST['id'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE company SET name=:name, address=:address, tel=:tel, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:company_read.php');
exit();