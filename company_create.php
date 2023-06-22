<?php
// POSTデータ確認
// var_dump($_POST);
// exit();

// company_create.php

if (
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['address']) || $_POST['address'] === '' ||
  !isset($_POST['tel']) || $_POST['tel'] === '' ||
) {
  exit('ParamError');
}

// company_create.php

$name = $_POST['name'];
$address = $_POST['address'];
$tel = $_POST['tel'];

// // // DB接続
// // // todo_create.php

// // // 各種項目設定
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

// // 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．


// // SQL作成&実行
// // todo_create.php

// // SQL作成&実行
$sql = 'INSERT INTO company (id, name, address, tel,) VALUES (NULL, :name, :address, :tel,)';
$stmt = $pdo->prepare($sql);

// // バインド変数を設定
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

