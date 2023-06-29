<?php

// id受け取り
include("functions.php");

$id = $_GET['id'];

$pdo = connect_to_db();


// DB接続
$sql = 'SELECT * FROM contact_table WHERE id=:id';
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
  <form action="todo_update.php" method="POST">
    <fieldset>
      <legend>取引先企業一覧（編集画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <div>
        name: <input type="date" name="contact_day" value="<?= $record['contact_day'] ?>">
      </div>
      <div>
        address: <input type="text" name="contact_person"value="<?= $record['contact_person'] ?>">
      </div>
      <div>
        tel: <input type="text" name="company_id"value="<?= $record['company_id'] ?>">
      </div>
      <div>
        tel: <input type="text" name="company"value="<?= $record['company'] ?>">
      </div>
      <div>
        tel: <input type="text" name="customer_person"value="<?= $record['customer_person'] ?>">
      </div>
      <div>
        tel: <input type="text" name="contact"value="<?= $record['contact'] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>