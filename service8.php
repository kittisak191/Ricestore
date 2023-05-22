<?php include("admin/include/connect_db.php");
$i = 0;
$result_service = mysqli_query($conn, "SELECT * FROM service ORDER BY id asc ") or die(mysqli_error());
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
    <p class="p247">หน้าแรก<span> <i class=" bi-chevron-right"></i> </span><span style="color:#17C6AA;">บทความ</span></p>
    <div class="container con10">
        <?php while ($row_serivce = mysqli_fetch_array($result_service)) { ?>
            <div class="col mb-30">
                <div class="col">
                    <div class="row r6">
                        <div class="col-12 col-xl-5 col-lg-5 col-md-5  p-0">
                            <img src="img/service/<?php echo $row_serivce['service_img']; ?>" width="100%">
                        </div>
                        <div class="col-12 col-xl-7 col-lg-7 col-md-7  c25">
                            <div >
                                <p class="p248"><?php echo $row_serivce['service_name']; ?></p>
                            </div>
                            <div class="c104"></div>
                            <div >
                                <p class="p249"><?php echo $row_serivce['service_detail']; ?></p>
                            </div>
                            <div class="p254">
                                <p class="p254"># ขายข้าวสาร ทั้งปลีกและส่ง</p>
                            </div>
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