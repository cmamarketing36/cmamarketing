<?php
// send.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "cmamarketing36@gmail.com"; // الإيميل اللي هيجيلك عليه الرسالة
    $subject = "New Contact Form Submission";

    // حماية من الأكواد الضارة
    $name = htmlspecialchars(trim($_POST["name"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // تحضير الهيدر
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // تحضير جسم الرسالة
    $body = "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // محاولة إرسال الرسالة
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
} else {
    // لو حد دخل الصفحة على طول بدون POST
    echo "Invalid Request.";
}
?>