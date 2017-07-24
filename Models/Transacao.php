<?php

class Transacao extends Model
{
    protected static $table = 'transacoes';

    /**
     * @var int Id da transaçao.
     */
    protected $id;

    /**
     * @var float Valor em reais.
     */
    protected $valor;

    /**
     * @var \DateTime Data de criaçao.
     */
    protected $criadoEm;

    /**
     * @var \Usuario Proprietario da transaçao.
     */
    protected $usuario;

    /**
     * @param int $id
     * @param float $valor
     * @param int $usuario
     * @param string|null $criadoEm
     */
    public function __construct($id, $valor, $usuario, $criadoEm = null)
    {
        $this->id = $id;
        $this->valor = $valor;
        $this->usuario = $usuario;
        if (is_null($criadoEm)) {
            $criadoEm = date('Y-m-d H:i:s');
        }
        $this->criadoEm = $criadoEm;
    }

    /**
     * Gera uma instancia da transacao com base em um array.
     *
     * @param array $data
     * @return \Transacao
     */
    public static function instanceByArray(array $data)
    {
        return new self($data['id'], $data['valor'], $data['usuario_id'], $data['criado_em']);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return \Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return \DateTime
     */
    public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    /**
     * @return bool
     */
    public function isConsume()
    {
        return $this->valor < 0;
    }
}