<?php
class accountModel extends DB
{
    public function selectAll()
    {
        $qr = "SELECT * FROM `tai khoan` WHERE `tinh trang`='1'";
        $stmt = $this->conn->query($qr);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function selectOne($username)
    {
        $qr = "SELECT * FROM `tai khoan` WHERE `tinh trang`='1' AND `username` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function existWithUP($username, $password)
    {
        $qr = "SELECT * FROM `tai khoan` WHERE `tinh trang`='1' AND `username` = ? AND `password` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username, md5($password)]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return true;
        else return false;
    }
    public function existWithU($username)
    {
        $qr = "SELECT * FROM `tai khoan` WHERE `tinh trang`='1' AND `username` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return true;
        else return false;
    }
    public function existWithE($email)
    {
        $qr = "SELECT * FROM `tai khoan` WHERE `tinh trang`='1' AND `email` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$email]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return true;
        else return false;
    }
    public function insert($username, $password, $email)
    {
        if (!$this->existWithU($username)) {
            $qr = "INSERT INTO `tai khoan`(`username`, `password`, `email`, `tinh trang`) VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$username, md5($password), $email, 1]);
            return true;
        } else return false;
    }
    public function updateEmail($username, $email)
    {
        if ($this->existWithU($username)) {
            $qr = "UPDATE `tai khoan` SET `email`= ? WHERE `username`=?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$email, $username]);
            return true;
        } else return false;
    }
    public function updatePassword($username, $password)
    {
        if ($this->existWithU($username)) {
            $qr = "UPDATE `tai khoan` SET `password`= ? WHERE `username`=?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([md5($password), $username]);
            return true;
        } else return false;
    }
    public function delete($username)
    {
        if ($this->existWithU($username)) {
            $qr = "UPDATE `tai khoan` SET  `tinh trang`= ? WHERE `username`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([0, $username]);
            return true;
        } else return false;
    }
    public function sendMail($username)
    {
        $token = rand(100000, 999999);
        $to =$this->selectOne($username)['email'];
        $subject = "Mã xác nhận tài khoản";
        $message = '<font color="#000000" face="times new roman, serif" size="4">Chào bạn,</font><div><div style="line-height: 19px; white-space: pre;"><div style=""><font color="#000000" style="" face="times new roman, serif" size="4"><span style="background-color: rgb(255, 255, 255);">Đây&nbsp;là&nbsp;email&nbsp;giúp&nbsp;bạn&nbsp;lấy&nbsp;lại&nbsp;mật&nbsp;khẩu&nbsp;của&nbsp;mình.</span></font></div><div style=""><font face="times new roman, serif" style="" size="4"><font color="#000000" style="">M</font><font color="#000000" style="">ã&nbsp;xác&nbsp;thực&nbsp;của&nbsp;bạn&nbsp;là&nbsp;: </font><font color="#ff0000" style=""><b style="">'.$token.'</b></font></font></div><div style=""><div style="line-height: 19px;"><div style=""><span style="background-color: rgb(255, 255, 255);"><font color="#000000" style="" face="times new roman, serif" size="4">Mã&nbsp;này&nbsp;có&nbsp;thời&nbsp;hạn&nbsp;dùng&nbsp;là&nbsp;3&nbsp;phút.</font></span></div><div style=""><div style="line-height: 19px;"><div style=""><font color="#000000" style="background-color: rgb(255, 255, 255);" face="times new roman, serif" size="4">Rất&nbsp;vui&nbsp;vì&nbsp;được&nbsp;phục&nbsp;vụ&nbsp;bạn.</font></div></div><div style="font-size: small; white-space: normal;"><b style="color: rgb(0, 0, 0);"><font face="times new roman, serif">****************************</font></b></div><font face="times new roman, serif" color="#000000" style="font-size: small; white-space: normal;"><b>LAPTOP THAO LINH(LTL)</b></font><div style="font-size: small; white-space: normal;"><font size="1"><font face="times new roman, serif" color="#999999"><b>ĐỊA CHỈ:</b></font><font color="#444444"><b><font face="times new roman, serif">&nbsp;</font></b></font></font><span style="color: rgb(63, 60, 60); font-family: &quot;times new roman&quot;, serif; font-size: x-small;"><b>412, 30/4, Hưng Lợi, Ninh Kiều, Cần Thơ</b></span></div><div style="font-size: small; white-space: normal;"><font face="times new roman, serif" size="1" color="#999999"><b>SĐT</b></font><font face="times new roman, serif" size="1"><b><font color="#999999">:</font><span style="color: rgb(0, 0, 0);">&nbsp;</span></b></font><b style="font-family: &quot;times new roman&quot;, serif; font-size: x-small;"><font color="#000000">0359.348.111</font></b></div><div style="font-size: small; white-space: normal;"><font size="1"><b><font face="times new roman, serif" color="#999999">EMAIL:</font><font face="times new roman, serif">&nbsp;<a href="mailto:tamb1910291@student.ctu.edu.vn" target="_blank"><font color="#0000ff">linhb1805697@student.ctu.edu.vn</font></a></font></b></font></div><div style="font-size: small; white-space: normal;"><font face="times new roman, serif" size="1"><b><font color="#999999">FACEBOOK:</font>&nbsp;<a href="https://www.facebook.com/thaolinh.nguyenthi.12206" target="_blank"><font color="#0000ff">@NguyenThiThaoLinh</font></a></b></font></div></div></div></div></div></div>';
        $header  =  "From:Moblie Thao Linh\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html;charset=UTF-8\r\n";
        if (!mail($to, $subject, $message, $header)) {
            return 0;
        } else return $token;
    }
}