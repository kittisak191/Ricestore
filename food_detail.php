<?php include("admin/include/connect_db.php");
$result_food = mysqli_query($conn, "SELECT * FROM food WHERE id='$_GET[id]'") or die(mysqli_error());
$row_food = mysqli_fetch_array($result_food);
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
    <p class="p109">หน้าแรก<span> <i class=" bi-chevron-right"></i> </span><span style="color:#17C6AA;">สินค้า</span></p>

    <div class="container con6">
        <div class="row ">
            <div class="col-12 col-md-6 ">
                <div class="">
                    <img class="img11" src="img/food/<?php echo $row_food['food_img']; ?>" width="100%">
                </div>
            </div>
            <div class="col-12 col-md-6  c21">
                <div class="">
                    <div class="p324">
                        <p><?php echo $row_food['food_name']; ?></p>
                    </div>
                    <p class="p325">รายละเอียด</p>
                    <div class="p326">
                        <p><?php echo $row_food['food_detail']; ?></p>
                    </div>
                    <button href="#" class="p327">สั่งซื้อสินค้า</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>