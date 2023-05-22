<?php include("admin/include/connect_db.php");
$i = 0;
$result_product = mysqli_query($conn, "SELECT * FROM product ORDER BY id asc ") or die(mysqli_error());
$rows = mysqli_num_rows($result_product);
?>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body class="b1">
  <?php include("menu.php"); ?>
  <p class="p73">หน้าแรก<span> <i class=" bi-chevron-right"></i> </span><span style="color:#17C6AA;">สินค้า</span></p>
  <div class="container con5">
    <div class="row">
      <?php while ($row_product = mysqli_fetch_array($result_product)) { ?>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 c116">
          <div class="snap">
            <div class="image">
              <a href="product_detail4.php?id=<?php echo $row_product['id']; ?>"><img class="img26" src="img/product/<?php echo $row_product['product_img']; ?>" width="100%"></a>
            </div>
            <div class="d2">
              <div class="p49">
                <p><?php echo $row_product['product_name']; ?></p>
              </div>
              <div class="p50">
                <p><?php echo $row_product['product_detail']; ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php
      } ?>
    </div>
  </div>
  </div>

  <?php include("footer.php"); ?>
</body>

</html>