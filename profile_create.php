<?php
// POSTデータ確認
if(!isset($_POST['birthdate']) || $_POST['birthdate'] === '' ||
   !isset($_POST['residence']) || $_POST['residence'] === '' ||
   !isset($_POST['comment']) || $_POST['comment'] === '' ||
   !isset($_FILES['profile_photo']) || $_FILES['profile_photo']['error'] === ''
   // ファイルアップロードのエラーコードを確認
  //  !isset($_FILES['profile_photo']) || $_FILES['profile_photo'] === ''
   ) {
    exit('データがありません');
}
// var_dump($_FILES);
// exit();



$birthdate = $_POST['birthdate'];
// var_dump($birthdate);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // ユーザーから送信された生年月日を取得
  $dob = $_POST['birthdate'];
  
  // 生年月日をDateTimeオブジェクトに変換
  $birthDate = new DateTime($dob);
  
  // 現在の日付を取得
  $currentDate = new DateTime();
  
  // 年齢を計算
  $age = $currentDate->diff($birthDate)->y. "歳";
}

$residence = $_POST['residence'];
$comment = $_POST['comment'];
$profile_photo = $_FILES['profile_photo'];



// DB接続
// 各種項目設定
$dbn ='mysql:dbname=profile_php_db;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
} else {
    if (!empty($_FILES['profile_photo']['name'])) {
    //['profile_photo']['tmp_name']は画像のパス
        $content = file_get_contents($_FILES['profile_photo']['tmp_name']);
        // 画像を保存
        // SQL作成&実行
        $sql = 'INSERT INTO profile_table (id, birthdate, age, residence, comment, profile_photo ) VALUES (NULL, :birthdate, :age, :residence, :comment, :profile_photo)';
        $stmt = $pdo->prepare($sql);

        // バインド変数を設定
        $stmt->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $stmt->bindValue(':age', $age, PDO::PARAM_STR);
        $stmt->bindValue(':residence', $residence, PDO::PARAM_STR);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        // $stmt->bindValue(':profile_photo', $profile_photo, PDO::PARAM_STR);
        $stmt->bindValue(':profile_photo', file_get_contents($_FILES['profile_photo']['tmp_name']), PDO::PARAM_LOB);
    }}


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


// SQL実行の処理

header('Location:index.php');
exit();


