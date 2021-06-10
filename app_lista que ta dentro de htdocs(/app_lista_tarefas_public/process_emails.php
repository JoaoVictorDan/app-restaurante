<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

//print_r($_POST);  
    require "./bibliotecas/src/Exception.php";
    require "./bibliotecas/src/OAuth.php";
    require "./bibliotecas/src/PHPMailer.php";
    require "./bibliotecas/src/POP3.php";
    require "./bibliotecas/src/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
class Mensagem{
    private $para = null;
    private $assunto = null;
    private $mensagem = null;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function mensagemValida(){
        if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
            return false;
        }
        return true;
    }
        
    
}
$mensagem = new Mensagem();

$mensagem ->__set('para',$_POST['para']);
$mensagem ->__set('assunto',$_POST['assunto']);
$mensagem ->__set('mensagem',$_POST['mensagem']);

//print_r($mensagem);

if(!$mensagem->mensagemValida()){
    echo 'mensagem não é valida';
    die();
}
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kratinhoguerra7@gmail.com';              //SMTP username
    $mail->Password   = '15273849';                       //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($mensagem->para, 'Caro Cliente');
    $mail->addAddress($mensagem->para, 'João User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->assunto;
    $mail->Body    = $mensagem->mensagem;
    $mail->AltBody = $mensagem->mensagem;

    $mail->send();
    echo 'Message has been sent
    <br/>
    <a href="indexa.php"<button type="submit" class="btn btn-primary btn-lg" style="margin-left:90%">Voltar</button></a>';

} catch (Exception $e) {
    echo "Não foi possivel Enviar o Email, Por favor, tente Novamente mais tarde. Detalhes do erro{$mail->ErrorInfo}";
}
//vingador.mais.forte@gmail.com', 'senha' => 'julin2345
//kratinhoguerra7@gmail.com', 'senha' => '15273849
?>