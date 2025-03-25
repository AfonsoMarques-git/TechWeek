<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telemovel = $_POST['telemovel'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    // Validação simples
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos obrigatórios.']);
        exit;
    }

    // Simular envio de email ou salvar no banco de dados
    // mail($email, $subject, $mensagem); // Exemplo de envio de email

    echo json_encode(['success' => true]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Método inválido.']);
exit;
