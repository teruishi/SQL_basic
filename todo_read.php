<?php
include("functions.php");
session_start();
check_session_id();
// DB接続
// DB接続
// todo_create.php

// 各種項目設定
$dbn ='mysql:dbname=sfa_01;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// SQL作成&実行
// todo_read.php

// $sql = 'SELECT * FROM contact_table';
$sql = 'SELECT * FROM contact_table LEFT OUTER JOIN company ON  contact_table.company_id = company.id';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}



// todo_read.php

// SQL実行の処理
// todo_read.php

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);
// exit();

$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["contact_day"]}</td>
      <td>{$record["contact_person"]}</td>
      <td>{$record["company_id"]}</td>
      <td>{$record["company"]}</td>
      <td>{$record["address"]}</td>
      <td>{$record["customer_person"]}</td>
      <td>{$record["contact"]}</td>
      <td>
        <a href='todo_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
        <a href='todo_delete.php?id={$record["id"]}'>delete</a>
      </td>
    </tr>
  ";
}






?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>顧客折衝履歴（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>顧客折衝履歴（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <a href="company_logout.php">ログアウト</a>
    <table>
      <thead>
        <tr>
          <th>contact_day</th>
          <th>contact_person</th>
          <th>company_id</th>
          <th>company</th>
          <th>address</th>
          <th>customer_person</th>
          <th>contact</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
           <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>