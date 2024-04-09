<div class="content">
    <div class="box_ct">
        <?php 
        foreach($spbt as $bienthe) {
            extract($bienthe); 
        }
            $hinh = "upload/";
        ?>
        <div class="box_img">
            <img src="<?=$hinh.$bienthe['img']?>" alt="">
        </div>
        <div class="boxinfo">
            <h1><?= $bienthe['namepro']?></h1>
            <div class="price">
                <div><?=$bienthe['price']?> đ</div>
            </div>
            <div class="size">
                <span>Chọn size: </span>
                <strong id="selectedSize"></strong>
                <div class="chose_size" id="sizeButtonsContainer">
                    <!-- Các nút kích thước sẽ được tạo và thêm vào đây bằng mã JavaScript -->
                </div>
            </div>
        </div>

        <div class="boxaddcart">
            <div class="quantity" id="result">
                <span>Chọn số lượng: </span>
                <strong id="displayQuantity"></strong>
            </div>
            <div class="remote_ct quantity-container">
                <button class="decrease"><i class="fa fa-minus"></i></button>
                <input type="text" name="soluong" class="quantitybtn" value="1">
                <button class="increase"><i class="fa fa-plus"></i></button>
                <div class="btn_gh_ct">
                    <form action="index.php?act=addgiohang" method="post">
                        <?php foreach($spbt as $giohang) {
                            extract($giohang);
                            echo '
                                    <input type="hidden" name="id" value="'.$giohang['mabt'].'">
                                    <input type="hidden" name="img" value="'.$giohang['img'].'">
                                    <input type="hidden" name="namepro" value="'.$giohang['namepro'].'">
                                    <input type="hidden" name="price" value="'.$giohang['price'].'">
                                    <input type="hidden" name="discount" value="'.$giohang['discount'].'">
                                    <input type="hidden" id="inputSize" name="size" value="">
                                    <input type="hidden" id="amount-hd" name="soluong" value="1">
                                    ';
                                }
                                ?>
                        <input style="width: 200px;" type="submit" name="addgiohang" value="Thêm vào giỏ hàng">
                    </form>
                </div>
                <form action="index.php?act=thanhtoan" method="post">
                    <?php foreach($spbt as $giohang) {
                        extract($giohang);
                        echo '
                                <input type="hidden" name="id" value="'.$giohang['mabt'].'">
                                <input type="hidden" name="img" value="'.$giohang['img'].'">
                                <input type="hidden" name="namepro" value="'.$giohang['namepro'].'">
                                <input type="hidden" name="price" value="'.$giohang['price'].'">
                                <input type="hidden" name="discount" value="'.$giohang['discount'].'">
                                <input type="hidden" id="inputSize" name="size" value="">
                                <input type="hidden" id="amount-hd" name="soluong" value="1">
                                ';
                            }
                            ?>
                    <input style="width: 200px;" type="submit" name="thanhtoan" value="Thanh toán">
                </form>
            </div>
            <div class="qua_bottom">
                Còn lại: <?php foreach($slbt as $sl){echo $sl['soluong'];}; ?> sản phẩm
            </div>
        </div>
    </div>
    <div class="h1ct float">
        <h1>Sản phẩm liên quan</h1>
    </div>
    <div class="kind_pro">
        <div class="productct">
            <?php foreach ($sanphamcl as $sp) {
                extract($sp);
                echo '
                    <div class="box_pro">
                        <div class="img_pro">
                            <a href="sanphamct.html">
                                <img src="'.$hinh.$img.'" alt="">
                            </a>
                        </div>
                        <div class="remote">
                            <a href="index.php?act=sanphamct">'.$namepro.'</a>
                            <div class="price">
                                <p>'.$price.'<u>đ</u></p>
                            </div>
                            <a href="index.php?act=addgiohang">
                                <input type="button" value="Thêm vào giỏ hàng">
                            </a>
                        </div>
                    </div>
                ';
            }
            ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Chuyển đổi dữ liệu PHP thành dữ liệu JavaScript
        const sizeData = <?php echo json_encode(array_unique(array_column($spbt, 'size'))); ?>;

        const sizeContainer = document.getElementById("sizeButtonsContainer");

        const selectedSizeElement = document.getElementById("selectedSize");

        function createButtons(container, data, selectedElement, clickCallback) {
            data.forEach(function(item) {
                const button = document.createElement("button");
                button.innerText = item;
                button.addEventListener("click", function() {
                    container.querySelectorAll("button").forEach(function(btn) {
                        btn.classList.remove("selected");
                    });

                    button.classList.add("selected");

                    selectedElement.innerText = item;
                    clickCallback(item);
                });
                container.appendChild(button);
            });
        }

        createButtons(sizeContainer, sizeData, selectedSizeElement, function(selectedSize) {
            // console.log("Selected size: " + selectedSize);
            // Đổ dữ liệu vào trường input có id là "inputSize"
            document.getElementById("inputSize").value = selectedSize;
        });
    });
</script>

<form action="">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#binhluan").load("view/binhluan/binhluan.php", {
                idpro: <?=$id?>
            });
        });
    </script>
    <div class="raw" id="binhluan"></div>
</form>
