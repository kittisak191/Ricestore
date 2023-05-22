<?php include("admin/include/connect_db.php");
$i = 0;
$result_food = mysqli_query($conn, "SELECT * FROM food ORDER BY id asc ") or die(mysqli_error());
$rows = mysqli_num_rows($result_food);
?>

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
  <p class="p141">หน้าแรก<span> <i class=" bi-chevron-right"></i> </span><span style="color:#17C6AA;">สินค้า</span></p>
  <div class="container con5">
    <div class="row">
      <?php while ($row_food = mysqli_fetch_array($result_food)) { ?>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 c116">
          <div class="snap">
            <div class="image">
              <a href="food_detail.php?id=<?php echo $row_food['id']; ?>"><img class="img26" src="img/food/<?php echo $row_food['food_img']; ?>" width="100%"></a>
            </div>
            <div class="d2">
              <div class="p142">
                <p><?php echo $row_food['food_name']; ?></p>
              </div>
              <div class="p143">
                <p><?php echo $row_food['food_detail']; ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php $i++;
      } ?>
    </div>
  </div>
  </div>
  <?php include("footer.php"); ?>
</body>

</html>