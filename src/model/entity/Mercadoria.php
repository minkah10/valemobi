<?php

/**
 * Created by PhpStorm.
 * User: minkah
 * Date: 12/07/16
 * Time: 19:02
 */
class Mercadoria
{
    private $cod_mercadoria;
    private $nome_mercadoria;
    private $qtd;
    private $preco;
    private $tipo_negocio;
    private $status_mercadoria;

    /**
     * @return mixed
     */
    public function getCodMercadoria()
    {
        return $this->cod_mercadoria;
    }

    /**
     * @param mixed $cod_mercadoria
     */
    public function setCodMercadoria($cod_mercadoria)
    {
        $this->cod_mercadoria = $cod_mercadoria;
    }

    /**
     * @return mixed
     */
    public function getNomeMercadoria()
    {
        return $this->nome_mercadoria;
    }

    /**
     * @param mixed $nome_mercadoria
     */
    public function setNomeMercadoria($nome_mercadoria)
    {
        $this->nome_mercadoria = $nome_mercadoria;
    }

    /**
     * @return mixed
     */
    public function getQtd()
    {
        return $this->qtd;
    }

    /**
     * @param mixed $qtd
     */
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getTipoNegocio()
    {
        return $this->tipo_negocio;
    }

    /**
     * @param mixed $tipo_negocio
     */
    public function setTipoNegocio($tipo_negocio)
    {
        $this->tipo_negocio = $tipo_negocio;
    }

    /**
     * @return mixed
     */
    public function getStatusMercadoria()
    {
        return $this->status_mercadoria;
    }

    /**
     * @param mixed $status_mercadoria
     */
    public function setStatusMercadoria($status_mercadoria)
    {
        $this->status_mercadoria = $status_mercadoria;
    }


}