<?php
class TipoNoticia
{
    public $id;
    public $tipoNoticia;

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
     * Get the value of tipoNoticia
     */
    public function getTipoNoticia()
    {
        return $this->tipoNoticia;
    }

    /**
     * Set the value of tipoNoticia
     *
     * @return  self
     */
    public function setTipoNoticia($tipoNoticia)
    {
        $this->tipoNoticia = $tipoNoticia;

        return $this;
    }
}
