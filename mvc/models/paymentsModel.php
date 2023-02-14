<?php
// test sau tết
class paymentsModel extends DB{
    // lấy thông tin thanh toán
    function select($order_id)
    {
        //
        // query sql (Câu lệnh truy vấn sql) dữ liệu cần điền thay bằng ?
        // $qr1 = "SELECT * FROM `payments` WHERE `order_id` = '".$order_id."'";
        
        $qr = "SELECT * FROM `payments` WHERE `order_id` = ?";

        // con bên class DB để đã khai báo để truy vấn
        // có thể dùng phương thức  
        //(function) ->query [truy vấn trực tiếp] { không có dấu ? mà là dữ liệu luôn} 
        //(function) ->prepare [truy vấn gián tiếp] { có dấu ? và thêm dữ liệu thông qua excute} 
        // $stmt = $this->con->query($qr1);

        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$order_id]);
        // hiểu không hiểu ok
        // rồi lấy ra tất cả thì fetchAll (lấy tất cả các hàng các cột sau khi chạy lệnh)

        $data = $stmt->fetchAll();
        // lỗi tui dùng nhằm DB thường
        // cái kia là PDO 
        //  nếu k trống thì trả về dữ liệu kiểu string json
            return $data;
        // ngược lại thì trống không có dữ liệu
        //còn kịp không ạ  để nghiệm cái 5s haha     ok ủa nảy lỗi ời sửa lại sao dạ 
        // nãy là lỗi dùng khai báo hàm kiểu cũ, là dùng kiểu mà hk trước làm á
        // mà cái này là sài kiểu mới PDO nên khai báo lại thôi
        // nghiệm đi rồi làm 2 cái dưới chắc hiểu hiểu r ạ hiểu thì làm thử 2 cái dưới nè 
        //có gợi í miếng nào hk :)))
        // cái dưới thì order id dô có dữ liệu thì return true không có thì false
        // là nó giống cái trên mà return thì khác thui phải hông ta đúng vại

        // thấy có dì đó sai sai :)))
        // sai ở đâu tự nhiên cai return true là nó sai sai :))
        // này kiểm tra là cái bill này nó có thanh toán chưa
        // thanh toán rồi thì nó có dữ liệu 
        // nên return true
        // còn chưa thanh toán bằng vnpay thì nó k có dữ liệu
        // nên return false thôi
        // bớt sai chưa :)) ai biết ò :))) kiểu mình làm ra nhiều hàm cho nữa xử lý đơn giản hơn á
        // thay vì mình dùng cái hàm select ở trên thì mình dùng biết là thanh toán chưa nhưng bên kia phải
        //if(gọi cái hàm == "") {
            // xử lý thì này sẽ gọn hơn
        // }
        // rồi còn 1 hàm ở dưới kìa
    }
    // kiểm tra có thanh toán bằng VNPay k
    function exist($order_id)
    {
        $qr = "SELECT * FROM `payments` WHERE `order_id` = ?" ;
        $stmt = $this->conn->prepare($qr);
        $stmt -> execute([$order_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else false;
    } 
    //thêm thanh toán
    //này là có insert bên kia nè :))
    // giỏi ời á rồi nó cần dữ liệu dô thì truyền dữ liêu đó do cho hàm
    // ời này truyền cái nào :))
    //`order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`
    // trừ time và id k cần truyền còn lại thì cần hết
    // time k cần truyền vô là do có hàm date để tạo ra á, nhưng mà mình vẫn để dô chỗ qr còn cái truyền thì kh cần um
    // date("Y-m-d") (date)
    // date("Y-m-d H:i:s") (datetime)
    // còn id sql nó có tự điền
    // tiếp đi ạ
    //nó quánh lộn mà tui tưởng dụ dì uilatr:)) :')
    // ời sao nữa á
    // truyền dữ liệu dô qr chưa
    // rồi nếu bình thường dị là được rồi á
    // mà để đúng hơn thì nên thêm cái exsit dô để không bị trùng
    // kịp hong kịp
    // xong r á
    function insert($order_id, $thanh_vien, $money, $note, $vnp_response_code, $code_vnpay, $code_bank){
        if(!$this->exist($order_id)){
            $qr = "INSERT INTO `payments`(`order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($qr);
            $stmt ->execute([$order_id, $thanh_vien, $money, $note, $vnp_response_code, $code_vnpay, $code_bank, date("Y-m-d H:i:s")]);
            $data = $stmt->fetchAll();
            return true;
        } else return false;

    }
}