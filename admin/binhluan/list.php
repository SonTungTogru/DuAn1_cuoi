<div class="row">
        <div class="row frmtitle"><h1>Danh sách loại khach hàng</h1></div>
        <div class="row frmcontent">
          <form action="#" method="post">
            <div class="row mb10 frmdsloai">
              <table>
                <tr>
                  <th>Chọn</th>
                  <th>ID</th>
                  <th>Nội Dung</th>
                  <th>ID User</th>
                  <th>ID Sản Phẩm</th>
                  <th>Ngày Bình Luận</th>
                  <th>Thao tác</th>
                </tr>
                <?php 
                // do danh mục là mảng nên ta đọc dữ liệu là foreach
                foreach ($listbinhluan as $binhluan) {
                    // show dữ liệu ra
                    extract($binhluan);
                    // sửa bl
                    $suabl='index.php?act=suabl&id='.$id;
                    $xoabl='index.php?act=xoabl&id='.$id;

                    echo '<tr>
                  <td><input type="checkbox" name="" id="" /></td>
                  <td>'.$id.'</td>
                  <td>'.$noidung.'</td>
                  <td>'.$iduser.'</td>
                  <td>'.$idpro.'</td>
                  <td>'.$ngaybinhluan.'</td>
                  <td>
                   <a href="'.$suabl.'"><input type="button" value="&#9997;"/></a> 
                   <a href="'.$xoabl.'"> <input type="button" value="&#10006;"/></a>
                  </td>
                </tr>';
                }
                ?>
                
                
              </table>
            </div>
            <div class="row mb10">
              <input type="button" value="Chọn tất cả" />
              <input type="button" value="Bỏ chọn tất cả" />
              <input type="button" value="Xóa các mục đã chọn" />
            </div>
          </form>
        </div>
      </div>