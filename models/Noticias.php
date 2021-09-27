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

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of sintese
     */
    public function getSintese()
    {
        return $this->sintese;
    }

    /**
     * Set the value of sintese
     *
     * @return  self
     */
    public function setSintese($sintese)
    {
        $this->sintese = $sintese;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of hora
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of texto
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }
}
