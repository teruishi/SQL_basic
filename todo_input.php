<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>顧客折衝履歴（入力画面）</title>
</head>

<body>
  <form action="todo_create.php" method="POST">
    <fieldset>
      <legend>顧客折衝履歴（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <div>
        訪問日: <input type="date" name="contact_day">
      </div>
      <div>
        当方面談者: <input type="text" name="contact_person">
      </div>
      <div>
        取引先番号: <input type="text" name="company_id">
      </div>
      <div>
        取引先名: <input type="text" name="company">
      </div>
      <div>
        先方面談者: <input type="text" name="customer_person">
      </div>
      <div>
        折衝内容: <textarea name="contact" id="" cols="30" rows="10"></textarea>
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>