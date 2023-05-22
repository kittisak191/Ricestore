<?php include("admin/include/connect_db.php");
$i = 0;
$result_abouth = mysqli_query($conn, "SELECT * FROM abouth ORDER BY id asc ") or die(mysqli_error());
$result_aboutu = mysqli_query($conn, "SELECT * FROM aboutu ORDER BY id asc ") or die(mysqli_error());
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
    <p class="p39">หน้าแรก<span> <i class=" bi-arrow-right"></i> </span><span>เกี่ยวกับเรา</span></p>
    <div class="container con4">
        <?php while ($row_abouth = mysqli_fetch_array($result_abouth)) { ?>
            <div class="row ">
                <div class="col-12 col-md-5">
                    <div class="ph ">
                        <p class=" p40">ยินดีต้อนรับ</p>
                        <p class=" p41"><?php echo $row_abouth['abouth_name']; ?></p>
                        <div class="c102"></div>
                        <p class="p42"><?php echo $row_abouth['abouth_detail1']; ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="ph">
                        <img class="img7" src="img/abouth/<?php echo $row_abouth['abouth_img']; ?>" width="100%">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-12">
                    <p class="p43"><?php echo $row_abouth['abouth_detail2']; ?></p>
                </div>
            </div>
        <?php
        } ?>
        <?php while ($row_aboutu = mysqli_fetch_array($result_aboutu)) { ?>
            <div class="row">
                <div class="col-12 col-md-7 ">
                    <img class="img8" src="img/aboutu/<?php echo $row_aboutu['aboutu_img']; ?>">
                </div>
                <div class="col-12 col-md-5 ">
                    <div class="ph">
                        <div class="p44">
                            <p><?php echo $row_aboutu['aboutu_name']; ?></p>
                        </div>
                        <p class="p45">มีบริการต่างๆ ONE STOP SERVICE</p>
                        <div class="c103"></div>
                        <div class="p46">
                            <p><?php echo $row_aboutu['aboutu_detail']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++;
        } ?>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>