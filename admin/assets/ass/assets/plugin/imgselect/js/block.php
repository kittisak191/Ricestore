<?php include("class/connect_db.php"); ?>
<?
$act = $_GET["act"];
$id = $_GET["id"];
$mid = $_GET["mid"];
$img_name = $_GET["img_name"];


if ($act == "delimg") {
    $sql = "delete from block_photo where block_id='" . $id . "' and img_id=" . $mid . "";
    $result = mysql_query($sql);
    if ($result) {
        unlink($img_name);
        header('location:block.php?id=' . $id . '');
    }
}

?>


<!doctype html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <title>my webtest - chiangmai zone</title>
    <link href='https://fonts.googleapis.com/css?family=Athiti&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/plugin/imgselect/css/imgareaselect-animated.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugin/foundation-icons/foundation-icons.css">
    <link rel='stylesheet' href='assets/plugin/lightbox/stylesheets/jquery.lighter.css'>
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- scripts -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/plugin/imgselect/js/jquery.imgareaselect.pack.js"></script>
    <script type='text/javascript' src='assets/plugin/lightbox/javascripts/jquery.lighter.js'></script>
    <script type="text/javascript" src="assets/plugin/imgselect/js/script.js"></script>
</head>

<body>
    <div class="container">

        <a href="index.php"><button type="button" class="btn btn-default"> <i class="fi-arrow-left"></i> ย้อนกลับ</button></a>

        <h1>Step 1</h1>

        <?php
        if (!empty($_GET['id'])) {
            $strSQL = "SELECT * FROM block WHERE id='" . $_GET['id'] . "'";
            $result = mysql_query($strSQL) or die(mysql_error());
            $row = mysql_fetch_array($result);
        }
        ?>

        <form class="form-horizontal" action="<?php echo !empty($row['id']) ? 'editblock.php' : 'insertblock.php'; ?>" method="post">

            <?php
            if (!empty($_GET['id'])) {
                echo "<input type='hidden' name='id' value='$row[id]'>";
            }
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">หัวเรื่อง</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="<?php echo @$row['title']; ?>" placeholder="หัวเรื่อง">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">รายละเอียด</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="detail" placeholder="รายละเอียด"><?php echo @$row['detail']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"><?php echo !empty($row['id']) ? "แก้ไขข้อมูล" : "บันทึก"; ?></button>
                </div>
            </div>
        </form>


        <?php

        if (!empty($row['id'])) {
            $strSQL = "SELECT * FROM block_photo WHERE block_id='" . $row['id'] . "'";
            $result = mysql_query($strSQL) or die(mysql_error());
            $numsrow = mysql_num_rows($result);

        ?>
            <h1>Step 2</h1>

            <hr>

            <form method="post" action="sort.php?id=<?php echo $_GET['id']; ?>">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="100">#</th>
                            <th width="100">รูปภาพ</th>
                            <th width="100">รูปภาพ</th>
                            <th width="300">File</th>
                            <th width="150">ตำแหน่ง</th>
                            <th width="100" class='text-right'>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        for ($i = 1; $i <= 15; $i++) {
                            $strSQL = "SELECT * FROM block_photo WHERE block_id='" . $id . "' and img_id='" . $i . "'";
                            $result = mysql_query($strSQL) or die(mysql_error());
                            //   while ($row = mysql_fetch_array($result)) {
                            $row = mysql_fetch_array($result);
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td><a data-height='720' data-lighter='" . $img[$i] . "' data-width='1280' href='" . $img[$i] . "'><img src='" . $img[$i] . "' width=80></td>";
                            echo "<td><a data-height='720' data-lighter='" . $row['name'] . "' data-width='1280' href='" . $row['name'] . "'><img src='" . $row['name'] . "' width=80></td>";
                        ?>
                            <td>
                                <? if ($i <= 3 || $i == 14) { ?>
                                    <a href="addimg.php?id=<?= $id; ?>&mid=<?= $i; ?>&type=3x4"> เพิ่มรูปภาพ</a>
                                <? } else { ?>
                                    <a href="addimg.php?id=<?= $id; ?>&mid=<?= $i; ?>&type=4x3"> เพิ่มรูปภาพ</a>
                                <? } ?>
                            </td>
                            <td><?= $dan[$i]; ?></td>
                            <td class='text-right'><a href="?act=delimg&id=<?= $id; ?>&mid=<?= $i; ?>&img_name=<?= $row['name']; ?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')"><i class='fi-x'></i></a></td>

                        <?
                            echo "</tr>";
                            // $i++;
                        }
                        ?>

                    </tbody>
                </table>
                <table width="100%">
                    <tr>
                    </tr>
                </table>
            </form>
            <br>
        <?php
        }
        ?>
        <!--wrap-->
    </div>
</body>

</html>