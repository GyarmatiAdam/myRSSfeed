<?php

require_once 'RESTful.php';
//Serri Jokes JSON
$ch = 'http://api.serri.codefactory.live/random/';
$resp_orders = curl_get($ch); 
$jd_orders = json_decode($resp_orders);

//BBC news XML
$urlbbc = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$responsebbc = curl_get($urlbbc);
$xmlbbc = simplexml_load_string($responsebbc);

//CNN news XML
$urlcnn = 'http://rss.cnn.com/rss/cnn_freevideo.rss';
$responsecnn = curl_get($urlcnn);
$xmlcnn = simplexml_load_string($responsecnn);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>RSS news</title>
  </head>
  <body style="margin-top: 4rem; margin-bottom: 4rem">
  <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h3>Start Your day with an amazing Serri Joke:</h3>
              <marquee>
              <?php
              echo $jd_orders->joke;
              ?>
              </marquee>
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm-1">

            </div>
            <div class="text-justify col-sm-5">
            <h2>BBC news:</h2>
            <?php
            foreach ($xmlbbc->channel->item as $item) {
            echo '<a href="'.$item->link.'"target="_blank">'.$item->title.'</a><br><br>';
            }
            ?>
            </div>
            <div class="col-sm-5">
            <h2>CNN news:</h2>
            <?php
            foreach ($xmlcnn->channel->item as $item) {
            echo '<a href="'.$item->link.'"target="_blank">'.$item->title.'</a><br><br>';
            }
            ?>
            </div>
            <div class="col-sm-1">

            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>