<?php
function food_add()
{
    include("include/connect_db.php");
    $result_food = mysqli_query($conn, "SELECT * FROM food ORDER BY id ASC") or die(mysqli_error());
    $row_food = mysqli_fetch_array($result_food);

    $food_name = empty($row_food['food_name']) ? "" : $row_food['food_name'];
    $food_detail = empty($row_food['food_detail']) ? "" : $row_food['food_detail'];
?>
    <div class="row">
        <div class="col-lg-12">
            <form action="index.php?module=food&action=food_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพ(ขนาดรูปภาพ 373 x 365)</label>
                    <input class="form-control" name="food_img[]" type="file" id="food_img" accept="image/*">
                    <input type="hidden" class="form-control" name="img_food" id="img_food">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ชื่อสินค้า</label>
                    <input type="text" class="form-control" name="food_name" id="food_name">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="food_detail" id="textshow"></textarea>
                    <button type="submit" name="submit" value="save" id="submit" class="btn btn-block save">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>

<?php
} ?>

<?php
function food_upload()
{

    include("include/connect_db.php");
    $resule_food = mysqli_query($conn, "SELECT * FROM food") or die(mysqli_error());
    $row_food = mysqli_fetch_array($resule_food);
    $num = mysqli_num_rows($resule_food);

    if (!empty($_FILES['food_img']['name'][0])) {
        $ext = strtolower(pathinfo($_FILES['food_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext));
        $gallary_tmp = $_FILES['food_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/food/$gallary");
        }
    } else {
        $update_gallary = "";
    }


    $sql1 = "INSERT INTO food values('','" . $update_gallary . "','" . mysqli_real_escape_string($conn, $_POST["food_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["food_detail"]) . "')";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=food&action=food_show';</script>";
} ?>

<?php
function food_show()
{
    include("include/connect_db.php");
?>
    <?php
    $i = 1;
    $result_food = mysqli_query($conn, "SELECT * FROM food ORDER BY id asc ") or die(mysqli_error());
    $rows = mysqli_num_rows($result_food);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
                <a href="index.php?module=food&action=food_add"> <button type="submit" name="submit" value="save" id="submit" class="btn add">เพิ่มข้อมูล</button></a>
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
                        <?php while ($row = mysqli_fetch_array($result_food)) { ?>
                            <tr>
                                <td scope="col" class="thshow"><?php echo $i; ?></td>
                                <td class="thshow"><img src="../img/food/<?php echo $row['food_img']; ?> " width="100"></td>
                                <td class="thshow"><?php echo  $row['food_name']; ?></td>
                                <td class="thshow"><?php echo  $row['food_detail']; ?></td>
                                <td class="thshow">
                                    <a href="index.php?module=food&action=food_edit&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn edit">แก้ไขข้อมูล</button>
                                        <a href="index.php?module=food&action=food_delete&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบข้อมูล</button>
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
function food_edit()
{
    include("include/connect_db.php");

    $result_food = mysqli_query($conn, "SELECT * FROM food WHERE id='$_GET[id]'") or die(mysqli_error());
    $row_food = mysqli_fetch_array($result_food);

?>
    <form action="index.php?module=food&action=food_update" method="post" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value=" <?php echo $row_food['id']; ?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a class="info sample" data-lighter='../img/food/<?php echo $row_food['food_img']; ?>' href='../img/food/<?php echo $row_food['food_img']; ?>'><img class="img-responsive" src="../img/food/<?php echo $row_food['food_img']; ?>" alt="" width="20%"></a>
                    <input type="hidden" name="food_img" id="food_img" value="<?php echo $row_food['food_img']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="formFile" class="form-label">รูปภาพหน้าแรก</label>
                    <input class="form-control" name="food_img[]" type="file" id="food_img">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">หัวข้อ</label>
                    <input type="text" class="form-control" name="food_name" id="food_name" value="<?php echo $row_food['food_name']; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" name="food_detail" id="textshow"><?php echo $row_food['food_detail']; ?></textarea>
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
function food_update()
{
    include("include/connect_db.php");
?>
    <?php
    if (!empty($_FILES['food_img']['name'][0])) {
        $ext1 = strtolower(pathinfo($_FILES['food_img']['name'][0], PATHINFO_EXTENSION));
        @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext1));
        $gallary_tmp = $_FILES['food_img']['tmp_name'][0];
    } else {
        $gallary = "";
    }

    if ($gallary) {
        $update_gallary = "$gallary";
        if (!empty($update_gallary)) {
            @copy($gallary_tmp, "../img/food/$gallary");
        }
    } else {
        $update_gallary = "";
    }


    if (!empty($update_gallary)) {
        $resule_delete = mysqli_query($conn, "SELECT food_img FROM food WHERE id='$_POST[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/food/$row_delete[food_img]");
    } else {
        $update_gallary = $_POST['food_img'];
    }

    $sql1 = "UPDATE food SET food_img ='" . $update_gallary . "',food_name='" . mysqli_real_escape_string($conn, $_POST["food_name"]) . "',food_detail='" . mysqli_real_escape_string($conn, $_POST["food_detail"]) . "'WHERE id ='" . $_POST["id"] . "'";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'),window.location='index.php?module=food&action=food_show&id=$_POST[id]'</script>"; ?>

<?php
} ?>

<?php
function food_delete()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $resule_delete = mysqli_query($conn, "SELECT food_img FROM food WHERE id='$_GET[id]'") or die(mysqli_error());
        $row_delete = mysqli_fetch_array($resule_delete);
        @unlink("../img/food/$row_delete[food_img]");

        $sql = "DELETE FROM food WHERE id ='$_GET[id]'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบรูปภาพเรียบร้อย'),window.location='index.php?module=food&action=food_show'</script>";
    }

    ?>

<?php
} ?>