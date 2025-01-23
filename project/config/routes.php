<?php
use \Core\Route;

return [
    new Route('/project2/news/:page', 'page', 'all'),
    new Route('/project2/news/one/:id',   'page', 'one'),
];