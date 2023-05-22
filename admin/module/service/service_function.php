<?php
function service_add()
{
    include("include/connect_db.php");
    $result_service = mysqli_query($conn, "SELECT * FROM service ORDER BY id ASC") or die(mysqli_error());
    $row_service = mysqli_fetch_array($result_service);

    $service_name = empty($row_service['service_name']) ? "" : $row_service['service_name'];
    $service_detail = empty($row_service['service_detail']) ? "" : $row_service['service_detail'];
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=service&action=service_delete&id=<?php echo $row_service['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบรูปภาพ</button></a>
            </div>
            <form action="index.php?module=service&action=service_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพ(ขนาดรูปภาพ 499 x 382)</label>
                    <input class="form-control" name="service_img[]" type="file" id="service_img" accept="image/*">
                    <input type="hidden" class="form-control" name="img_service" id="img_service">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ชื่อสินค้า</label>
                    <input type="text" class="form-control" name="service_name" id="service_name">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="service_detail" id="textshow"></textarea>
                    <button type="submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>

<?php
} ?>

<?php
function service_upload()
{

    include("include/connect_db.php");
    $resule_service = mysqli_query($conn, "SELECT * FROM service") or die(mysqli_error());
    $row_service = mysqli_fetch_array($resule_service);
    $num = mysqli_num_rows($resule_service);

    if (!empty($_FILES['service_img']['name'][0])) {
        $ext = strtolower(pathinfo($_FILES['service_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
        $gallary_tmp = $_FILES['service_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/service/$gallary");
        }
    } else {
        $update_gallary = "";
    }


    $sql1 = "INSERT INTO service values('','" . $update_gallary . "','" . mysqli_real_escape_string($conn, $_POST["service_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["service_detail"]) . "')";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=service&action=service_show';</script>";
} ?>

<?php
function service_show()
{
    include("include/connect_db.php");
?>
    <?php
    $i = 1;
    $result_service = mysqli_query($conn, "SELECT * FROM service ORDER BY id asc ") or die(mysqli_error());
    $rows = mysqli_num_rows($result_service);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=service&action=service_add"> <button type="submit" name="submit" value="save" id="submit" class="btn add">เพิ่มข้อมูล</button></a>
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
                        <?php while ($row = mysqli_fetch_array($result_service)) { ?>
                            <tr>
                                <td scope="col" class="thshow"><?php echo $i; ?></td>
                                <td class="thshow"><img src="../img/service/<?php echo $row['service_img']; ?> " width="100"></td>
                                <td class="thshow"><?php echo  $row['service_name']; ?></td>
                                <td class="thshow"><?php echo  $row['service_detail']; ?></td>
                                <td class="thshow">
                                    <a href="index.php?module=service&action=service_edit&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn edit">แก้ไขข้อมูล</button>
                                        <a href="index.php?module=service&action=service_delete&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบข้อมูล</button>
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
function service_edit()
{
    include("include/connect_db.php");

    $result_service = mysqli_query($conn, "SELECT * FROM service WHERE id='$_GET[id]'") or die(mysqli_error());
    $row_service = mysqli_fetch_array($result_service);

?>
    <form action="index.php?module=service&action=service_update" method="post" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value=" <?php echo $row_service['id']; ?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/service/<?php echo $row_service['service_img']; ?>' href='../img/service/<?php echo $row_service['service_img']; ?>'><img class="img-responsive" src="../img/service/<?php echo $row_service['service_img']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="service_img" id="service_img" value="<?php echo $row_service['service_img']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพหน้าแรก</label>
                    <input class="form-control" name="service_img[]" type="file" id="service_img">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">หัวข้อ</label>
                    <input type="text" class="form-control" name="service_name" id="service_name" value="<?php echo $row_service['service_name']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="service_detail" id="textshow"><?php echo $row_service['service_detail']; ?></textarea>
                </div>
                <div class="mb-3 cardmb">
                    <button type=" submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </form>

<?php
} ?>

<?php
function service_update()
{
    include("include/connect_db.php");
?>
    <?php
    if (!empty($_FILES['service_img']['name'][0])) {
        $ext = strtolower(pathinfo($_FILES['service_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
        $gallary_tmp = $_FILES['service_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/service/$gallary");
        }
    } else {
        $update_gallary = "";
    }

    if (!empty($update_gallary)) {
        $resule_delete = mysqli_query($conn, "SELECT service_img FROM service WHERE id='$_POST[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/service/$row_delete[service_img]");
    } else {
        $update_gallary = $_POST['service_img'];
    }

    $sql1 = "UPDATE service SET service_img ='" . $update_gallary . "',service_name='" . mysqli_real_escape_string($conn, $_POST["service_name"]) . "',service_detail='" . mysqli_real_escape_string($conn, $_POST["service_detail"]) . "'WHERE id ='" . $_POST["id"] . "'";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'),window.location='index.php?module=service&action=service_show&id=$_POST[id]'</script>"; ?>
<?php
} ?>

<?php
function service_delete()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT service_img FROM service WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/service/$row_delete[service_img]");

        $sql = "DELETE FROM service WHERE id ='$_GET[id]'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อย'),window.location='index.php?module=service&action=service_show'</script>";
    }

    ?>

<?php
} ?>