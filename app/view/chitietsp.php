<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Chi tiet san pham</H1>

    <table>
    <tr>
        <td rowspan="5">
            <lable hidden><?=$sp[0]['id_sp'];?></lable>
            <img height="200px" width="300px" src="/public/image/<?=$sp[0]['image'];?>" />
        </td>
    </tr>
    <tr><td><?=$sp[0]['Name'];?></td></tr>
    <tr><td><?=$sp[0]['Price'];?></td></tr>

    <tr><td><input type="number" name="soluong" value="1" min="1"></td></tr>
    <tr><td><button><a href="/giohang?id=<?=$sp[0]['id_sp'];?>">Mua Hang</a></button></td></tr>
    <tr>
        <td>
        <?=$sp[0]['Decribe'];?>
        </td>
    </tr>
    </table>
</body>
</html>