<?php
// データ受け取り
// var_dump($_POST);
// exit();
 session_start();
 include('functions.php');

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = connect_to_db();

// username，password，deleted_atの3項目全ての条件満たすデータを抽出する．
$sql = 'SELECT * FROM users_table WHERE username=:username AND password=:password';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


// DB接続


// SQL実行


// ユーザ有無で条件分岐
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=company_login.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $user['is_admin'];
  $_SESSION['username'] = $user['username'];
  header("Location:todo_read.php");
  exit();
}

