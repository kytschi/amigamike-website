<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$return = new \stdClass();
$return->error = true;
$return->message = 'Failed to send';

if (!empty($_GET['html'])) {
    $return->name = 'Contact';
    $return->url = '/contact?html=true';
    $return->destroy = 'true';
    $return->height = 520;
    $return->content = '
    <div id="form-contact" style="float:left;width:calc(100% - 20px);overflow:hidden;padding:5px 5px;">
        <div class="form-input">
            <label>Your name<span class="required">*</span></label>
            <input type="text" name="name" required="required"/>
        </div>
        <div class="form-input">
            <label>Your email<span class="required">*</span></label>
            <input type="email" name="email" required="required"/>
        </div>
        <div class="form-input">
            <label>Your message<span class="required">*</span></label>
            <textarea rows="4" name="message" required="required"></textarea>
        </div>
        <div class="form-input">
            <label>Captcha<span class="required">*</span></label>
            ' . $DUMBDOG->captcha->draw() . '
        </div>
        <p>Required fields<span class="required">*</span></p>
        <div class="form-input">
            <button
                id="btn-contact-send"
                type="button"
                name="send"
                class="button text-button"
                data-api="/contact"
                onclick="sendMessage()">
                <label><span><i>Send</i></span></label>
            </button>
        </div>
    </div>';
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($return);
    die();
}

if (empty($_GET['json'])) {
    header('Location: /?window=' . urlencode($_SERVER['REQUEST_URI']));
    die();
}

try {
    if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['message'])) {
        throw new \Exception('Missing required fields');
    }

    if (!$DUMBDOG->captcha->validate()) {
        throw new \Exception('Invalid captcha');
    }

    $cfg = json_decode(file_get_contents(getcwd() . "/../dumbdog.json"));
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host = $cfg->email->host;
    $mail->Username = $cfg->email->username;
    $mail->Password = $cfg->email->password;
    $mail->Port = $cfg->email->port;
    $mail->setFrom($cfg->email->username, 'website contact');
    $mail->addAddress("mike@amigamike.com", 'website contact');
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->isHTML(false);
    $mail->Subject = 'Contact from AmigaMike website';
    $mail->Body = strip_tags(urlencode($_POST['message']));
    if (!$mail->send()) {
        throw new \Exception('Failed to send the message');
    }
    $return->message = 'Message has been sent';
    $return->error = false;
} catch (Exception $err) {
    $return->message = $err->getMessage();
} catch (\Exception $err) {
    $return->message = $err->getMessage();
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($return);