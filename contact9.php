<?php include("admin/include/connect_db.php");
$result_contact = mysqli_query($conn, "SELECT * FROM contact ORDER BY id asc ") or die(mysqli_error());
$result_contact_detail = mysqli_query($conn, "SELECT * FROM contact_detail ORDER BY id asc ") or die(mysqli_error());
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
    <p class="p291">หน้าแรก<span> <i class=" bi-chevron-right"></i> </span><span style="color:#17C6AA;">บทความ</span></p>
    <iframe class="if1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387194.06224132766!2d-74.30932583906731!3d40.697019291653994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2z4LiZ4LiE4Lij4LiZ4Li04Lin4Lii4Lit4Lij4LmM4LiBIOC4meC4tOC4p-C4ouC4reC4o-C5jOC4gSDguKrguKvguKPguLHguJDguK3guYDguKHguKPguLTguIHguLI!5e0!3m2!1sth!2sth!4v1670400680562!5m2!1sth!2sth" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="container con9">
        <div class="row r4">
            <div class="col-12 col-md-6 c30">
                <form action="contact2.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="">
                        <p class="p292">ส่งข้อความถึงเรา</p>
                        <p class="p293">ติดต่อเรากรุณากรอกข้อมูลให้ครบถ้วน</p>
                        <div class="p294">
                            <input class="w3-input" type="text" name="contact_name" id="contact_name" placeholder="ชื่อ - นามสกุล" style="border: none">
                        </div>
                        <br>
                        <div class="p295">
                            <input class="w3-input" type="email" name="contact_email" id="contact_email" placeholder="Example@hotmail.com" style="border: none">
                        </div>
                        <br>
                        <div class="p296">
                            <input class="w3-input" type="text" name="contact_phone" id="contact_phone" placeholder="เบอร์โทรศัพท์" style="border: none">
                        </div>
                        <br>
                        <div class="p297">
                            <input class="w3-input" type="text" name="contact_text" id="contact_text" placeholder="ข้อความ" style="border: none">
                        </div>
                        <br>
                        <div class="p298">
                            <button type="submit" name="submit" value="save" id="submit" class="btn btn-block message">ส่งข้อความ</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php while ($row_contact_detail = mysqli_fetch_array($result_contact_detail)) { ?>
                <div class="col-12 col-md-6 c31">
                    <div class="column">
                        <div class="row">
                            <img class="img22" src="images/24.png" width="100%">
                            <div class="col">
                                <p class="p299">โรงสีข้าว แม่จัน มุ่ยฮวดเส็ง</p>
                                <p class="p300"> <?php echo $row_contact_detail['contact_detail_name1']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <img class="img23" src="images/25.png" width="100%">
                            <div class="col">
                                <p class="p301">เบอร์โทรศัพท์</p>
                                <p class="p302"> <?php echo $row_contact_detail['contact_detail_name2']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <img class="img24" src="images/26.png" width="100%">
                            <div class="col c38">
                                <p class="p303">อีเมล</p>
                                <p class="p304"> <?php echo $row_contact_detail['contact_detail_name3']; ?></p>
                                <p class="p305"><?php echo $row_contact_detail['contact_detail_name4']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <img class="img25" src="images/27.png" width="100%">
                            <div class="col c40">
                                <p class="p306">เวลาทำการ</p>
                                <p class="p307"> <?php echo $row_contact_detail['contact_detail_name5']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>