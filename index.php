<?php include("admin/include/connect_db.php");
$i = 0;
$result_indexh = mysqli_query($conn, "SELECT * FROM indexh ORDER BY id asc ") or die(mysqli_error());
$result_indexu = mysqli_query($conn, "SELECT * FROM indexu ORDER BY id asc ") or die(mysqli_error());
$result_product = mysqli_query($conn, "SELECT * FROM product ORDER BY id asc ") or die(mysqli_error());
?>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9.0.5/swiper-bundle.min.css" integrity="sha256-X/I4f+GJaSu0LvHV2pCGrcnEZt8PtzDJXU5pWf8rv2A=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/swiper.bundle.min.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/responsive1.css">
  <link rel="stylesheet" href="css/swiper.css">
  <link rel="stylesheet" href="css/slick.css">
</head>

<body class="b1">
  <?php include("menu.php");
  ?>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php while ($row_indexh = mysqli_fetch_array($result_indexh)) { ?>
        <div class="carousel-item <?php if ($i == 0) { ?>active<?php } ?>">
          <img src="img/cover/<?php echo $row_indexh['img']; ?>" class="d-block w-100 ">
        </div>
      <?php $i++;
      } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container con3">
    <div class="row">
      <div class="bg">
        <div class="row">
          <?php while ($row_indexu = mysqli_fetch_array($result_indexu)) { ?>
            <div class="col-xl-1"></div>
            <div class="col-xl-5 p-0 ">
              <div class="ph c20">
                <p class="p9">ยินดีต้อนรับ</p>
                <div class="p10 ">
                  <p><?php echo $row_indexu['indexu_name']; ?></p>
                </div>
                <div class="p13">
                  <p><?php echo $row_indexu['indexu_detail']; ?></p>
                </div>
                <button class="contact" valign="bottom">CONTACT US</button>
              </div>
            </div>
            <div class="col-xl-3 p-0">
              <div class="imger">
                <img class="img3" src="img/detail/<?php echo $row_indexu['indexu_img1']; ?>" width="100%">
                <img class="img4" src="img/detail/<?php echo $row_indexu['indexu_img2']; ?>" width="100%">
              </div>
            </div>
            <div class="col-xl-3"></div>
          <?php
          } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col c8">
    <img class="img5" src="images/06.png">
  </div>
  <div class="div1">
    <p class="p14">พันธุ์ข้าวที่เราเลือกได้และคัดสันเป็นอย่างดีเพื่อให้คุณสนใจสอบถามได้ที่เบอร์ <span style="color:#3DE4BD;font-weight:bold">(+66) 53771418-9</span></p>
  </div>
  </div>
  <div class="slide-container swiper">
    <div class="slide-content">
      <div class="card-wrapper swiper-wrapper">
        <?php while ($row_product = mysqli_fetch_array($result_product)) { ?>
          <div class="card swiper-slide">
            <div class="image-content">
              <a href="product_detail4.php?id=<?php echo $row_product['id']; ?>"><img class="img26" src="img/product/<?php echo $row_product['product_img']; ?>" width="100%"></a>
            </div>
            <div class="card-content">
              <div class="p49">
                <p><?php echo $row_product['product_name']; ?></p>
              </div>
              <div class="p50">
                <p><?php echo $row_product['product_detail']; ?></p>
              </div>
            </div>
          </div>
        <?php $i++;
        } ?>
      </div>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
  </div>
  <?php include("footer.php"); ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script src="js/slick.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

</html>