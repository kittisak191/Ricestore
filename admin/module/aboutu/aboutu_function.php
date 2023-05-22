<?php
function aboutu_add()
{
    include("include/connect_db.php");
    $result_aboutu = mysqli_query($conn, "SELECT * FROM aboutu ORDER BY id ASC") or die(mysqli_error());
    $row_aboutu = mysqli_fetch_array($result_aboutu);

    $aboutu_name = empty($row_aboutu['aboutu_name']) ? "" : $row_aboutu['aboutu_name'];
    $aboutu_detail = empty($row_aboutu['aboutu_detail']) ? "" : $row_aboutu['aboutu_detail'];
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=aboutu&action=aboutu_delete&id=<?php echo $row_aboutu['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบรูปภาพ</button></a>
            </div>
            <form action="index.php?module=aboutu&action=aboutu_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพ(ขนาดรูปภาพ 624 x 590)</label>
                    <input class="form-control" name="aboutu_img[]" type="file" id="aboutu_img" accept="image/*">
                    <input type="hidden" class="form-control" name="img_aboutu" id="img_aboutu">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">หัวข้อ</label>
                    <textarea class="form-control" name="aboutu_name" id="textshow"></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="aboutu_detail" id="textshow"></textarea>
                    <button type="submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>

<?php
} ?>

<?php
function aboutu_upload()
{

    include("include/connect_db.php");
    $resule_aboutu = mysqli_query($conn, "SELECT * FROM aboutu") or die(mysqli_error());
    $row_aboutu = mysqli_fetch_array($resule_aboutu);
    $num = mysqli_num_rows($resule_aboutu);

    if (!empty($_FILES['aboutu_img']['name'][0])) {
        $ext = strtolower(pathinfo($_FILES['aboutu_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
        $gallary_tmp = $_FILES['aboutu_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/aboutu/$gallary");
        }
    } else {
        $update_gallary = "";
    }


    $sql1 = "INSERT INTO aboutu values('','" . $update_gallary . "','" . mysqli_real_escape_string($conn, $_POST["aboutu_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["aboutu_detail"]) . "')";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=aboutu&action=aboutu_show';</script>";
} ?>

<?php
function aboutu_show()
{
    include("include/connect_db.php");
?>
    <?php
    $i = 1;
    $result_aboutu = mysqli_query($conn, "SELECT * FROM aboutu ORDER BY id asc ") or die(mysqli_error());
    $rows = mysqli_num_rows($result_aboutu);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=aboutu&action=aboutu_add"> <button type="submit" name="submit" value="save" id="submit" class="btn add">เพิ่มข้อมูล</button></a>
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
                            <th scope="col">รูป</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result_aboutu)) { ?>
                            <tr>
                                <td scope="col" class="thshow"><?php echo $i; ?></td>
                                <td class="thshow"><img src="../img/aboutu/<?php echo $row['aboutu_img']; ?> " width="100"></td>
                                <td class="thshow"><?php echo  $row['aboutu_name']; ?></td>
                                <td class="thshow"><?php echo  $row['aboutu_detail']; ?></td>
                                <td class="thshow">
                                    <a href="index.php?module=aboutu&action=aboutu_edit&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn edit">แก้ไขข้อมูล</button>
                                        <a href="index.php?module=aboutu&action=aboutu_delete&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบข้อมูล</button>
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
function aboutu_edit()
{
    include("include/connect_db.php");

    $result_aboutu = mysqli_query($conn, "SELECT * FROM aboutu WHERE id='$_GET[id]'") or die(mysqli_error());
    $row_aboutu = mysqli_fetch_array($result_aboutu);

?>
    <form action="index.php?module=aboutu&action=aboutu_update" method="post" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value=" <?php echo $row_aboutu['id']; ?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/aboutu/<?php echo $row_aboutu['aboutu_img']; ?>' href='../img/aboutu/<?php echo $row_aboutu['aboutu_img']; ?>'><img class="img-responsive" src="../img/aboutu/<?php echo $row_aboutu['aboutu_img']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="aboutu_img1" id="aboutu_img1" value="<?php echo $row_aboutu['aboutu_img']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพหน้าแรก</label>
                    <input class="form-control" name="aboutu_img[]" type="file" id="aboutu_img">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">หัวข้อ</label>
                    <textarea class="form-control" name="aboutu_name" id="textshow"><?php echo $row_aboutu['aboutu_name']; ?></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="aboutu_detail" id="textshow"><?php echo $row_aboutu['aboutu_detail']; ?></textarea>
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
function aboutu_update()
{
    include("include/connect_db.php");
?>
    <?php
    if (!empty($_FILES['aboutu_img']['name'][0])) {
        $ext1 = strtolower(pathinfo($_FILES['aboutu_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext1));
        $gallary_tmp = $_FILES['aboutu_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/aboutu/$gallary");
        }
    } else {
        $update_gallary = "";
    }


    if (!empty($update_gallary)) {
        $resule_delete = mysqli_query($conn, "SELECT aboutu_img FROM aboutu WHERE id='$_POST[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/aboutu/$row_delete[aboutu_img]");
    } else {
        $update_gallary = $_POST['aboutu_img1'];
    }

    $sql1 = "UPDATE aboutu SET aboutu_img ='" . $update_gallary . "',aboutu_name='" . mysqli_real_escape_string($conn, $_POST["aboutu_name"]) . "',aboutu_detail='" . mysqli_real_escape_string($conn, $_POST["aboutu_detail"]) . "'WHERE id ='" . $_POST["id"] . "'";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'),window.location='index.php?module=aboutu&action=aboutu_show&id=$_POST[id]'</script>"; ?>

<?php
} ?>

<?php
function aboutu_delete()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT aboutu_img FROM aboutu WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/aboutu/$row_delete[aboutu_img]");

        $sql = "DELETE FROM aboutu WHERE id ='$_GET[id]'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบรูปภาพเรียบร้อย'),window.location='index.php?module=aboutu&action=aboutu_show'</script>";
    }

    ?>

<?php
} ?>