<?php
//邮件发送
namespace application\home\models;


class SendMailModel
{
    public function sendmail($args)
    {
        //打开缓冲区
         ob_start();

        date_default_timezone_set('PRC');

        ignore_user_abort();

        set_time_limit(0);

        $interval = 60 * 1;
//        do {

            $mail = new \PHPMailer();
            $mail->SMTPDebug = 3;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.qq.com';
            $mail->SMTPSecure = 'ssl';
            //设置ssl连接smtp服务器的远程服务器端口号 可选465或587
            $mail->Port = 465;
            $mail->Hostname = 'localhost';
            $mail->CharSet = 'UTF-8';
            $mail->FromName = '啦啦啦';//发件人姓名
            $mail->Username = '616638133';//qq邮箱账号
            $mail->Password = 'wyrrlfpiesyubcfd';//qq邮箱客户端授权码
            $mail->From = '616638133@qq.com';
            $mail->isHTML(true);
            $mail->addAddress($args,'在线通知');
            $mail->Subject = '这是一个PHPMailer发送邮件的示例';
            $mail->Body = "这是一个<b style=\"color:red;\">PHPMailer</b>发送邮件的一个测试用例";
            //$mail->addAttachment('./src/20151002.png','test.png');
            $status = $mail->send();
            if ($status) {
//                echo '发送邮件成功' . date('Y-m-d H:i:s');
                return true;
            } else {
                return false;
//                echo '发送邮件失败，错误信息未：' . $mail->ErrorInfo;
            }
            sleep($interval);//休眠1minute
//        } while (true);
        //清除缓冲区中的内容
        ob_end_clean();
        //冲刷出（送出）输出缓冲区内容并关闭缓冲
        ob_end_flush();


    }


}

?>