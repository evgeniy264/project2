<?php

namespace Core;

error_reporting(E_ALL);
ini_set('display_errors', 'on');
define('ROOT', dirname(__FILE__));

require_once ROOT . '/project/config/connection.php';

spl_autoload_register(function($class) {
    preg_match('#(.+)\\\\(.+?)$#', $class, $match);

    $nameSpace = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($match[1]));
    $className = $match[2];

    $path = ROOT . DIRECTORY_SEPARATOR . $nameSpace . DIRECTORY_SEPARATOR . $className . '.php';

    if (file_exists($path)) {
        require_once $path;

        if (class_exists($class, false)) {
            return true;
        } else {
            throw new \Exception("Класс $class не найден в файле $path. Проверьте правильность написания имени класса внутри указанного файла.");
        }
    } else {
        throw new \Exception("Для класса $class не найден файл $path. Проверьте наличие файла по указанному пути. Убедитесь, что пространство имен вашего класса совпадает с тем, которое пытается найти фреймворк для данного класса. Например, вы создаете класса модели, но забыли заюзать ее через use. В этом случае вы пытаетесь вызвать класс модели в пространстве имен контроллера, а такого файла нет.");
    }
});
// Прочитываем массив из файла с роутами в переменную:
$routes = require ROOT . '/project/config/routes.php';

$track = ( new Router )      -> getTrack($routes, $_SERVER['REQUEST_URI']);
// Вызов диспетчера:
$page  = ( new Dispatcher ) -> getPage($track);
echo (new View) -> render($page); // вот так используем класс View