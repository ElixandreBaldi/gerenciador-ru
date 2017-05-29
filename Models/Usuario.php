<?php

require_once('Model.php');

class Usuario extends Model
{
    /*
     CREATE TABLE usuarios (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        usuario VARCHAR(255) NOT NULL,
        senha VARCHAR(255) NOT NULL,
        nivel INT(2) NOT NULL,
        registro_academico INT(11) NULL,
        registro_universitario INT(11) NULL,
        criado_em DATETIME NULL,
        atualizado_em DATETIME NULL
     );
    */

    protected static $table = 'usuarios';
    /**
     * @var int Id do usuário.
     */
    protected $id;

    /**
     * @var string Username do usuário.
     */
    protected $usuario;

    /**
     * @var string Senha do usuário.
     */
    protected $senha;

    /**
     * @var int Nível do usuário.
     */
    protected $nivel;

    /**
     * @var int Registro Academico, se usuario eh aluno.
     */
    protected $registroAcademico;

    /**
     * @var int Registro Universitario, se usuario eh professor ou funcionario.
     */
    protected $registroUniversitario;

    /**
     * @var \DateTime Data de criaçao do usuario.
     */
    protected $criadoEm;

    /**
     * @var \DateTime Data da ultima atualizaçao do usuario.
     */
    protected $atualizadoEm;

    /**
     * @param int $id
     * @param string $usuario
     * @param string $senha
     * @param int $registro
     * @param bool $isRegistroAcademico
     * @param int $nivel
     */
    public function __construct($id, $usuario, $senha, $registro, $isRegistroAcademico, $nivel)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->senha = md5($senha);
        if ($isRegistroAcademico) {
            $this->registroAcademico = $registro;
            $this->registroUniversitario = null;
        } else {
            $this->registroUniversitario = $registro;
            $this->registroAcademico = null;
        }
        $this->nivel = $nivel;
    }

    /**
     * @return int
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param int $nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    /**
     * @param string $senha
     */
    public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }

    /**
     * @param string $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return bool
     */
    public function isAluno()
    {
        return $this->registroUniversitario == null ? false : true;
    }

    /**
     * @return bool
     */
    public function isFuncionario()
    {
        return !$this->isAluno();
    }
}

?>
