<?php include("admin/include/connect_db.php");
include("admin/include/function.php");
$i = 0;
$result_article = mysqli_query($conn, "SELECT * FROM article ORDER BY id asc ") or die(mysqli_error());
$rows = mysqli_num_rows($result_article);
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
    <p class="p328">หน้าแรก<span> <i class=" bi-chevron-right"></i> </span><span style="color:#17C6AA;">บทความ</span></p>
    <div class="container con7">
        <div class="row">
            <?php while ($row_article = mysqli_fetch_array($result_article)) { ?>
                <div class="col-12 col-lg-4 col-md-4 col-sm-12 mb-30 c119">
                    <div class="text-block t1">
                        <div class="p176">
                            <p><?php echo  DateThai($row_article['article_date']); ?></p>
                        </div>
                    </div>
                    <div class="img">
                        <img class="img14" src="img/article/<?php echo $row_article['article_img']; ?>" width="100%">
                    </div>
                    <div class="d3">
                        <div class="p177">
                            <p><?php echo $row_article['article_name']; ?></p>
                        </div>
                        <div class="p179">
                            <p><?php echo $row_article['article_detail']; ?></p>
                        </div>
                        <a href="article_detail7.php?id=<?php echo $row_article['id']; ?>"> <button class="Readmore">Read More <i class=" bi-arrow-right"></i></button></a>
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