<?php
function contact_detail_add()
{
    include("include/connect_db.php");
    $result_contact_detail = mysqli_query($conn, "SELECT * FROM contact_detail ORDER BY id ASC") or die(mysqli_error());
    $row_contact_detail = mysqli_fetch_array($result_contact_detail);

    $contact_detail_name1 = empty($row_contact_detail['contact_detail_name1']) ? "" : $row_contact_detail['contact_detail_name1'];
    $contact_detail_name2 = empty($row_contact_detail['contact_detail_name2']) ? "" : $row_contact_detail['contact_detail_name2'];
    $contact_detail_name3 = empty($row_contact_detail['contact_detail_name3']) ? "" : $row_contact_detail['contact_detail_name3'];
    $contact_detail_name4 = empty($row_contact_detail['contact_detail_name4']) ? "" : $row_contact_detail['contact_detail_name4'];
    $contact_detail_name5 = empty($row_contact_detail['contact_detail_name5']) ? "" : $row_contact_detail['contact_detail_name5'];

?>
    <div class="row">
        <div class="col-lg-12">
            <form action="index.php?module=contact_detail&action=contact_detail_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ที่อยู่</label>
                    <input type="text" class="form-control" name="contact_detail_name1" id="contact_detail_name1" value="<?php echo $contact_detail_name1; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">เบอร์โทรสัพท์</label>
                    <input type="text" class="form-control" name="contact_detail_name2" id="contact_detail_name2" value="<?php echo $contact_detail_name2; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" name="contact_detail_name3" id="contact_detail_name3" placeholder="Example@hotmail.com" value="<?php echo $contact_detail_name3; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">อีเมลสำรอง</label>
                    <input type="email" class="form-control" name="contact_detail_name4" id="contact_detail_name4" placeholder="Example@hotmail.com" value="<?php echo $contact_detail_name4; ?>">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">เวลาทำการ</label>
                    <textarea class="form-control" name="contact_detail_name5" id="textshow" ><?php echo $contact_detail_name5; ?></textarea>

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
function contact_detail_upload()
{

    include("include/connect_db.php");
    $resule_contact_detail = mysqli_query($conn, "SELECT * FROM contact_detail") or die(mysqli_error());
    $row_contact_detail = mysqli_fetch_array($resule_contact_detail);
    $num = mysqli_num_rows($resule_contact_detail);
    $resule_row = $num + 1;

    if ($num > 0) {

        $sql1 = "UPDATE contact_detail SET contact_detail_name1='" . mysqli_real_escape_string($conn, $_POST["contact_detail_name1"]) . "',contact_detail_name2='" . mysqli_real_escape_string($conn, $_POST["contact_detail_name2"]) . "',contact_detail_name3='" . mysqli_real_escape_string($conn, $_POST["contact_detail_name3"]) . "',contact_detail_name4 ='" . mysqli_real_escape_string($conn, $_POST["contact_detail_name4"]) . "',contact_detail_name5 ='" . mysqli_real_escape_string($conn, $_POST["contact_detail_name5"]) . "'";
        mysqli_query($conn, $sql1) or die(mysqli_error());

        mysqli_close($conn);
        echo "<script type='text/javascript'>alert('อัพเดทข้อมูลเรียบร้อย'),window.location='index.php?module=contact_detail&action=contact_detail_add';</script>";
    } else {

        $sql1 = "INSERT INTO contact_detail values('','" . mysqli_real_escape_string($conn, $_POST["contact_detail_name1"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_detail_name2"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_detail_name3"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_detail_name4"]) . "',contact_detail_name5 ='" . mysqli_real_escape_string($conn, $_POST["contact_detail_name5"]) . "')";
        mysqli_query($conn, $sql1) or die(mysqli_error());

        mysqli_close($conn);
        echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=contact_detail&action=contact_detail_add';</script>";
    }
} ?>