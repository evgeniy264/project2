<?php
namespace Core;

class Controller
{
    protected function render($view, $data = []) {
        return new Page($view, $data);
    }
}
