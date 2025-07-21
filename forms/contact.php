<?php
// Defina o e-mail que irá receber os contatos
$to = "paintinger1@hotmail.com";

// Verifique se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta e sanitiza os dados do formulário
    $name    = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email   = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(strip_tags(trim($_POST["subject"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Cabeçalhos do e-mail
    $headers  = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Corpo da mensagem
    $body  = "Nome: $name\n";
    $body .= "Email: $email\n";
    $body .= "Assunto: $subject\n\n";
    $body .= "Mensagem:\n$message\n";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Sua mensagem foi enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente.";
    }
} else {
    echo "Método inválido.";
}
?>
