<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
// load bình luận theo idpro
$dsbl = loadall_binhluan($idpro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
.binhluan table {
  width: 90%;
  margin-left: 5%;
  border-collapse: collapse;
  background-color: #f5f5f5;
}

.binhluan table th,
.binhluan table td {
  padding: 10px;
  border: 1px solid #ddd;
}

.binhluan table th {
  background-color: #e0e0e0;
  font-weight: bold;
}

.binhluan table td:nth-last-child(1) {
  width: 50%;
}

.binhluan table td:nth-last-child(2) {
  width: 30%;
}

.binhluan table td:nth-last-child(3) {
  width: 70%;
}

.boxtitle {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #4caf50;
  color: white;
  padding: 10px;
  border-radius: 5px;
}

.boxtitle h1 {
  font-size: 24px;
  font-weight: bold;
}

.binhluanform {
  margin-top: 10px;
  padding: 10px;
  background-color: #f5f5f5;
  border-radius: 5px;
}

.binhluanform input[type="text"] {
  width: 70%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.binhluan .user-avatar {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  margin-right: 5px;
  background-color: #ddd; /* Placeholder color for avatar */
}

.binhluan table td:nth-last-child(2) {
  display: flex;
  align-items: center;
}
.binhluanform {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
  background-color: #f5f5f5;
  border-radius: 5px;
}

.binhluanform input {
  width: 70%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
}

.binhluanform button {
  padding: 10px 15px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.binhluanform button:hover {
  background-color: #3e8e41;
}

.binhluanform .icon {
  margin-right: 5px;
}


    </style>
</head>

<body>



    <div class="row mb">
        <div class="boxtitle">Bình luận</div>
    
    <div class="boxcontent2 binhluan">
    <table>
    <td>Nội dung</td>
    <td>ID </td>
    <td>Ngày Bình Luận</td>
    </table>
    </div>
        <div class="boxcontent2 binhluan">
            <table>
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>
        ' . $noidung . '
        </td>';
        echo '<td>
        ' . $iduser . '
        </td>';
        echo '<td>
        ' . $ngaybinhluan . '
        </td></tr>';
                }
                ?>
            </table>
        </div>
        <div class="boxfooter binhluanform">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <!-- ipt hidden đểlưu id và form -->
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung">
                <input type="submit" name="guibinhluan" value="Gửi bình luận">
            </form>
        </div>
        <?php
        // kieerm tra nut guibinhluan có tồn tại và click hay không
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('h:i:sa d/m/y');
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
        //    sau khi thức thi xong thì trở về trang hiện tại của mình
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>

    </div>

</body>

</html>