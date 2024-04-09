<?php

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/color_size.php";
include "../model/binhluan.php";
include "../model/taikhoan.php";
include "../model/thongke.php";
include "../model/giohang.php";
include "header.php";

//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        //danh mục
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tendm = $_POST['tendm'];
                insert_danhmuc($tendm);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            if (isset($_POST['block'], $_GET['id'])) {
                update_status_dm0($_GET['id']);
            } elseif (isset($_POST['active'], $_GET['id'])) {
                update_status_dm1($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $namedm = $_POST['tendm'];
                update_danhmuc($id, $namedm);
                $thongbao = "Cập nhật thành công";
            } else {
                $thongbao = "Cập nhật không thành công";
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        //tài khoản
        case 'addtk':   
            include "taikhoan/add.php";
            break;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();

            include "taikhoan/list.php";
            break;
        case 'xoatk':
            $id = $_GET['id'];
            delete_taikhoan($id);
            $sql = "delete from taikhoan where id=" . $id;
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'updatetk':
            include "taikhoan/list.php.php";
            break;

        //sản phẩm
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $namepro = $_POST['namepro'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $mota = $_POST['mota'];
                $img = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                    echo "Tải hình Thành công";
                } else {
                    echo "Thất bại";
                }
                if (empty($discount)) {
                    $discount = 0;
                }
                insert_sanpham($namepro, $price, $discount, $img, $mota, $iddm);
                $thongbao = "Thêm thành công";
            }
            $listdm = loadall_danhmuc();
            include "sanpham/add.php";
            break;
            case 'addmau_size':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $size = $_POST['size']; // Giữ lại chỉ thay $color thành $size
                    if (!empty($size)) { // Chỉ kiểm tra kích thước, loại bỏ phần kiểm tra về màu
                        insert_size($size);
                        $thongbao = "Thêm thành công";
                    } else {
                        $thongbao = "Dữ liệu không được để trống";
                    }
                }
                include "color_size/addcolor_size.php";
                break;
        case 'listms':
            $list_s = loadall_size();
            include "color_size/listcolor_size.php";
            break;
        case 'suasize':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $size = loadone_size($_GET['id']);
            }
            include "color_size/update_s.php";
            break;
        case 'updatesize':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $sosize = $_POST['size'];
                update_size($id, $sosize);
                $thongbao = "Cập nhật thành công";
            }
            $list_s = loadall_size();
            include "color_size/listcolor_size.php";
            break;
        case 'listsp':
            
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            if (isset($_POST['block'], $_GET['id'])) {
                update_status_sp0($_GET['id']);
            } elseif (isset($_POST['active'], $_GET['id'])) {
                update_status_sp1($_GET['id']);
            }
            $listsp = loadall_sanpham_admin();
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanphamseach($kyw, $iddm);
            include "sanpham/list.php";
            break;

            
        // Sản phẩm biến thể
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $pro = loadone_sanpham($_GET['id']);
            }
            $list_s = loadall_size();
            $listdm = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $namepro = $_POST['namepro'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                } else {
                }
                update_sanpham($id, $iddm, $namepro, $price, $discount, $hinh, $mota);
                $thongbao = "Cập nhật thành công";
            }
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $idpro = $_POST['id'];
                $idsize = $_POST['idsize'];
                $soluong = $_POST['soluong'];
                insertOrUpdate_spbt($idpro, $idsize, $soluong);
            }
            $list_s = loadall_size();
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham_admin();
            include "sanpham/list.php";
            break;

        //binhluan
        case 'dsbl':
            if (isset($_POST['block'], $_GET['id'])) {
                update_status_bl0($_GET['id']);
            } elseif (isset($_POST['active'], $_GET['id'])) {
                update_status_bl1($_GET['id']);
            }
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
            case "xoabl":
                // ktra id có tồn ại hay khôngg
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_binhluan($_GET['id']);
                }
            include "binhluan/list.php";
            break;

        // thống kê sản phẩm
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'thongkespngay':
            $tksp_ngay = thongkesp_ngay();
            include "thongke/thongkespngay.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'bieudongay':
            $tksp_ngay = thongke_sp_ngay();
            include "thongke/bieudongay.php";
            break;

        // đơn hàng
        case 'donhang':
            $listbill = loadall_bill_admin();
            include "donhang/list.php";
            break;
        case 'billct':
            $idkh = loadallid_kh();
            $listbill = loadall_bill_admin();
            foreach ($idkh as $kh) {
                $keybill = loadid_bill($kh['id']);
            
                foreach ($keybill as $key) {
                    extract($key);
            
                    if (isset($_GET['idbill']) && $_GET['idbill'] == $key['id']) {
                        $loadall_cart = loadall_cart($_GET['idbill'], $key['id']);
                        foreach($loadall_cart as $cart) {
                            extract($cart);
                        }
                    }
                }
            }

            include "donhang/chitietbillkh.php";
            break;
        case 'updatettbill':
            if(isset($_POST['xacnhan']) && isset($_POST['idbill'])) {
                $idbill = $_POST['idbill'];
                update_status_bill($idbill, 1);
            }
            if(isset($_POST['xacnhangiao']) && isset($_POST['idbill'])) {
                $idbill = $_POST['idbill'];
                update_status_bill($idbill, 2);
            }
            if(isset($_POST['hoanthanhgiao']) && isset($_POST['idbill'])) {
                $idbill = $_POST['idbill'];
                update_status_bill($idbill, 3);
            }
            $listbill = loadall_bill_admin();
            include "donhang/list.php";
            break;
        case 'listdonhang':
            if(isset($_POST['dangxuly'])) {
                $listbill = loadall_bill_admin(1);
            } else if (isset($_POST['danggiao'])) {
                $listbill = loadall_bill_admin(2);
            } else if (isset($_POST['hoanthanh'])) {
                $listbill = loadall_bill_admin(3);
            } else {
                $listbill = loadall_bill_admin();
            }
            $thongbao = "Chưa có đơn hàng nào!";
            include "donhang/list.php";
            break;
            
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";

