<?php
function contact_add()
{
    include("include/connect_db.php");
    $result_contact = mysqli_query($conn, "SELECT * FROM contact ORDER BY id ASC") or die(mysqli_error());
    $row_contact = mysqli_fetch_array($result_contact);

    $contact_name = empty($row_contact['contact_name']) ? "" : $row_contact['contact_name'];
    $contact_email = empty($row_contact['contact_email']) ? "" : $row_contact['contact_email'];
    $contact_phone = empty($row_contact['contact_phone']) ? "" : $row_contact['contact_phone'];
    $contact_text = empty($row_contact['contact_text']) ? "" : $row_contact['contact_text'];

?>
    <div class="row">
        <div class="col-lg-12">
            <form action="index.php?module=contact&action=contact_upload" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" name="contact_name" id="contact_name">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Example@hotmail.com">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">เบอร์โทรสัพท์</label>
                    <input type="text" class="form-control" name="contact_phone" id="contact_phone">
                </div>
                <div class="mb-3 cardmb">
                    <label for="exampleFormControlTextarea1" class="form-label">ข้อความ</label>
                    <input type="text" class="form-control" name="contact_text" id="contact_text">
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
function contact_upload()
{

    include("include/connect_db.php");
    $resule_contact = mysqli_query($conn, "SELECT * FROM contact") or die(mysqli_error());
    $row_contact = mysqli_fetch_array($resule_contact);
    $num = mysqli_num_rows($resule_contact);

    $sql1 = "INSERT INTO contact values('','" . mysqli_real_escape_string($conn, $_POST["contact_name"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_email"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_phone"]) . "','" . mysqli_real_escape_string($conn, $_POST["contact_text"]) . "','" . date("Y-m-d H:i:s") . "')";
    mysqli_query($conn, $sql1) or die(mysqli_error());

    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเรียบร้อย'),window.location='index.php?module=contact&action=contact_show';</script>";
} ?>

<?php
function contact_show()
{
    include("include/connect_db.php");
?>
    <?php
    $i = 1;
    $result_contact = mysqli_query($conn, "SELECT * FROM contact ORDER BY id asc ") or die(mysqli_error());
    $rows = mysqli_num_rows($result_contact);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 cardmb">
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
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">เบอร์โทรสัพท์</th>
                            <th scope="col">ข้อความ</th>
                            <th scope="col">ลบข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result_contact)) { ?>
                            <tr>
                                <td scope="col" class="thshow"><?php echo $i; ?></td>
                                <td class="thshow"><?php echo  $row['contact_name']; ?></td>
                                <td class="thshow"><?php echo  $row['contact_email']; ?></td>
                                <td class="thshow"><?php echo  $row['contact_phone']; ?></td>
                                <td class="thshow"><?php echo  $row['contact_text']; ?></td>
                                <td class="thshow"><a href="index.php?module=contact&action=contact_delete&id=<?php echo $row['id']; ?>"><button type="submit" name="submit" value="save" id="submit" class="btn delete">ลบข้อมูล</button></td>
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
function contact_delete()
{
    include("include/connect_db.php");
?>

    <?php

    if (!empty($_GET['id'])) {

        $sql = "DELETE FROM contact WHERE id ='$_GET[id]'";
        mysqli_query($conn, $sql) or die(mysqli_error());

        echo "<script type='text/javascript'>alert('ลบรูปข้อมูลเรียบร้อย'),window.location='index.php?module=contact&action=contact_show'</script>";
    }

    ?>

<?php
} ?>