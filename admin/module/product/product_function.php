<?php
function product_add()
{
    include("include/connect_db.php");
    $result_product = mysqli_query($conn, "SELECT * FROM product ORDER BY id ASC") or die(mysqli_error());
    $row_product = mysqli_fetch_array($result_product);

    $product_name = empty($row_product['product_name']) ? "" : $row_product['product_name'];
    $product_detail = empty($row_product['product_detail']) ? "" : $row_product['product_detail'];
    $product_detail2 = empty($row_product['product_detail2']) ? "" : $row_product['product_detail2'];
?>
    <div class="row">
        <div class="col-lg-12">
            <form action="index.php?module=product&action=product_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพแรก(ขนาดรูปภาพ 370 x 363)</label>
                    <input class="form-control" name="product_img[]" type="file" id="product_img" accept="image/*">
                    <input type="hidden" class="form-control" name="img_aboutu" id="img_aboutu">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพสอง(ขนาดรูปภาพ 570 x 427)</label>
                    <input class="form-control" name="product_img2[]" type="file" id="product_img2" accept="image/*">
                    <input type="hidden" class="form-control" name="img_aboutu2" id="img_aboutu2">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ชื่อสินค้า</label>
                    <input type="text" class="form-control" name="product_name" id="product_name">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="product_detail" id="textshow"></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดเพิ่มเติม</label>
                    <textarea class="form-control" name="product_detail2" id="textshow"></textarea>
                    <button type="submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>

<?php
} ?>

<?php
function product_upload()
{

    include("include/connect_db.php");
    $resule_product = mysqli_query($conn, "SELECT * FROM product") or die(mysqli_error());
    $row_product = mysqli_fetch_array($resule_product);
    $num = mysqli_num_rows($resule_product);

    if (!empty($_FILES['product_img']['name'][0])) {
        $ext = strtolower(pathinfo($_FILES['product_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
        $gallary_tmp = $_FILES['product_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/product/$gallary");
        }
    } else {
        $update_gallary = "";
    }

    if (!empty($_FILES['product_img2']['name'][0])) {
        $ext2 = strtolower(pathinfo($_FILES['product_img2']['name'][0], PATHINFO_EXTENSION));
        @$gallary2 = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext2));
        $gallary_tmp2 = $_FILES['product_img2']['tmp_name'][0];
    } else {
        $gallary2 = "";
    }

    if ($gallary2) {
        $update_gallary2 = "$gallary2";
        if (!empty($update_gallary2)) {
            @copy($gallary_tmp2, "../img/product/$gallary2");
        }
    } else {
        $update_gallary2 = "";
    }


    $sql1 = "INSERT INTO product values('','" . $update_gallary . "','" . $update_gallary2 . "','" . mysqli_real_escape_string($conn, $_POST["product_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["product_detail"]) . "','" . mysqli_real_escape_string($conn, $_POST["product_detail2"]) . "')";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=product&action=product_show';</script>";
} ?>

<?php
function product_show()
{
    include("include/connect_db.php");
?>
    <?php
    $i = 1;
    $result_product = mysqli_query($conn, "SELECT * FROM product ORDER BY id asc ") or die(mysqli_error());
    $rows = mysqli_num_rows($result_product);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=product&action=product_add"> <button type="submit" name="submit" value="save" id="submit" class="btn add">เพิ่มข้อมูล</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รูปแรก</th>
                            <th scope="col">รูปสอง</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">รายละเอียดเพิ่มเติม</th>
                            <th scope="col">แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result_product)) { ?>
                            <tr>
                                <td scope="col" class="thshow"><?php echo $i; ?></td>
                                <td class="thshow"><img src="../img/product/<?php echo $row['product_img']; ?> " width="100"></td>
                                <td class="thshow"><img src="../img/product/<?php echo $row['product_img2']; ?> " width="100"></td>
                                <td class="thshow"><?php echo  $row['product_name']; ?></td>
                                <td class="thshow"><?php echo  $row['product_detail']; ?></td>
                                <td class="thshow"><?php echo  $row['product_detail2']; ?></td>
                                <td class="thshow">
                                    <a href="index.php?module=product&action=product_edit&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn edit">แก้ไขข้อมูล</button>
                                        <a href="index.php?module=product&action=product_delete&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบข้อมูล</button>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php
} ?>

    <?php
    function product_edit()
    {
        include("include/connect_db.php");

        $result_product = mysqli_query($conn, "SELECT * FROM product WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_product = mysqli_fetch_array($result_product);

    ?>
        <form action="index.php?module=product&action=product_update" method="post" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value=" <?php echo $row_product['id']; ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <a class="info sample" data-lighter='../img/product/<?php echo $row_product['product_img']; ?>' href='../img/product/<?php echo $row_product['product_img']; ?>'><img class="img-responsive" src="../img/product/<?php echo $row_product['product_img']; ?>" alt="" width="20%"></a>
                        <input type="hidden" name="img_product" id="img_product" value="<?php echo $row_product['product_img']; ?>">
                    </div>
                    <div class="mb-3 cardmb">
                        <label for="formFile" class="form-label">รูปภาพแรก(ขนาดรูปภาพ 370 x 363)</label>
                        <input class="form-control" name="product_img[]" type="file" id="product_img">
                    </div>
                    <div class="form-group">
                        <a class="info sample" data-lighter='../img/product/<?php echo $row_product['product_img2']; ?>' href='../img/product/<?php echo $row_product['product_img2']; ?>'><img class="img-responsive" src="../img/product/<?php echo $row_product['product_img2']; ?>" alt="" width="20%"></a>
                        <input type="hidden" name="img_product2" id="img_product2" value="<?php echo $row_product['product_img2']; ?>">
                    </div>
                    <div class="mb-3 cardmb">
                        <label for="formFile" class="form-label">รูปภาพสอง(ขนาดรูปภาพ 570 x 427)</label>
                        <input class="form-control" name="product_img2[]" type="file" id="product_img2">
                    </div>
                    <div class="mb-3 cardmb">
                        <label for="exampleFormControlTextarea1" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $row_product['product_name']; ?>">
                    </div>
                    <div class="mb-3 cardmb">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" name="product_detail" id="textshow"><?php echo $row_product['product_detail']; ?></textarea>
                    </div>
                    <div class="mb-3 cardmb">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดเพิ่มเติม</label>
                        <textarea class="form-control" name="product_detail2" id="textshow"><?php echo $row_product['product_detail2']; ?></textarea>
                    </div>
                    <div class="mb-3 cardmb">
                        <button type=" submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
    } ?>

<?php
function product_update()
{
    include("include/connect_db.php");
?>
    <?php
    if (!empty($_FILES['product_img']['name'][0])) {
        $ext1 = strtolower(pathinfo($_FILES['product_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext1));
        $gallary_tmp = $_FILES['product_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/product/$gallary");
        }
    } else {
        $update_gallary = "";
    }



    if (!empty($_FILES['product_img2']['name'][0])) {
        $ext2 = strtolower(pathinfo($_FILES['product_img2']['name'][0], PATHINFO_EXTENSION));
        @$gallary2 = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext2));
        $gallary_tmp2 = $_FILES['product_img2']['tmp_name'][0];
    } else {
        $gallary2 = "";
    }

    if ($gallary2) {
        $update_gallary2 = "$gallary2";
        if (!empty($update_gallary2)) {
            @copy($gallary_tmp2, "../img/product/$gallary2");
        }
    } else {
        $update_gallary2 = "";
    }

    if (!empty($update_gallary)) {
        $resule_delete = mysqli_query($conn, "SELECT product_img FROM product WHERE id='$_POST[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/product/$row_delete[product_img]");
    } else {
        $update_gallary = $_POST['img_product'];
    }

    if (!empty($update_gallary2)) {
        $resule_delete2 = mysqli_query($conn, "SELECT product_img2 FROM product WHERE id='$_POST[id]'") or die(mysqli_error());
        $row_delete2 = mysqli_fetch_array($resule_delete2);
        @unlink("../img/product/$row_delete2[product_img2]");
    } else {
        $update_gallary2 = $_POST['img_product2'];
    }

    $sql1 = "UPDATE product SET product_img ='" . $update_gallary . "',product_img2 ='" . $update_gallary2 . "',product_name='" . mysqli_real_escape_string($conn, $_POST["product_name"]) . "',product_detail='" . mysqli_real_escape_string($conn, $_POST["product_detail"]) . "',product_detail2='" . mysqli_real_escape_string($conn, $_POST["product_detail2"]) . "'WHERE id ='" . $_POST["id"] . "'";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'),window.location='index.php?module=product&action=product_show'</script>"; ?>

<?php
} ?>

<?php
function product_delete()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT product_img FROM product WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/product/$row_delete[product_img]");

        $resule_delete = mysqli_query($conn, "SELECT product_img2 FROM product WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/product/$row_delete[product_img2]");

        $sql = "DELETE FROM product WHERE id ='$_GET[id]'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อย'),window.location='index.php?module=product&action=product_show'</script>";
    }

    ?>

<?php
} ?>

