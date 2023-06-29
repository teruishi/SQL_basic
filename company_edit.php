<?php

// id受け取り
include("functions.php");

$id = $_GET['id'];

$pdo = connect_to_db();


// DB接続
$sql = 'SELECT * FROM company WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

// SQL実行


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>取引先企業一覧（編集画面）</title>
</head>

<body>
  <form action="company_update.php" method="POST">
    <fieldset>
      <legend>D取引先企業一覧（編集画面）</legend>
      <a href="company_read.php">一覧画面</a>
      <div>
        name: <input type="text" name="name" value="<?= $record['name'] ?>">
      </div>
      <div>
        address: <input type="text" name="address"value="<?= $record['address'] ?>">
      </div>
      <div>
        tel: <input type="text" name="tel"value="<?= $record['tel'] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>