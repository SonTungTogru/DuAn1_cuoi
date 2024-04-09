<div class="content" style="min-height: 450px">
    <?php 
    $ct = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $img_path = "upload/" . $cart[1];
        echo '
            <div class="cart">
                <img src="' . $img_path . '" alt="">
                <div class="cartinfo">
                    <h1>' . $cart[2] . '</h1>
                    <div class="price">' . $cart[3] . ' đ</div>
                    <div class="option">
                        <span>SIZE: ' . $cart[5] . '</span> <!-- Hiển thị kích thước -->
                    </div>
                    
                    <form action="index.php?act=updategiohang" method="post" id="myForm_' . $ct . '_' . $cart[0] . '">
                        <input type="hidden" name="ct_value" value="' . $ct . '">
                        <input type="hidden" name="product_id" value="' . $cart[0] . '">
                        <input type="hidden" name="soluongmoi" id="amount-hidden" value="1" oninput="handleInput(' . $ct . ', ' . $cart[0] . ')">
                        <input type="hidden" name="size" value="' . $cart[5] . '"> <!-- Thêm trường input để lưu kích thước -->
                        <strong style="display: none;" id="displayQuantity"></strong>
                    </form>

                    <div class="remote_ct quantity-container">
                        <button class="decrease" onclick="decreaseQuantity(' . $ct . ', ' . $cart[0] . ')">-</button>
                        <input type="number" name="soluong" class="quantitybtn" value="' . $cart[6] . '">
                        <button class="increase" onclick="increaseQuantity(' . $ct . ', ' . $cart[0] . ')">+</button>
                    </div>
                </div>
                <div class="icon_canxel">
                    <a href="index.php?act=delcart&idcart=' . ($ct) . '"><i class="fa-solid fa-xmark"></i></a>
                </div>
            </div>  
        ';
        $ct += 1;
    }
    ?>
    <?php if ($_SESSION['mycart'] == []) {
        echo '
            <div class="h2cter">
                <h2 class="thongbao">Chưa có sản phẩm nào trong giỏ hàng</h2>
                <div class="btn_action">
                    <a href="index.php">
                        <input type="button" value="Tiếp tục mua hàng">
                    </a>
                </div>
            </div>
        ';
    } else {
        echo '
            <div class="btn_action">
                <a href="index.php?act=delall">
                    <input type="button" value="Xóa giỏ hàng">
                </a>
                <a href="index.php">
                    <input type="button" value="Tiếp tục mua hàng">
                </a>
                <a href="index.php?act=thanhtoan">
                    <input type="button" value="Mua ngay">
                </a>
            </div>
        ';
    }
    ?>
</div>

<script>
    var timeoutIds = [];

    function handleInput(ct, productId) {
        clearTimeout(timeoutIds[ct]);
        timeoutIds[ct] = setTimeout(function () {
            var form = document.getElementById("myForm_" + ct + '_' + productId);
            console.log("Handling input for product " + productId);
            // Lấy giá trị kích thước
            var sizeInput = document.querySelector('#myForm_' + ct + '_' + productId + ' [name="size"]');
            var size = sizeInput.value;
            // Lấy giá trị số lượng
            var quantityInput = document.querySelector('#myForm_' + ct + '_' + productId + ' [name="soluong"]');
            var quantity = quantityInput.value;
            // Gán giá trị kích thước và số lượng vào input
            form.querySelector('[name="size"]').value = size;
            form.querySelector('[name="soluongmoi"]').value = quantity;
            // Submit form
            form.submit();
            console.log("Form submitted!");
        }, 500);
    }

    function increaseQuantity(ct, productId) {
        var quantityInput = document.querySelector('#myForm_' + ct + '_' + productId + ' [name="soluong"]');
        quantityInput.value = parseInt(quantityInput.value) + 1;
        handleInput(ct, productId);
    }

    function decreaseQuantity(ct, productId) {
        var quantityInput = document.querySelector('#myForm_' + ct + '_' + productId + ' [name="soluong"]');
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            handleInput(ct, productId);
        }
    }

    function submitForm(ct, productId) {
        var form = document.getElementById("myForm_" + ct + '_' + productId);
        // Lấy giá trị kích thước
        var sizeInput = document.querySelector('#myForm_' + ct + '_' + productId + ' [name="size"]');
        var size = sizeInput.value;
        // Lấy giá trị số lượng
        var quantityInput = document.querySelector('#myForm_' + ct + '_' + productId + ' [name="soluong"]');
        var quantity = quantityInput.value;
        // Gán giá trị kích thước và số lượng vào input
        form.querySelector('[name="size"]').value = size;
        form.querySelector('[name="soluongmoi"]').value = quantity;
        // Submit form
        form.submit();
        console.log("Form submitted for product " + productId);
    }
</script>
