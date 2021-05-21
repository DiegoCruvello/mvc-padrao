<?php

namespace App\models;

class Crud extends Connection
{
    public function create()
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $conn = $this->connect();
        $sql = "INSERT INTO tb_person (nome, email) VALUES (:nome, :email)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt;
    }

    public function read()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM tb_person ORDER BY nome";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    public function update()
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();
        $sql = "UPDATE tb_person SET nome = :nome, email = :email WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
        
        return $stmt;
    }

    public function delete()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

        $conn = $this->connect();
        $sql = "DELETE FROM tb_person WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }

    public function editForm()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

        $conn = $this->connect();
        $sql = "SELECT * FROM tb_person WHERE id=:id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }
}