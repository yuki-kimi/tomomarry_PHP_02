<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>プロフィール（入力画面）</title>
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
<form action="profile_create.php" method="POST"  enctype="multipart/form-data">
<fieldset>
      <legend>プロフィール（入力画面）</legend>
      <div>
          <label for="residence">住居地</label>
          <select data-js="submit" name="residence" id="residence">
            <option selected="selected"> <value="0">未設定</option>
            <option value="13">東京都</option>
            <option value="14">神奈川県</option> 
            <option value="11">埼玉県</option>
            <option value="12">千葉県</option>
            <option value="27">大阪府</option>
            <option value="26">京都府</option>
            <option value="23">愛知県</option>
            <option value="40">福岡県</option>
            <option value="28">兵庫県</option>
            <option value="8">茨城県</option>
            <option value="9">栃木県</option>
            <option value="1">北海道</option>
            <option value="2">青森県</option>
            <option value="3">岩手県</option>
            <option value="4">宮城県</option>
            <option value="5">秋田県</option>
            <option value="6">山形県</option>
            <option value="7">福島県</option>
            <option value="10">群馬県</option>
            <option value="15">新潟県</option>
            <option value="16">富山県</option>
            <option value="17">石川県</option>
            <option value="18">福井県</option>
            <option value="19">山梨県</option>
            <option value="20">長野県</option>
            <option value="21">岐阜県</option>
            <option value="22">静岡県</option>
            <option value="24">三重県</option>
            <option value="25">滋賀県</option>
            <option value="29">奈良県</option>
            <option value="30">和歌山県</option>
            <option value="31">鳥取県</option>
            <option value="32">島根県</option>
            <option value="33">岡山県</option>
            <option value="34">広島県</option>
            <option value="35">山口県</option>
            <option value="36">徳島県</option>
            <option value="37">香川県</option>
            <option value="38">愛媛県</option>
            <option value="39">高知県</option>
            <option value="41">佐賀県</option>
            <option value="42">長崎県</option>
            <option value="43">熊本県</option>
            <option value="44">大分県</option>
            <option value="45">宮崎県</option>
            <option value="46">鹿児島県</option>
            <option value="47">沖縄県</option>
          </select>
      </div>
      <div>
    <label for="birthdate">生年月日</label>
    <input type="date" id="birthdate" name="birthdate">
      </div>
      <div>
        画像を選択
        <input type="file" name="profile_photo" accept="image/*">
      </div>
      <div>
      一言<input type="text" name="comment">
      </div>
      </form>
      <div>
        <button>登録</button>
      </div>
    </fieldset>
  </form>

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

</style>
</body>
</html>