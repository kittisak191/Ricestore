<?php
function abouth_add()
{
    include("include/connect_db.php");
    $result_abouth = mysqli_query($conn, "SELECT * FROM abouth ORDER BY id ASC") or die(mysqli_error());
    $row_abouth = mysqli_fetch_array($result_abouth);

    $abouth_name = empty($row_abouth['abouth_name']) ? "" : $row_abouth['abouth_name'];
    $abouth_detail1 = empty($row_abouth['abouth_detail1']) ? ""  : $row_abouth['abouth_detail1'];
    $abouth_detail2 = empty($row_abouth['abouth_detail2']) ? ""  : $row_abouth['abouth_detail2'];
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=abouth&action=abouth_delete&id=<?php echo $row_abouth['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบรูปภาพ</button></a>
            </div>
            <form action="index.php?module=abouth&action=abouth_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="img_abouth" id="img_abouth" value="<?php echo $row_abouth['id']; ?>">
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">หัวข้อ</label>
                    <textarea class="form-control" name="abouth_name" id="textshow"><?php echo $abouth_name; ?></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="abouth_detail1" id="textshow"><?php echo $abouth_detail1; ?></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ข้อความ</label>
                    <input type="text" class="form-control" name="abouth_detail2" id="abouth_detail2" value="<?php echo $abouth_detail2; ?>">
                </div>
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/abouth/<?php echo $row_abouth['abouth_img']; ?>' href='../img/abouth/<?php echo $row_abouth['abouth_img']; ?>'><img class="img-responsive" src="../img/abouth/<?php echo $row_abouth['abouth_img']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="abouth_img" id="abouth_img" value="<?php echo $row_abouth['abouth_img']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพ(ขนาดรูปภาพ 669 x 424)</label>
                    <input class="form-control" name="abouth_img[]" type="file" id="about_img" accept="image/*">
                </div>
                <div class="mb-3 cardmb">
                    <button type="submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>

<?php
} ?>

<?php
function abouth_upload()
{

    include("include/connect_db.php");
    $resule_abouth = mysqli_query($conn, "SELECT * FROM abouth") or die(mysqli_error());
    $row_abouth = mysqli_fetch_array($resule_abouth);
    $num = mysqli_num_rows($resule_abouth);
    $resule_row = $num + 1;

    if ($num > 0) {
        if (!empty($_FILES['abouth_img']['name'][0])) {
            $ext1 = strtolower(pathinfo($_FILES['abouth_img']['name'][0], PATHINFO_EXTENSION));
            @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext1));
            $gallary_tmp = $_FILES['abouth_img']['tmp_name'][0];
        } else {
            $gallary = "";
        }

        if ($gallary) {
            $abouth_img = "$gallary";
            if (!empty($abouth_img)) {
                @copy($gallary_tmp, "../img/abouth/$gallary");
            }
        } else {
            $abouth_img = "";
        }

        if (!empty($abouth_img)) {
            $resule_delete = mysqli_query($conn, "SELECT abouth_img FROM abouth WHERE id='$_POST[img_abouth]'") or die(mysqli_error());
            $row_delete = mysqli_fetch_array($resule_delete);
            @unlink("../img/abouth/$row_delete[abouth_img]");
        } else {
            $abouth_img = $_POST['abouth_img'];
        }
        $sql1 = "UPDATE abouth SET abouth_name='" . mysqli_real_escape_string($conn, $_POST["abouth_name"]) . "',abouth_detail1='" . mysqli_real_escape_string($conn, $_POST["abouth_detail1"]) . "',abouth_detail2='" . mysqli_real_escape_string($conn, $_POST["abouth_detail2"]) . "',abouth_img ='" . $abouth_img . "'";
        mysqli_query($conn, $sql1) or die(mysqli_error());

        mysqli_close($conn);
        echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'),window.location='index.php?module=abouth&action=abouth_add';</script>";
    } else {
        if (!empty($_FILES['abouth_img']['name'][0])) {
            $ext = strtolower(pathinfo($_FILES['abouth_img']['name'][0], PATHINFO_EXTENSION));
            @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
            $gallary_tmp = $_FILES['abouth_img']['tmp_name'][0];
        } else {
            $gallary = "";
        }

        if ($gallary) {
            $abouth_img = "$gallary";
            if (!empty($abouth_img)) {
                @copy($gallary_tmp, "../img/abouth/$gallary");
            }
        } else {
            $abouth_img = "";
        }

        $sql1 = "INSERT INTO abouth values('','" . mysqli_real_escape_string($conn, $_POST["abouth_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["abouth_detail1"]) . "','" . mysqli_real_escape_string($conn, $_POST["abouth_detail2"]) . "','" . $abouth_img . "')";
        mysqli_query($conn, $sql1) or die(mysqli_error());

        mysqli_close($conn);
        echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=abouth&action=abouth_add';</script>";
    }
} ?>

<?php
function abouth_delete()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT abouth_img FROM abouth WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/abouth/$row_delete[abouth_img]");

        $sql = "UPDATE abouth SET abouth_img ='' WHERE  id='" . $_GET["id"] . "'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบรูปภาพเรียบร้อย'),window.location='index.php?module=abouth&action=abouth_add'</script>";
    }

    ?>

<?php
} ?>