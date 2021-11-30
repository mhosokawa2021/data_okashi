<?php

//文字作成
$str = date("Y-m-d,H:i:s");

$str .= ",".$_POST["id"];
$str .= ",".$_POST["name"];
$str .= ",".$_POST["maker"];
$str .= ",".$_POST["regist"];
$str .= ",".$_POST["star"];

// テキストデータをエクスプロードで分割する。

//File書き込み
$file = fopen("data/data_okashi.txt","a");	// ファイル読み込み
fwrite($file, $str."\r\n");
fclose($file);

// \n
// mac

// \r\n
// win

// \ バックスラッシュは
// option + ¥

?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container border rounded bg-white text-dark">
<?php
echo 'id:'.$_POST["id"];
echo '<br>';
echo 'name:'.$_POST["name"];
echo '<br>';
echo 'maker:'.$_POST["maker"];
echo '<br>';
echo 'regist:'.$_POST["regist"];
echo '<br>';
echo '評価：'.$_POST["star"];
?>

<h1>以上の内容で書き込みしました。</h1>

<ul>
    <li><a href="okashi_read.php">結果を見る</a></li>
<li><a href="okashi_search.php">戻る</a></li>
</ul>
</div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>