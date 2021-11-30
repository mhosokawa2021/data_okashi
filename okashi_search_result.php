<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
    <title>検索結果</title>
</head>
<body>
<?php

    // 検索時の全角スペースを半角スペースに
    $str = mb_convert_kana($_POST["search_word"], 'as', 'UTF-8');

    $base_url = 'https://www.sysbird.jp/webapi/?';

    // $query = ['apikey'=>'guest','format'=>'json','keyword'=>$str];

    $query = ['apikey'=>'guest','format'=>'json','keyword'=>$str,'max'=>'100'];

    // var_dump($query);

    $response = file_get_contents(
                    $base_url.http_build_query($query)
                );
    // https://www.sysbird.jp/webapi/?apikey=guest&format=xml&keyword=???

    // 結果はjson形式で返されるので
    $result = json_decode($response,true);

    $max = count($result["item"]);
    echo '<h1>検索結果：'.$_POST["search_word"].'</h1>';
?>

<div class="okashi_result_box d-flex container">
<?php
echo '<div class="row">';
    for($i = 0; $i < $max; $i++){
                echo '<div class="card col-4 text-center pt-3">';
                echo '<img class="d-block mx-auto" src="'.$result["item"][$i]["image"].'">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$result["item"][$i]["name"].'</h5>';
                    echo '<p class="card-text">'.$result["item"][$i]["maker"].'</p>';
                    echo '<p class="card-text">'.$result["item"][$i]["regist"].'</p>';
                    echo '<button class="rev_button btn btn-primary"
                            data-id="'.$result["item"][$i]["id"].'"
                            data-name="'.$result["item"][$i]["name"].'"
                            data-maker="'.$result["item"][$i]["maker"].'"
                            data-regist="'.$result["item"][$i]["regist"].'">
                            レビューを書く</button>';
                    echo '</div>';
                echo '</div>';
    }
echo '</div>';
?>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">お菓子のレビューを入力する</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
        <form action="okashi_write.php" method="post">
        <div class="form-group">
        <div class="mb-3">
            <label for="id" class="form-label">お菓子のid</label>
            <input type="text" class="form-control" name="id" id="id">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">お菓子の名前</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="maker" class="form-label">製造元</label>
            <input type="text" class="form-control" name="maker" id="maker">
        </div>
        <div class="mb-3">
            <label for="regist" class="form-label">登録日</label>
            <input type="text" class="form-control" name="regist" id="regist">
        </div>
        <label for="star-select">おすすめ度</label>
        <select name="star" id="star-select" class="form-select form-control" aria-label="Default select example">
            <option selected>評価を入力してください</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">送信</button>
            </div>
        </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
<script>
    console.log("テスト");
    $(document).on("click",".rev_button",function(){
        console.log("buttonがクリックされました。");

        // フォームに値を設定
        $('#id').val($(this).data('id')).attr('readonly',true);
        $('#name').val($(this).data('name')).attr('readonly',true);
        $('#maker').val($(this).data('maker')).attr('readonly',true);
        $('#regist').val($(this).data('regist')).attr('readonly',true);

        $('#exampleModal').modal('show');

    });
</script>
</body>
</html>

