<?php
// POSTデータ確認
// var_dump($_POST);
// exit();

// todo_create.php

if (
  !isset($_POST['contact_day']) || $_POST['contact_day'] === '' ||
  !isset($_POST['contact_person']) || $_POST['contact_person'] === '' ||
  !isset($_POST['company_id']) || $_POST['company_id'] === '' ||
  !isset($_POST['company']) || $_POST['company'] === '' ||
  !isset($_POST['customer_person']) || $_POST['customer_person'] === '' ||
  !isset($_POST['contact']) || $_POST['contact'] === ''
) {
  exit('ParamError');
}

// // todo_create.php

$contact_day = $_POST['contact_day'];
$contact_person = $_POST['contact_person'];
$company_id = $_POST['company_id'];
$company = $_POST['company'];
$customer_person= $_POST['customer_person'];
$contact = $_POST['contact'];

// // DB接続
// // todo_create.php

// // 各種項目設定
$dbn ='mysql:dbname=sfa_01;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// // DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．


// SQL作成&実行
// todo_create.php

// SQL作成&実行
$sql = 'INSERT INTO contact_table (id, contact_day, contact_person, company_id, company, customer_person,contact,created_at) VALUES (NULL, :contact_day, :contact_person, :company_id, :company, :customer_person, :contact, now())';
$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':contact_day', $contact_day, PDO::PARAM_STR);
$stmt->bindValue(':contact_person', $contact_person, PDO::PARAM_STR);
$stmt->bindValue(':company_id', $company_id, PDO::PARAM_STR);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);
$stmt->bindValue(':customer_person', $customer_person, PDO::PARAM_STR);
$stmt->bindValue(':contact', $contact, PDO::PARAM_STR);




// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

