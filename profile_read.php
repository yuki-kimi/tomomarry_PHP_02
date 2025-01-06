<?php

// DB接続

$dbn ='mysql:dbname=profile_php_db;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'SELECT * FROM profile_table';

$stmt = $pdo->prepare($sql);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// // 都道府県番号と名前のマッピング


// $prefectures = array(); 

// $prefectures = [
// 0 => "未設定",
// 1 => "北海道",
// 2 => "青森県",
// 3 => "岩手県",
// 4 => "宮城県",
// 5 => "秋田県",
// 6 => "山形県",
// 7 => "福島県",
// 8 => "茨城県",
// 9 => "栃木県",
// 10 => "群馬県",
// 11 => "埼玉県",
// 12 => "千葉県",
// 13 => "東京都",
// 14 => "神奈川県",
// 15 => "新潟県",
// 16 => "富山県",    
// 17 => "石川県",
// 18 => "福井県",
// 19 => "山梨県",
// 20 => "長野県",
// 21 => "岐阜県",
// 22 => "静岡県",
// 23 => "愛知県",
// 24 => "三重県",
// 25 => "滋賀県",
// 26 => "京都府",
// 27 => "大阪府",
// 28 => "兵庫県",
// 29 => "奈良県",
// 30 => "和歌山県",
// 31 => "鳥取県",
// 32 => "島根県",
// 33 => "岡山県",
// 34 => "広島県",
// 35 => "山口県",
// 36 => "徳島県",
// 37 => "香川県",
// 38 => "愛媛県",
// 39 => "高知県",   
// 40 => "福岡県",
// 41 => "佐賀県",
// 42 => "長崎県",
// 43 => "熊本県",
// 44 => "大分県",
// 45 => "宮崎県",
// 46 => "鹿児島県",
// 47 => "沖縄県"
// ];

// // residence番号から都道府県名を取得
// $residence = $prefectures[$residence];

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result[birthdate]);

$output = "";
foreach ($result as $record) {
  //取得した画像バイナリデータをbase64で変換!!!
  $img = "data:image/jpeg;base64," . base64_encode($record["profile_photo"]);
  // var_dump($img);
  // exit();

  
  $output .= "
      <div class = card>
        <div><img src='$img' alt='' class=profile_img></div>
        <div>{$record["age"]}歳</div>
        <div>{$record["residence"]}</div>
        <div>{$record["comment"]}</div>
      </div>
  ";

}



?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>プロフィール（入力画面）</title>
</head>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>さがす（一覧画面）</title>
</head>

<header>
    <nav>
      <ul>
        <li><a href="profile_read.php"><img src="img/サーチアイコン.png" alt="さがす"/></a></li>
        <li><img src="img/いいねアイコン.png" alt="いいね"/></li>
        <li><img src="img/コメントアイコン7.png" alt="コメント"/></li>
        <li><a href="index.php"><img src="img/履歴書アイコン6.png" alt="プロフィール入力"></a></li>
      </ul>
    </nav>
</header>



<body>
    <div class=profile_card_area>
        <?= $output ?>
    </div>
</body>

<style>
  body{
    margin-right: auto;
    margin-left: auto;
    padding:0;
    width: 700px;
    font-size: 13px;
    color: rgba(0,0, 0, 0.7);
    font-family: 'メイリオ', Meiryo, sans-serif;
    text-align:center;
}
header{
    background-color: #fff;
    border-bottom: 1px solid #ccc;
    text-align: center;
}

nav ul {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    padding: 5px;
    list-style-type: none;
    margin: 0;
}
nav ul li {
    display: inline-block;
}
nav ul li img {
    width: 40px;
    height: auto;
    object-fit: contain;
}

.profile_card_area {
  /* display: flex;
  flex-wrap: wrap; */
  display: grid; /* Gridレイアウトを使用 */
  grid-template-columns: 1fr 1fr; /* 2列にする */
  gap: 1%; /* カード間の隙間 */
  justify-content: center;
  margin-top: 1%;
}

/* プロフィールカードの作成 */
.card {
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color:white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex; /* 縦並びを可能に */
  flex-direction: column; /* 子要素を縦方向に並べる */
  align-items: center; /* 中央寄せ */
  padding: 1%; /* 余白を追加 */
  box-sizing: border-box; /* padding分を含めた高さに調整 */
  position: relative;
}

.profile_img {
    max-width: 100%
}

</style>

</html>