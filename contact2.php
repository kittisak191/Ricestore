<?php

    include("admin/include/connect_db.php");
    $resule_contact = mysqli_query($conn, "SELECT * FROM contact") or die(mysqli_error());
    $row_contact = mysqli_fetch_array($resule_contact);
    $num = mysqli_num_rows($resule_contact);

    $sql1 = "INSERT INTO contact values('','" . mysqli_real_escape_string($conn, $_POST["contact_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_email"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_phone"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_text"]) . "','" . date("Y-m-d H:i:s") . "')";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='contact9.php';</script>";
    ?>