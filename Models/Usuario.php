<?php

class Usuario extends Model
{
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
     * @var string Data de criaçao do usuario.
     */
    protected $criadoEm;

    /**
     * @var string Data da ultima atualizaçao do usuario.
     */
    protected $atualizadoEm;
    
    /**
     * @param int $id
     * @param string $usuario
     * @param string $senha
     * @param int $registro
     * @param bool $isRegistroAcademico
     * @param int $nivel
     * @param null|string $criadoEm
     * @param null|string $atualizadoEm
     */
    public function __construct(
        $id,
        $usuario,
        $senha,
        $registro,
        $isRegistroAcademico,
        $nivel,
        $criadoEm = null,
        $atualizadoEm = null
    ) {
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
        if (is_null($criadoEm)) {
            $criadoEm = date('Y-m-d H:i:s');
        }
        if (is_null($atualizadoEm)) {
            $atualizadoEm = date('Y-m-d H:i:s');
        }
        $this->criadoEm = $criadoEm;
        $this->atualizadoEm = $atualizadoEm;
    }

    /**
     * Gera uma instancia do usuario com base em um array.
     *
     * @param array $data
     * @return \Usuario
     */
    public static function instanceByArray(array $data)
    {
        if (is_null($data['registro_academico'])) {
            $registro = $data['registro_universitario'];
            $isRegistroAcademico = false;
        } else {
            $registro = $data['registro_academico'];
            $isRegistroAcademico = true;
        }

        return new self($data['id'], $data['usuario'], $data['senha'], $registro, $isRegistroAcademico, $data['nivel'], $data['criado_em'], $data['atualizado_em']);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    public function getUsuario()
    {
        return $this->usuario;
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
        return $this->registroAcademico == null ? false : true;
    }

    /**
     * Encontra um usuario por meio do login e senha.
     *
     * @param string $usuario
     * @param string $password
     * @return Usuario
     */
    public static function findLogin($username, $password)
    {
        try {
            $result = self::search()
                ->whereEqual('usuario', $username)
                ->whereEqual('senha', md5($password))
                ->limit(1)
                ->run();
        } catch (PDOException $e) {
            throw $e;
        }
        if (count($result) == 0) {
            return null;
        }

        return self::instanceByArray($result[0]);
    }

    /**
     * @return array
     */
    public function getTransacoes()
    {
        $transactions = [];
        try {
            $result = Transacao::search()
                ->whereEqual('usuario_id', $this->id)
                ->run();
        } catch (PDOException $e) {
            throw $e;
        }

        foreach($result as $r){
            array_push($transactions, Transacao::instanceByArray($r));
        }    

        return $transactions;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {        
        if($this->nivel == 1)        
            return true;
        return false;
    }

    /**
     * @param string $usr
     * @return bool
     */
    public static function userExists($usr)
    {
        return self::search()
            ->whereEqual('usuario', $usr)
            ->count()
            ->run() > 0;
    }

    /**
     * @param $reg
     * @return bool
     */
    public static function academicRegisterExists($reg)
    {
        return self::search()
                ->whereEqual('registro_academico', $reg)
                ->count()
                ->run() > 0;
    }

    /**
     * @param $reg
     * @return bool
     */
    public static function universitaryRegisterExists($reg)
    {
        return self::search()
                ->whereEqual('registro_universitario', $reg)
                ->count()
                ->run() > 0;
    }
}

?>
