<?php
class Funcionario {
    private $nomeCompleto;
    private $dataNascimento;
    private $funcao;
    private $telefone;
    private $corFundo;
    private $email;
    private $salarioLiquido;
    private $salarioBruto;

    // GETs e SETs
    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimentoFormatada() {
        $dataObj = new DateTime($this->dataNascimento);
        return $dataObj->format('d/m/Y'); // Formatar no padrão 'dia/mês/ano'
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getCorFundo() {
        return $this->corFundo;
    }

    public function setCorFundo($corFundo) {
        $this->corFundo = $corFundo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSalarioLiquido() {
        return $this->salarioLiquido;
    }

    public function setSalarioLiquido($salarioLiquido) {
        $this->salarioLiquido = $salarioLiquido;
    }

    public function getSalarioBruto() {
        return $this->salarioBruto;
    }

    public function setSalarioBruto($salarioBruto) {
        $this->salarioBruto = $salarioBruto;
    }

    // Método para calcular o desconto
    public function calculaDesconto() {
        return $this->salarioBruto - $this->salarioLiquido;
    }
}
?>
