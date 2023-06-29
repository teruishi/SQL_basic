<?php
// 入力項目のチェック
if (
  !isset($_POST['contact_day']) || $_POST['contact_day'] === '' ||
  !isset($_POST['contact_person']) || $_POST['contact_person'] === '' ||
  !isset($_POST['company_id']) || $_POST['company_id'] === '' ||
  !isset($_POST['company']) || $_POST['company'] === '' ||
  !isset($_POST['customer_person']) || $_POST['customer_person'] === '' ||
  !isset($_POST['contact']) || $_POST['contact'] === '' ||
  !isset($_POST['id']) || $_POST['id'] === ''
) {
  exit('paramError');
}

$contact_day= $_POST['contact_day'];
$contact_person = $_POST['contact_person'];
$company_id = $_POST['company_id'];
$company = $_POST['company'];
$customer_person = $_POST['customer_person'];
$contact = $_POST['contact'];
$id = $_POST['id'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE contact_table SET contact_day=:contact_day, contact_person=:contact_person, company_id=:company_id, company=:company, customer_person=:customer_person, contact=:contact,created_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':contact_day', $contact_day, PDO::PARAM_STR);
$stmt->bindValue(':contact_person', $contact_person, PDO::PARAM_STR);
$stmt->bindValue(':company_id', $company_id, PDO::PARAM_STR);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);
$stmt->bindValue(':customer_person', $customer_person, PDO::PARAM_STR);
$stmt->bindValue(':contact', $contact, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:todo_read.php');
exit();