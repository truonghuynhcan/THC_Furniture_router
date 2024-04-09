<?php
//  use App\model\sanpham;
$records = 5;
$pages = 0;
$page = 1;
if (isset($_REQUEST['txtPage'])) {
    $page = $_REQUEST['txtPage'];
}
$sps = new App\model\sanpham();
$listitems = $sps->getdata();
$mode = count($listitems) % $records;
if ($mode > 0) {
    $pages = (count($listitems) - $mode) / $records + 1;
} else {
    $pages = count($listitems) / $records;
}
if ($page > $pages) {
    $page = 1;
}
$limits = $records * $page;
$st = $limits - $records;
$listitems = $sps->getdata_limit($st, $records);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paging</title>
    <link rel="stylesheet" href="../view/css/style.css">
    <script language=javascript>
        function fPageseparate(page) {
            document.adminForm.txtPage.value = page;
            document.adminForm.submit();
        }
    </script>
</head>

<body>
    <div class="bodyct">
        <form name="adminForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="txtPage" value="<?= $page ?>" />
            <input type="hidden" name="txtID" value="">
            <input type="hidden" name="txtidt" value="">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="main">
                <tr>
                    <?php
                    for ($i = 0; $i < count($listitems); $i++):
                        $rc = $listitems[$i];
                        ?>
                        <td>
                            <div class="sanpham">
                                <div><img height="60px" width="100px" src="/public/image/<?= $rc['image'] ?>">
                                </div>
                                <p>
                                    <?= $rc['Name'] ?>
                                </p>
                                <p>$<span>
                                        <?= $rc['Price'] ?>
                                    </span></p>
                                <lable hidden>
                                    <?= $rc['id_sp'] ?>
                                </lable><br>
                                <button><a href="/giohang?id=<?= $rc['id_sp'] ?>">Chọn
                                        Hàng</a></button>
                                <button><a href="/chitiet?id=<?= $rc['id_sp'] ?>">CTSP</a></button>
                            </div>
                        </td>
                    <?php endfor; ?>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>