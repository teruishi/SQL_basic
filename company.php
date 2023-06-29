<?php
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

// id の値を取得する
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

$contact_table = $pdo->prepare('SELECT * FROM contact_table WHERE id=?'); 
$contact_table->execute(array($_REQUEST['id']));
$contact = $contact_table->fetch();
?>

<article>
  <?php echo isset($contact['contact']) ? $contact['contact'] : ''; ?></pre>
  <!-- <a href="company_read.php">戻る</a> -->
</article>