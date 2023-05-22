<?php
function article_add()
{
    include("include/connect_db.php");
    $result_article = mysqli_query($conn, "SELECT * FROM article ORDER BY id ASC") or die(mysqli_error());
    $row_article = mysqli_fetch_array($result_article);

    $article_date = empty($row_article['article_date']) ? "" : $row_article['article_date'];
    $article_name = empty($row_article['article_name']) ? "" : $row_article['article_name'];
    $article_detail = empty($row_article['article_detail']) ? "" : $row_article['article_detail'];
    $article_text = empty($row_article['article_text']) ? "" : $row_article['article_text'];
?>
    <div class="row">
        <div class="col-lg-12">
            <form action="index.php?module=article&action=article_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพแรก(ขนาดรูปภาพ 369 x 252)</label>
                    <input class="form-control" name="article_img[]" type="file" id="article_img" accept="image/*">
                    <input type="hidden" class="form-control" name="img_article" id="img_article">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">วันที่</label>
                    <input type="date" class="form-control" name="article_date" id="article_date" placeholder="2000-10-01">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="article_name" id="article_name">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดหน้าแรก</label>
                    <textarea class="form-control" name="article_detail" id="textshow"></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพสอง(ขนาดรูปภาพ 1169 x 694)</label>
                    <input class="form-control" name="article_img2[]" type="file" id="article_img2" accept="image/*">
                    <input type="hidden" class="form-control" name="img_article2" id="img_article2">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดหน้าสอง</label>
                    <textarea class="form-control" name="article_detail2" id="textshow"></textarea>
                    <button type="submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>

<?php
} ?>

<?php
function article_upload()
{
    include("include/connect_db.php");
    $resule_article = mysqli_query($conn, "SELECT * FROM article") or die(mysqli_error());
    $row_article = mysqli_fetch_array($resule_article);
    $num = mysqli_num_rows($resule_article);

    if (!empty($_FILES['article_img']['name'][0])) {
        $ext = strtolower(pathinfo($_FILES['article_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
        $gallary_tmp = $_FILES['article_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/article/$gallary");
        }
    } else {
        $update_gallary = "";
    }
    if (!empty($_FILES['article_img2']['name'][0])) {
        $ext2 = strtolower(pathinfo($_FILES['article_img2']['name'][0], PATHINFO_EXTENSION));
        @$gallary2 = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext2));
        $gallary_tmp2 = $_FILES['article_img2']['tmp_name'][0];
    } else {
        $gallary2 = "";
    }

    if ($gallary2) {
        $update_gallary2 = "$gallary2";
        if (!empty($update_gallary2)) {
            @copy($gallary_tmp2, "../img/article/$gallary2");
        }
    } else {
        $update_gallary2 = "";
    }


    $sql1 = "INSERT INTO article values('','" . $update_gallary . "','" . mysqli_real_escape_string($conn, $_POST["article_date"]) . "','" . mysqli_real_escape_string($conn, $_POST["article_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["article_detail"]) . "','" . $update_gallary2 . "','" . mysqli_real_escape_string($conn, $_POST["article_detail2"]) . "')";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=article&action=article_show';</script>";
} ?>

<?php
function article_show()
{
    include("include/connect_db.php");
?>
    <?php
    $i = 1;
    $result_article = mysqli_query($conn, "SELECT * FROM article ORDER BY id asc ") or die(mysqli_error());
    $rows = mysqli_num_rows($result_article);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=article&action=article_add"> <button type="submit" name="submit" value="save" id="submit" class="btn add">เพิ่มข้อมูล</button></a>
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
                            <th scope="col">วันที่</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result_article)) { ?>
                            <tr>
                                <td scope="col" class="thshow"><?php echo $i; ?></td>
                                <td class="thshow"><img src="../img/article/<?php echo $row['article_img']; ?> " width="100"></td>
                                <td class="thshow"><?php echo  $row['article_date']; ?></td>
                                <td class="thshow"><?php echo  $row['article_name']; ?></td>
                                <td class="thshow"><?php echo  $row['article_detail']; ?></td>
                                <td class="thshow">
                                    <a href="index.php?module=article&action=article_edit&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn edit">แก้ไขข้อมูล</button>
                                        <a href="index.php?module=article&action=article_delete&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบข้อมูล</button>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
} ?>

<?php
function article_edit()
{
    include("include/connect_db.php");

    $result_article = mysqli_query($conn, "SELECT * FROM article WHERE id='$_GET[id]'") or die(mysqli_error());
    $row_article = mysqli_fetch_array($result_article);

?>
    <form action="index.php?module=article&action=article_update" method="post" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value=" <?php echo $row_article['id']; ?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/article/<?php echo $row_article['article_img']; ?>' href='../img/article/<?php echo $row_article['article_img']; ?>'><img class="img-responsive" src="../img/article/<?php echo $row_article['article_img']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="img_article" id="img_article" value="<?php echo $row_article['article_img']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพแรก(ขนาดรูปภาพ 369 x 252)</label>
                    <input class="form-control" name="article_img[]" type="file" id="article_img" accept="image/*">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">วันที่</label>
                    <input type="date" class="form-control" name="article_date" id="article_date" placeholder="2000-10-01" value="<?php echo $row_article['article_date']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="article_name" id="article_name" value="<?php echo $row_article['article_name']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดหน้าแรก</label>
                    <textarea class="form-control" name="article_detail" id="textshow"><?php echo $row_article['article_detail']; ?></textarea>
                </div>
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/article/<?php echo $row_article['article_img2']; ?>' href='../img/article/<?php echo $row_article['article_img2']; ?>'><img class="img-responsive" src="../img/article/<?php echo $row_article['article_img2']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="img_article2" id="img_article2" value="<?php echo $row_article['article_img2']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพสอง(ขนาดรูปภาพ 1169 x 694)</label>
                    <input class="form-control" name="article_img2[]" type="file" id="article_img2" accept="image/*">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดหน้าสอง</label>
                    <textarea class="form-control" name="article_detail2" id="textshow"><?php echo $row_article['article_detail2']; ?></textarea>
                    <button type="submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </div>
    </form>
    </div>

<?php
} ?>

<?php
function article_update()
{
    include("include/connect_db.php");
    error_reporting(E_ALL ^ E_DEPRECATED);
    error_reporting(error_reporting() & ~E_NOTICE);
?>
    <?php
    if (!empty($_FILES['article_img']['name'][0])) {
        $ext = strtolower(pathinfo($_FILES['article_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
        $gallary_tmp = $_FILES['article_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $article_img = "$gallary";
        if (!empty($article_img)) {
            @copy($gallary_tmp, "../img/article/$gallary");
        }
    } else {
        $article_img = "";
    }

    if (!empty($_FILES['article_img2']['name'][0])) {
        $ext2 = strtolower(pathinfo($_FILES['article_img2']['name'][0], PATHINFO_EXTENSION));
        @$gallary2 = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext2));
        $gallary_tmp2 = $_FILES['article_img2']['tmp_name'][0];
    } else {
        $gallary2 = "";
    }

    if ($gallary2) {
        $article_img2 = "$gallary2";
        if (!empty($article_img2)) {
            @copy($gallary_tmp2, "../img/article/$gallary2");
        }
    } else {
        $article_img2 = "";
    }

    if (!empty($article_img)) {
        $resule_delete = mysqli_query($conn, "SELECT article_img FROM article WHERE id='$_POST[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/article/$row_delete[article_img]");
    } else {
        $article_img = $_POST['img_article'];
    }
    if (!empty($article_img2)) {
        $resule_delete2 = mysqli_query($conn, "SELECT article_img2 FROM article WHERE id='$_POST[id]'") or die(mysqli_error());
        $row_delete2 = mysqli_fetch_array($resule_delete2);
        @unlink("../img/article/$row_delete2[article_img2]");
    } else {
        @$article_img2 = $_POST['img_article2'];
    }
    $sql1 = "UPDATE article SET article_img='" . $article_img . "',article_date='" . mysqli_real_escape_string($conn, $_POST["article_date"]) . "',article_name='" . mysqli_real_escape_string($conn, $_POST["article_name"]) . "',article_detail='" . mysqli_real_escape_string($conn, $_POST["article_detail"]) . "',article_img2='" . $article_img2 . "',article_detail='" . mysqli_real_escape_string($conn, $_POST["article_detail"]) . "',article_img2='" . $article_img2 . "',article_detail='" . mysqli_real_escape_string($conn, $_POST["article_detail"]) . "',article_img2='" . $article_img2 . "',article_detail2='" . mysqli_real_escape_string($conn, $_POST["article_detail2"]) . "'WHERE id ='" . $_POST["id"] . "'";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'), window.location = 'index.php?module=article&action=article_show&id=$_POST[id]';</script>";
    ?>

<?php
} ?>

<?php
function article_delete()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT article_img FROM article WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/article/$row_delete[article_img]");

        $resule_delete = mysqli_query($conn, "SELECT article_img2 FROM article WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/article/$row_delete[article_img2]");

        $sql = "DELETE FROM article WHERE id ='$_GET[id]'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบรูปข้อมูลเรียบร้อย'),window.location='index.php?module=article&action=article_show'</script>";
    }

    ?>

<?php
} ?>