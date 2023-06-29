<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>取引先企業登録（入力画面）</title>
</head>

<body>
  <form action="company_create.php" method="POST">
    <fieldset>
      <legend>取引先企業登録（入力画面）</legend>
      <a href="company_read.php">一覧画面</a>
      <div>
        会社名: <input type="text" name="name">
      </div>
      <div>
        住所: <input type="text" name="address">
      </div>
      <div>
        電話番号: <input type="text" name="tel">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
  

</body>

</html>