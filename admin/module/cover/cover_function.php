<?php
function cover_add()
{
  include("include/connect_db.php");
?>
  <div class="row">
    <div class="col-lg-12">
      <div class="mb-3 cardmb">
        <form action="index.php?module=cover&action=cover_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
          <label for="formFile" class="form-label">รูปภาพหน้าแรก(ขนาดรูปภาพ 1600 x 630)</label>
          <input class="form-control" name="img[]" type="file" id="indexh_img" required accept="image/*">
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
function cover_upload()
{

  include("include/connect_db.php");
  if (isset($_FILES['img']['name'][0])) {
    $ext1 = strtolower(pathinfo($_FILES['img']['name'][0], PATHINFO_EXTENSION));
    @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext1));
    $gallary_tmp = $_FILES['img']['tmp_name'][0];
  } else {
    $gallary = "";
  }

  if ($gallary) {
    $update_gallary = "$gallary";
    if (isset($update_gallary)) {
      @copy($gallary_tmp, "../img/cover/$gallary");
    }
  } else {
    $update_gallary = "";
  }

  $sql1 = "INSERT INTO indexh values('','" . $update_gallary . "','" . date("Y-m-d H:i:s") . "')";
  mysqli_query($conn, $sql1) or die(mysqli_error());

  mysqli_close($conn);
  echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=cover&action=cover_show';</script>";
} ?>

<?php
function cover_show()
{
  include("include/connect_db.php");
?>
  <?php
  $i = 1;
  $result = mysqli_query($conn, "SELECT * FROM indexh ORDER BY id asc ") or die(mysqli_error());
  $rows = mysqli_num_rows($result);
  ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="mb-3 cardmb">
        <a href="index.php?module=cover&action=cover_add"> <button type="submit" name="submit" value="save" id="submit" class="btn add">เพิ่มข้อมูล</button></a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col ">ลำดับ</th>
              <th scope="col ">รูป</th>
              <th scope="col ">แก้ไข</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
              <tr>
                <td scope="col" class="thshow"><?php echo $i; ?></td>
                <td class="thshow"><?php echo '<img src="../img/cover/' . $row['img'] . '"width="100"  />'; ?></td>
                <td class="thshow">
                  <a href="index.php?module=cover&action=cover_edit&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn edit">แก้ไขข้อมูล</button>
                    <a href="index.php?module=cover&action=cover_delete&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบข้อมูล</button>
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
function cover_edit()
{
  include("include/connect_db.php");

  $result_edit = mysqli_query($conn, "SELECT * FROM indexh WHERE id='$_GET[id]'") or die(mysqli_error());
  $row_edit = mysqli_fetch_array($result_edit);

?>
  <form action="index.php?module=cover&action=cover_update" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
      <input type="hidden" name="img_id" id="img_id" value=" <?php echo $row_edit['id']; ?>">
      <input type="hidden" name="pic" id="pic" value=" <?php echo $row_edit['img']; ?>">
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="mb-3 cardmb">
          <label for="formFile" class="form-label">รูปภาพหน้าแรก</label>
          <input class="form-control" name="img[]" type="file" id="indexh_img" required accept="image/*">
          <a class="info sample" data-lighter='../img/cover/<?php echo $row_edit['img']; ?>' href='../img/cover/<?php echo $row_edit['img']; ?>'><img class="img-responsive" src="../img/cover/<?php echo $row_edit['img']; ?>" alt="" width="20%"></a>
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
function cover_update()
{
  include("include/connect_db.php");
?>
  <?php
  if (isset($_FILES['img']['name'][0])) {
    $ext1 = strtolower(pathinfo($_FILES['img']['name'][0], PATHINFO_EXTENSION));
    @$gallary = rand(000000000, 999999999) . "." . end(explode("." . "_", $ext1));
    $gallary_tmp = $_FILES['img']['tmp_name'][0];
  } else {
    $gallary = "";
  }

  if ($gallary) {
    $update_gallary = "$gallary";
    if (isset($update_gallary)) {
      @copy($gallary_tmp, "../img/cover/$gallary");
    }
  } else {
    $update_gallary = "";
  }
  if (!empty($update_gallary)) {
    $resule_delete = mysqli_query($conn, "SELECT img FROM indexh WHERE id='$_POST[img_id]'") or die(mysqli_error());
    $row_delete = mysqli_fetch_array($resule_delete);
    @unlink("../img/cover/$row_delete[img]");
  } else {
    $update_gallary = $_POST['pic'];
    @copy($name_franchise_list_tmp, "../img/cover/$update_gallary");
  }

  $sql1 = "UPDATE indexh SET img ='" . $update_gallary . "' WHERE id ='" . $_POST["img_id"] . "'";
  mysqli_query($conn, $sql1) or die(mysqli_error());

  mysqli_close($conn);
  echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'),window.location='index.php?module=cover&action=cover_show&id=$_POST[img_id]'</script>"; ?>

<?php
} ?>

<?php
function cover_delete()
{
  include("include/connect_db.php");
?>

  <?php

  if (!empty($_GET['id'])) {
    $resule_delete = mysqli_query($conn, "SELECT img FROM indexh WHERE id='$_GET[id]'") or die(mysqli_error());
    $row_delete = mysqli_fetch_array($resule_delete);
    @unlink("../img/cover/$row_delete[img]");

    $sql = "DELETE FROM indexh WHERE id ='$_GET[id]'";
    mysqli_query($conn, $sql) or die(mysqli_error());
    echo "<script type='text/javascript'>alert('ลบข้อมูลข้อมูลเรียบร้อย'),window.location='index.php?module=cover&action=cover_show'</script>";
  }

  ?>

<?php
} ?>