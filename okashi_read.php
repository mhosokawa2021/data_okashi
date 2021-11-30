<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"
  integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg=="
  crossorigin="anonymous"></script>
<script
  src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@next/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>アンケート結果</title>
</head>
<body>
<div class="container border rounded bg-white text-dark maxWidth2">
<div style="width:400px; margin: 0 auto;
    margin-bottom: 50px;">
  <canvas id="mychart-radar"></canvas>
</div>
    <?php
    // ファイルを変数に格納
    $filename = 'data/data_okashi.txt';
    // fopenでファイルを開く（'r'は読み込みモードで開く）
    $fp = fopen($filename, 'r');
    
    echo '<table class="result_table">';
    echo '<tr><th>日付</th><th>時間</th><th>id</th><th>商品名</th><th>メーカー</th><th>登録日</th><th>評価</th></tr>';

    $star_1 = 0;
    $star_2 = 0;
    $star_3 = 0;
    $star_4 = 0;
    $star_5 = 0;

    // whileで行末までループ処理
    while (!feof($fp)) {
        echo '<tr>';
        $txt = fgets($fp);
        // [,]区切りで分割
        $colors = explode(",", $txt);

            foreach($colors as $index => $value){
                print_r('<td>'.$value.'</td>');
                if($index == 6){
                    if($value == 1){
                        $star_1++;
                    }else if($value == 2){
                        $star_2++;
                    }else if($value == 3){
                        $star_3++;
                    }else if($value == 4){
                        $star_4++;
                    }else if($value == 5){
                        $star_5++;
                    }
                }
            }
        
        echo '</tr>';
    }
    echo '</table>';
    
    // fcloseでファイルを閉じる
    fclose($fp);

    ?>

<script>
var ctx = document.getElementById('mychart-radar');
var myChart = new Chart(ctx, {
  type: 'radar',
  data: {
    labels: ['★', '★★', '★★★', '★★★★', '★★★★★'],
    datasets: [{
      label: 'Product',
      data: [<?php echo $star_1; ?>, <?php echo $star_2; ?>, <?php echo $star_3; ?>, <?php echo $star_4; ?>, <?php echo $star_5; ?>],
      // データライン
      borderColor: 'green',
      borderWidth: 2,
    }],
  },
  options: {
    scales: {
      r: {
        // 最小値・最大値
        min: 1,
        max: 30,
        // 背景色
        backgroundColor: 'lightyellow',
        // グリッドライン
        grid: {
          color: 'lightseagreen',
        },
        // アングルライン
        angleLines: {
          color: 'brown',
        },
        // ポイントラベル
        pointLabels: {
          color: 'blue',
          backdropColor: '#ddf',
          backdropPadding: 5,
          padding: 20,
        },
      },
    },
  },
});
</script>
</div>
</body>
</html>