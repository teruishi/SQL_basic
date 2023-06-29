<?php

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

$sql = 'SELECT * FROM company';
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
      <td>{$record["name"]}</td>
      <td>{$record["address"]}</td>
      <td>{$record["tel"]}</td>
      <td>
        <a href='company_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
        <a href='company_delete.php?id={$record["id"]}'>delete</a>
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
  <title>取引先企業一覧（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>取引先企業一覧（一覧画面）</legend>
    <a href="company_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>name</th>
          <th>address</th>
          <th>tel</th>
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