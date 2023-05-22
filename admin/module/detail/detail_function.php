<?php
function detail_add()
{
    include("include/connect_db.php");
    $result_detail = mysqli_query($conn, "SELECT * FROM indexu ORDER BY id ASC") or die(mysqli_error());
    $row_detail = mysqli_fetch_array($result_detail);

    $indexu_name = empty($row_detail['indexu_name']) ? "" : $row_detail['indexu_name'];
    $indexu_detail = empty($row_detail['indexu_detail']) ? "" : $row_detail['indexu_detail'];

?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=detail&action=detail_delete1&id=<?php echo $row_detail['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบรูปภาพแรก</button></a>
                <a href="index.php?module=detail&action=detail_delete2&id=<?php echo $row_detail['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบรูปภาพสอง</button></a>
            </div>
            <form action="index.php?module=detail&action=detail_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="id" value="<?php echo $row_detail['id']; ?>">
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">หัวข้อ</label>
                    <textarea class="form-control" name="indexu_name" id="textshow"><?php echo $indexu_name; ?></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="indexu_detail" id="textshow"><?php echo  $indexu_detail; ?></textarea>
                </div>
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/detail/<?php echo $row_detail['indexu_img1']; ?>' href='../img/detail/<?php echo $row_detail['indexu_img1']; ?>'><img class="img-responsive" src="../img/detail/<?php echo $row_detail['indexu_img1']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="img_indexu" id="img_indexu" value="<?php echo $row_detail['indexu_img1']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพแรก(ขนาดรูปภาพ 351 x 594)</label>
                    <input class="form-control" name="indexu_img1[]" type="file" id="indexu_img1" accept="image/*">
                </div>
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/detail/<?php echo $row_detail['indexu_img2']; ?>' href='../img/detail/<?php echo $row_detail['indexu_img2']; ?>'><img class="img-responsive" src="../img/detail/<?php echo $row_detail['indexu_img2']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="img_indexu2" id="img_indexu2" value="<?php echo $row_detail['indexu_img2']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพสอง(ขนาดรูปภาพ 233 x 425)</label>
                    <input class="form-control" name="indexu_img2[]" type="file" id="indexu_img2" accept="image/*">
                </div>
                <div class="mb-3 cardmb">
                    <button type=" submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>


<?php
} ?>

<?php
function detail_upload()
{
    include("include/connect_db.php");

    $resule_detail = mysqli_query($conn, "SELECT * FROM indexu") or die(mysqli_error());
    $row_detail = mysqli_fetch_array($resule_detail);
    $num = mysqli_num_rows($resule_detail);
    $resule_row = $num + 1;

    if ($num > 0) {

        if (!empty($_FILES['indexu_img1']['name'][0])) {
            $ext1 = strtolower(pathinfo($_FILES['indexu_img1']['name'][0], PATHINFO_EXTENSION));
            @$gallary1 = rand(000000000, 999999999) . "." . end(explode(".", $ext1));
            $gallary_tmp1 = $_FILES['indexu_img1']['tmp_name'][0];
        } else {
            $gallary1 = "";
        }

        if ($gallary1) {
            $update_gallary1 = "$gallary1";
            if (!empty($update_gallary1)) {
                @copy($gallary_tmp1, "../img/detail/$gallary1");
            }
        } else {
            $update_gallary1 = "";
        }

        if (!empty($_FILES['indexu_img1']['name'][0])) {
            $resule_delete = mysqli_query($conn, "SELECT indexu_img1 FROM indexu WHERE id='$_POST[id]'") or die(mysqli_error());
            $row_delete = mysqli_fetch_array($resule_delete);
            @unlink("../img/detail/$row_delete[indexu_img1]");
        } else {
            @$update_gallary1 = $_POST['img_indexu'];
            //@copy($gallary_tmp1, "../img/detail/$update_gallary1");
        }




        if (!empty($_FILES['indexu_img2']['name'][0])) {
            $ext2 = strtolower(pathinfo($_FILES['indexu_img2']['name'][0], PATHINFO_EXTENSION));
            @$gallary2 = rand(000000000, 999999999) . "." . end(explode(".", $ext2));
            $gallary_tmp2 = $_FILES['indexu_img2']['tmp_name'][0];
        } else {
            $gallary2 = "";
        }

        if ($gallary2) {
            $update_gallary2 = "$gallary2";
            if (!empty($update_gallary2)) {
                @copy($gallary_tmp2, "../img/detail/$gallary2");
            }
        } else {
            $update_gallary2 = "";
        }

        if (!empty($_FILES['indexu_img2']['name'][0])) {
            $resule_delete2 = mysqli_query($conn, "SELECT indexu_img2 FROM indexu WHERE id='$_POST[id]'") or die(mysqli_error());
            $row_delete2 = mysqli_fetch_array($resule_delete2);
            @unlink("../img/detail/$row_delete2[indexu_img2]");
        } else {
            @$update_gallary2 = $_POST['img_indexu2'];
            //@copy($gallary_tmp2, "../img/detail/$update_gallary2");
        }


        $sql1 = "UPDATE indexu SET indexu_name='" . mysqli_real_escape_string($conn, $_POST["indexu_name"]) . "',indexu_detail='" . mysqli_real_escape_string($conn, $_POST["indexu_detail"]) . "',indexu_img1='" . $update_gallary1 . "',indexu_img2='" . $update_gallary2 . "'";
        mysqli_query($conn, $sql1) or die(mysqli_error());

        mysqli_close($conn);
        echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'), window.location = 'index.php?module=detail&action=detail_add';</script>";
    } else {

        if (!empty(($_FILES['indexu_img1']['name'][0]))) {
            $ext1 = strtolower(pathinfo($_FILES['indexu_img1']['name'][0], PATHINFO_EXTENSION));
            @$gallary1 = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext1));
            $gallary_tmp1 = $_FILES['indexu_img1']['tmp_name'][0];
        } else {
            $gallary1 = "";
        }

        if ($gallary1) {
            $detail_img1 = "$gallary1";
            if (!empty($detail_img1)) {
                @copy($gallary_tmp1, "../img/detail/$gallary1");
            }
        } else {
            $detail_img1 = "";
        }


        if (!empty($_FILES['indexu_img2']['name'][0])) {
            $ext2 = strtolower(pathinfo($_FILES['indexu_img2']['name'][0], PATHINFO_EXTENSION));
            @$gallary2 = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext2));
            $gallary_tmp2 = $_FILES['indexu_img2']['tmp_name'][0];
        } else {
            $gallary2 = "";
        }

        if ($gallary2) {
            $detail_img2 = "$gallary2";
            if (!empty($detail_img2)) {
                @copy($gallary_tmp2, "../img/detail/$gallary2");
            }
        } else {
            $detail_img2 = "";
        }


        $sql1 = "INSERT INTO indexu values('','" . mysqli_real_escape_string($conn, $_POST["indexu_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["indexu_detail"]) . "','" . $detail_img1 . "','" . $detail_img2 . "')";
        mysqli_query($conn, $sql1) or die(mysqli_error());

        mysqli_close($conn);
        echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=detail&action=detail_add';</script>";
    }
?>
<?php
} ?>

<?php
function detail_delete1()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT indexu_img1 FROM indexu WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/detail/$row_delete[indexu_img1]");

        $sql = "UPDATE indexu SET indexu_img1 ='' WHERE  id='" . $_GET["id"] . "'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบรูปภาพแรกเรียบร้อย'),window.location='index.php?module=detail&action=detail_add'</script>";
    }

    ?>

<?php
} ?>

<?php
function detail_delete2()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT indexu_img2 FROM indexu WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/detail/$row_delete[indexu_img2]");

        $sql = "UPDATE indexu SET indexu_img2 ='' WHERE  id='" . $_GET["id"] . "'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบรูปภาพสองเรียบร้อย'),window.location='index.php?module=detail&action=detail_add'</script>";
    }

    ?>

<?php
} ?>