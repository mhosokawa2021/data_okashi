<html>
<head>
<meta charset="utf-8">
<title>お菓子検索</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="o_search">

<div class="container-fluid d-flex align-items-center justify-content-center h-50 d-inline-block maxWidth">
    <div class="container border rounded bg-white text-dark">
        <h1 class="mt-2">お菓子の検索</h1>
        <form action="okashi_search_result.php" method="post">
            <div class="form-group">
                <label for="okashi_search">検索したいお菓子のキーワードを入力してください。</label>
                <input type="text" name="search_word" class="form-control" id="okashi_search" aria-describedby="emailHelp" placeholder="お菓子の名前">
            </div>
                <button type="submit" class="btn btn-primary btn-block">検索</button>
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>