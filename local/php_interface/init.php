<?php
define("MAIN_TEMPLATE_PATH","/local/templates/main/");

//smtp отправка почты
function custom_mail ($to, $subject, $message, $additionalHeaders = '')
{
    require_once $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/lib/PHPMailer/src/PHPMailer.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/lib/PHPMailer/src/SMTP.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/lib/PHPMailer/src/Exception.php';


    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;

    $mail->Host = 'smtp.timeweb.ru';
    $mail->Port = 25;
    $mail->Username = 'bartocafe.kzn@cafebarto.ru';
    $mail->Password = '6bCDs7E3';

    $mail->IsHTML = true;
    $mail->CharSet = 'UTF-8';

    $to = str_replace(' ','', $to);
    $address = explode(',', $to);
    foreach ($address as $addr)
        $mail->addAddress($addr);

    $headers = explode("\n", $additionalHeaders);
    $attachHeader = 'Content-Type: multipart/mixed; boundary=';
    foreach( $headers as $h )
    {
        if( stripos($h, $attachHeader) === 0 )
        {
            $bndr = substr($h, strlen($attachHeader));
            $bndr = trim($bndr, '"');
            $mail->ContentType = 'multipart/mixed; boundary="' . $bndr . '"';
        }
    }


    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->From = 'bartocafe.kzn@cafebarto.ru';
    $mail->DKIM_domain = 'cafebarto.ru';
    $mail->DKIM_private = $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/cafebarto.ru.private';
    $mail->DKIM_selector = 'mail';
    $mail->DKIM_passphrase = '';
    $mail->DKIM_identity = $mail->From;



    $mail->send();
}



//отправка в телеграм форм
define('TELEGRAM_API_KEY', '6493905232:AAGdSk4ToTCL7cwUBhJj5mfnKY3zv-S3TFk');
define('TELEGRAM_CHAT_ID', '-4059774040');

class FeedBackForm
{

    static  function event_submit(&$event, &$lid, &$arFields)
    {
        if ($event !== "FEEDBACK_FORM") {
            return true;
        }
        $url=$arFields['URL'] ?? 'Не указано';
        $name=$arFields['AUTHOR'] ?? 'Не указано';
        $phone=$arFields['PHONE'] ?? 'Не указано';
        $select=$arFields['SELECT'] ?? 'Не указано';
        $date=$arFields['DATE'] ?? 'Не указано';
        $count=$arFields['COUNT'] ?? 'Не указано';
        $time=$arFields['TIME'] ?? 'Не указано';
        $child=$arFields['CHILD'] ?? 'Не указано';
        $author_email2=$arFields['AUTHOR_EMAIL'] ?? 'Не указано';
        $phone2=$arFields['PHONE'] ?? 'Не указано';

        if($date!=='Не указано') {
            //форма бронирования стола
            $text="Бронирование стола:%0A Cтраница:%0A [$url] %0A Дата: [$date] %0A Количество гостей: [$count] %0A Время: [$time] %0A Я приду с детьми: [$child] %0A Имя: [$name] %0A Телефон: [$phone2] %0A Почта: [$author_email2] %0A  ";


        } else {
            //форма на странице праздники
            $text="Заказать мероприятие:%0A Cтраница:%0A [$url] %0A Имя: [$name] %0A Телефон: [$phone] %0A Выбранный вариант: $select";

        }


        self::sendTelegramPost($text);
    }

    static  function sendTelegramPost($letterHtml){
        //Подготовка праметров запроса к telegram api
        $url = 'https://api.telegram.org/bot'. TELEGRAM_API_KEY . '/sendMessage';
        $post = 'chat_id='. TELEGRAM_CHAT_ID .'&text='. $letterHtml . '&parse_mode=markdown';

        //Выполняем запрос
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler("main", "OnBeforeEventAdd", ['FeedBackForm','event_submit']);


?>