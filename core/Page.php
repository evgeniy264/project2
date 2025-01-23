<?php
namespace Core;

class Page
{
    private $view;
    private $data;

    public function __construct($view = null, $data = [])
    {
        $this->view   = $view;
        $this->data   = $data;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}