<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Kiểm tra nếu có trường nào bị bỏ trống
    if (empty($fullname) || empty($email) || empty($phone) || empty($message)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit;
    }

    // Cấu hình email
    $to = "your-email@example.com"; // Thay đổi địa chỉ email của bạn
    $subject = "Liên hệ mới từ $fullname";
    $body = "Thông tin liên hệ:\n\n";
    $body .= "Họ tên: $fullname\n";
    $body .= "Email: $email\n";
    $body .= "Số điện thoại: $phone\n";
    $body .= "Nội dung:\n$message\n";
    
    $headers = "From: $email";

    // Gửi email
    if (mail($to, $subject, $body, $headers)) {
        echo "Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm.";
    } else {
        echo "Có lỗi xảy ra khi gửi thông tin. Vui lòng thử lại.";
    }
}
?>
