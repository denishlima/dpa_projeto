<?php
class Noticias
{
    public $id;
    public $titulo;
    public $text;
    public $sintese;
    public $data;
    public $hora;
    public $texto;
    public $tipoNoticia;
    public $arquivo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getSintese()
    {
        return $this->sintese;
    }

    /**
     * @param mixed $sintese
     */
    public function setSintese($sintese)
    {
        $this->sintese = $sintese;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    /**
     * @return mixed
     */
    public function getTipoNoticia()
    {
        return $this->tipoNoticia;
    }

    /**
     * @param mixed $tipoNoticia
     */
    public function setTipoNoticia($tipoNoticia)
    {
        $this->tipoNoticia = $tipoNoticia;
    }

    /**
     * @return false|string[]
     */
    public function getTipoNoticiaList() {
        return explode(',', $this->tipoNoticia);
    }

    /**
     * @return mixed
     */
    public function getArquivo()
    {
        return $this->arquivo;
    }

    /**
     * @param mixed $arquivo
     */
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;
    }

}
