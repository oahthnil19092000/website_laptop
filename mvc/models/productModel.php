<?php
class productModel extends DB
{
    //lấy tất cả sản phẩm theo mới nhất
    public function selectNewest()
    {
        $qr = "SELECT * FROM `san pham` WHERE `tinh trang` = '1' ORDER BY `ma sp` DESC";
        $stmt = $this->conn->query($qr);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy tất cả sản phẩm theo mới nhất
    public function selectOldest()
    {
        $qr = "SELECT * FROM `san pham` WHERE `tinh trang` = '1' ORDER BY `ma sp` ASC";
        $stmt = $this->conn->query($qr);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy sản phẩm có mã sp = product_id
    public function selectWithID($product_id)
    {
        $qr = "SELECT * FROM `san pham` WHERE `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
        return $data[0];
        else return null;
    }
    //lấy các sản phẩm có mã loại sp = category_id
    public function selectWithCategoryID($category_id)
    {
        $qr = "SELECT * FROM `san pham` WHERE `ma loai sp` = ? AND `tinh trang` = ?  ORDER BY `ma sp` DESC";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$category_id, 1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy các sản phẩm có mã bao hanh = insurance_id
    public function selectWithInsuranceID($insurance_id)
    {
        $qr = "SELECT * FROM `san pham` WHERE `ma bao hanh` = ? AND `tinh trang` = ?  ORDER BY `ma sp` DESC";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$insurance_id, 1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    //đếm số sản phẩm có mã bao hanh = insurance_id
    public function countWithInsuranceID($insurance_id)
    {
        $qr = "SELECT * FROM `san pham` WHERE `ma bao hanh` = ? AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$insurance_id, 1]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return count($data);
        else return 0;
    }
    //đếm số sản phẩm có mã loại sp = category_id
    public function countWithCategoryID($category_id)
    {
        $qr = "SELECT * FROM `san pham` WHERE `ma loai sp` = ? AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$category_id, 1]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return count($data);
        else return 0;
    }
    //lấy các sản phẩm nằm trong khoảng giá min <= sp <= max
    public function selectWithPrice($min, $max)
    {
        $qr = "SELECT * FROM `san pham` WHERE ( `gia sp` BETWEEN ? AND ? ) AND `tinh trang` = ? ";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$min, $max, 1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy tất cả sản phẩm theo giá tăng dần ( từ thấp đến cao)
    public function selectPriceUp()
    {
        $qr = "SELECT * FROM `san pham` AND `tinh trang` = ?  ORDER BY `gia sp` ASC";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy tất cả sản phẩm theo giá giảm dần ( từ cao đến thấp)
    public function selectPriceDown()
    {
        $qr = "SELECT * FROM `san pham` AND `tinh trang` = ?  ORDER BY `gia sp` DESC";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy tất cả sản phẩm có tên sp liên quan tới name
    // ví dụ name = Laptop MSI GF63-8RD
    // sẽ tìm các sản phẩm có chứa chữ "Laptop" hoặc "MSI" hoặc "GF63-8RD trong tên rồi sort(sắp xếp theo mức độ liên quan [chứa càng nhiều chử thì độ liên quan càng cao]) 
    public function searchWithName($name)
    {
        $text = $name;
        //tách chuỗi cần tìm thành 1 mảng các chữ lẻ và kèm % vào 2 bên chữ ( ví dụ : A B C -> ["%A%","%B%","%C%"] ) nhờ hàm explode()
        $name = '%' . str_replace(' ', '% %', trim($name)) . '%';
        $product_name = explode(" ", $name);
        $qr = "SELECT * FROM `san pham` WHERE ( `ten sp` LIKE ? ";
        for ($i = 1; $i < count($product_name); $i++) {
            $qr .= "OR `ten sp` LIKE ? ";
        }
        $qr .= ") AND`tinh trang` = ? ";
        $product_name[] = 1;
        $stmt = $this->conn->prepare($qr);
        $stmt->execute($product_name);
        $data = $stmt->fetchAll();
        // tạo 1 mảng mark độ dài bằng số lượng sản phẩm
        for ($i = 0; $i < count($data); $i++) {
            $mark[] = 0;
        }
        // dùng for để kiểm tra nếu tên của sản phẩm có chữ cần tìm kiếm thì mark của sp đó += 1 (++)
        $search = explode(' ', $text);
        for ($z = count($search); $z >= 1; $z--) {
            if ($z != 1) {
                for ($i = 0; $i < $z; $i++) {
                    $string[] = $search[$i];
                }
                $a = implode(' ', $string);
                unset($string);
                if(!empty($data))
                for ($i = 0; $i < count($data); $i++) {
                    if (strpos(" " . $data[$i]['ten sp'], $a)) {
                        $mark[$i] += 1;
                    }
                }
            } else {
                for ($j = 0; $j < count($search); $j++) {
                    if(!empty($data))
                    for ($i = 0; $i < count($data); $i++) {
                        if (strpos(" " . $data[$i]['ten sp'], $search[$j])) {
                            $mark[$i]++;
                        }
                    }
                }
            }
        }
        // sắp xếp mãng chứa sp lại theo mảng dữ liệu mark 
        if(isset($mark))
        for ($i = 0; $i < count($mark); $i++) {
            for ($j = count($mark) - 1; $j > $i; $j--) {
                if ($mark[$j] > $mark[$j - 1]) {
                    $tmp1 = $data[$j - 1];
                    $data[$j - 1] = $data[$j];
                    $data[$j] = $tmp1;
                    $tmp = $mark[$j - 1];
                    $mark[$j - 1] = $mark[$j];
                    $mark[$j] = $tmp;
                }
            }
        }
        return $data;
    }
    // có tồn tại sản phẩm có mã sp = product_id
    public function existWithID($product_id)
    {
        $qr = "SELECT * FROM `san pham` WHERE `ma sp` = ? AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id, 1]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return true;
        else return false;
    }
    // có tồn tại sản phẩm có ten sp = product_name
    public function exist($product_name)
    {
        $qr = "SELECT * FROM `san pham` WHERE `ten sp` = ? AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_name, 1]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return true;
        else return false;
    }
    // them sản phẩm sản phẩm nếu tên sản phẩm đó tồn tại rồi thì k thêm mà trả về false
    public function insert($product_name, $product_price, $product_description, $product_image, $category_id, $insurance_id)
    {
        if (!$this->exist($product_name)) {
            $qr = "INSERT INTO `san pham`(`ten sp`, `gia sp`, `mo ta san pham`, `hinh anh`, `ma loai sp`, `ma bao hanh`, `tinh trang`) VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_name, $product_price, $product_description, $product_image, $category_id, $insurance_id, 1]);
            $stmt = $this->conn->query("SELECT * FROM `san pham` ORDER BY `ma sp` DESC LIMIT 1;");
            $lastId = $stmt->fetchAll()[0]['ma sp'];
            return $lastId;
        } else return false;
    }
    // sửa sản phẩm sản phẩm nếu mã sản phẩm đó không tồn tại thì k update mà trả về false
    public function update($product_id, $product_name, $product_price, $product_description, $category_id, $insurance_id)
    {
        if ($this->existWithID($product_id)) {
            $qr = "UPDATE `san pham` SET `ten sp`=?,`gia sp`=?,`mo ta san pham`=?,`ma loai sp`=?,`ma bao hanh`=? WHERE `ma sp`=?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_name, $product_price, $product_description, $category_id, $insurance_id, $product_id]);
            return true;
        } else return false;
    }
    // xóa sản phẩm sản phẩm nếu mã sản phẩm đó không tồn tại thì k xóa mà trả về false
    public function delete($product_id)
    {
        if ($this->existWithID($product_id)) {
            $qr = "UPDATE `san pham` SET `tinh trang`=? WHERE `ma sp`=?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([0, $product_id]);
            return true;
        } else return false;
    }
}