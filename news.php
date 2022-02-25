<?php include("./head_front-end.php"); ?>
<link rel="stylesheet" href="./assets/css/index.css" media="screen">
</head>
<body class="u-body u-xl-mode">
  <?php include("./header.php"); ?>

  <?php include("./image.php"); ?>
  <section class="u-clearfix u-section-2" id="sec-8eba">
    <div class="u-clearfix u-sheet u-sheet-1">
      <br><br><br><br>
      <p class="u-custom-font u-text u-text-default u-text-1">
        ข่าวประชาสัมพันธ์
      </p>
      <?php 
      $urlArticles = file_get_contents("https://newsapi.org/v2/top-headlines?country=th&category=business&apiKey=3461dc1511a846acabc1244c88ad97da");

      $urlArticlesArray = json_decode($urlArticles, true);

      $articles = $urlArticlesArray['articles'];

      for ($i = 0; $i < count($articles); $i++) {
        $sites = $urlArticlesArray['articles'][$i];

        echo '<div class="col-sm-12">
          <br>
          <div class="card">
            <img class="card-img-top" src="'.$sites['urlToImage'].'" width="530" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">'.$sites['title'].'</h5>
              <p class="card-text">'.$sites['description'].'</p>
              <div class="parent">
                <div class="child1">
                  <p class="card-text">
                    <small class="text-muted">'.$sites['source']['name'].'</small>
                  </p>
                </div>
                <div class="child2">
                  <p class="card-text">
                    <small class="text-muted">'.$sites['publishedAt'].'</small>
                  </p>
                  <a href="'.$sites['url'].'" target="_blank" class="btn btn-primary">อ่านต่อ</a>
                </div>
              </div>
            </div>
          </div>
        </div>';
      }
      ?>
    </div>
  </section>

  <?php include("./footer_front-end.php"); ?>