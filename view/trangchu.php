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
</style>
<?php
include "slider.php";
?>
<div class="content_trangchu_sp">
    <?php 
    include "boxcate.php";
    ?>

    <div class="boxright">
        <div class="kind_pro">
            <div class="title">
                <p>Sản phẩm mới</p>
            </div>
            <div class="items container">
                <div class="select-wrapper">
                <select id="filterSelect" aria-label="Disabled select example" onchange="filterByPrice()">
                    <option selected value="">Tùy Chọn</option>
                    <option value="asc">Từ thấp đến cao</option>
                    <option value="desc">Từ cao đến thấp</option>
                </select>
                <br> <br>
</div>
                <div class="product">
                    <?php 
                    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

                    // Sắp xếp mảng sản phẩm theo giá
                    if ($sort === 'asc') {
                        usort($loadsp, function ($a, $b) {
                            return $a['price'] - $b['price'];
                        });
                    } elseif ($sort === 'desc') {
                        usort($loadsp, function ($a, $b) {
                            return $b['price'] - $a['price'];
                        });
                    }

                    foreach ($loadsp as $sanpham) {
                        $link = "index.php?act=sanphamct&id=".$sanpham['id'];
                        $hinh = $img_path.$sanpham['img'];
                    ?>
                        <div class="box_pro">
                            <div class="img_pro">
                                <a href="<?=$link?>">
                                    <img src="<?=$hinh?>" alt="">
                                </a>
                                <div class="sm_img">
                                    <img src="assets/images/Asset_4.png" alt="">
                                </div>
                            </div>
                            <div class="remote">
                                <div class="rm"><a href="<?=$link?>"><?=$sanpham['namepro']?></a></div>
<div class="price flex_c">
                                    <p><?=$sanpham['price']?><u>đ</u></p>
                                    <?php if ($sanpham['discount'] > 0) {
                                        echo '
                                            <div class="old_price">
                                                <del>'.$sanpham['discount'].'đ</del>
                                            </div>
                                        ';
                                    }
                                    ?>
                                </div>
                                <form action="index.php?act=addgiohang" method="post">
                                    <input type="hidden" name="idpro" value="<?=$sanpham['id']?>">
                                    <input type="hidden" name="img" value="<?=$sanpham['img']?>">
                                    <input type="hidden" name="namepro" value="<?=$sanpham['namepro']?>">
                                    <input type="hidden" name="price" value="<?=$sanpham['price']?>">
                                    <input type="hidden" name="discount" value="<?=$sanpham['discount']?>">
                                    <input type="hidden" id="inputColor" name="mau" value="">
                                    <input type="hidden" id="inputSize" name="size" value="">
                                    <input type="hidden" id="amount-hd" name="soluong" value="1">
                                    <input style="width: 100%;" type="submit" name="addgiohang" value="Thêm vào giỏ hàng">
                                </form>
                            </div>
                        </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="kind_pro">
            <div class="title">
                <p>Sản phẩm nổi bật</p>
            </div>
            <div class="product">
                <?php foreach($listspnb as $spnb) {
                    extract($spnb);
                    $link = "index.php?act=sanphamct&id=".$id;
                ?>
                    <div class="box_pro">
                        <div class="img_pro">
                            <a href="<?=$link?>">
                                <img src="<?=$img_path.$img?>"alt="">
                            </a>
                            <div class="sm_img">
                                <img src="assets/images/Asset_4.png" alt="">
                            </div>
                        </div>
                        <div class="remote">
                            <div class="rm"><a href="<?=$link?>"><?=$namepro?></a></div>
                            <div class="price flex_c">
                                <p><?=$price?><u>đ</u></p>
                                <?php if ($discount > 0) {
                                    echo '
<div class="old_price">
                                            <del>'.$discount.'đ</del>
                                        </div>
                                    ';
                                }
                                ?>
                            </div>
                            <form action="index.php?act=addgiohang" method="post">
                                <input type="hidden" name="idpro" value="<?=$id?>">
                                <input type="hidden" name="img" value="<?=$img?>">
                                <input type="hidden" name="namepro" value="<?=$namepro?>">
                                <input type="hidden" name="price" value="<?=$price?>">
                                <input type="hidden" name="discount" value="<?=$discount?>">
                                <input type="hidden" id="inputColor" name="mau" value="">
                                <input type="hidden" id="inputSize" name="size" value="">
                                <input type="hidden" id="amount-hd" name="soluong" value="1">
                                <input style="width: 100%;" type="submit" name="addgiohang" value="Thêm vào giỏ hàng">
                            </form>
                        </div>
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