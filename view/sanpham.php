<style>
.select-wrapper {
    display: inline-block;
    position: relative;
}

.select-wrapper select {
    padding: 8px 40px 8px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    font-size: 16px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
}

.select-wrapper::after {
    content: '';
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 6px solid #666;
}

.select-wrapper select:focus {
    outline: none;
    border-color: #999;
}

.select-wrapper select option {
    background-color: #fff;
    color: #333;
}

.select-wrapper select option:checked {
    background-color: #f9f9f9;
}

.select-wrapper select::-ms-expand {
    display: none;
}

a {
    text-decoration: none;
    font-size: large;
}

.pagination {
    text-align: center;
    margin-top: 20px;
}

.pagination-list {
    list-style: none;
    padding: 0;
    display: inline-block;
}

.pagination-item {
    display: inline-block;
    margin: 0 5px;
}

.pagination-link {
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #333;
    text-decoration: none;
}

.pagination-link:hover,
.pagination-link.active {
    background-color: #f9f9f9;
    color: #333;
}

.pagination-link.active {
    font-weight: bold;
    background-color: #666;
    color: #fff;
}



</style>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webbangiay";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$productsPerPage = 6;

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $productsPerPage;

$sql = "SELECT * FROM sanpham LIMIT $offset, $productsPerPage";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalProducts = $conn->query('SELECT COUNT(*) FROM sanpham')->fetchColumn();
$totalPages = ceil($totalProducts / $productsPerPage);
?>

<?php include "slider.php"; ?>
<div class="content_trangchu_sp">
    <?php include "boxcate.php"; ?>

    <div class="boxright">
        <div class="kind_pro">
            <div class="title">
                <p>Sản phẩm</p>
            </div>

            <div class="items container">
                <div class="select-wrapper">
                    <select id="filterSelect" aria-label="Disabled select example" onchange="filterByPrice()">
                        <option selected value="">Giá......</option>
                        <option value="asc">Từ thấp đến cao</option>
                        <option value="desc">Từ cao đến thấp</option>
                    </select>
                </div>

                <div class="product">
                    <?php
                    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

                    // Sắp xếp mảng sản phẩm theo giá
                    if ($sort === 'asc') {
                        usort($dssp, function ($a, $b) {
                            return $a['price'] - $b['price'];
                        });
                    } elseif ($sort === 'desc') {
                        usort($dssp, function ($a, $b) {
                            return $b['price'] - $a['price'];
                        });
                    }
                    foreach ($dssp as $sanpham) {
                        extract($sanpham);
                        $link = "index.php?act=sanphamct&id=" . $id;
                    ?>
                        <div class="box_pro">
                            <div class="img_pro">
                                <a href="<?= $link ?>">
                                    <img src="<?= $img_path . $img ?>">
                                </a>
                            </div>
                            <div class="remote">
                                <div class="rm"><a href="<?= $link ?>"><?= $namepro ?></a></div>
                                <div class="price flex_c">
                                    <p><?= $price ?><u>đ</u></p>
                                    <?php if ($discount > 0) {
                                        echo '<div class="old_price"><del>' . $discount . 'đ</del></div>';
                                    }
                                    ?>
                                </div>
                                <a href="index.php?act=addgiohang">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php if ($totalPages > 1) { ?>
                    <div class="pagination">
                        <ul class="pagination-list">
                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <li class="pagination-item">
                                    <a href='index.php?act=sanpham&page=<?= $i ?>' class="pagination-link"><?= $i ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    function filterByPrice() {
        var selectBox = document.getElementById("filterSelect");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var currentUrl = window.location.href;

        var url = new URL(currentUrl);
        var searchParams = new URLSearchParams(url.search);

        searchParams.set('sort', selectedValue);

        url.search = searchParams.toString();
        var newUrl = url.toString();

        window.location.href = newUrl;
    }
</script>
