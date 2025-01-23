<?php
namespace Project\Models;
use \Core\Model;

class Page extends Model
{
    private static $colNews=4;
    /*protected static $link = Model::$link;*/

    public function getById($id)
    {
        $link = Model::$link;
        $id = intval($id);
        return $this->findOne(sprintf("SELECT * FROM news WHERE id='%s'",mysqli_real_escape_string($link,$id)));
    }

    public function getAll($page=1)
    {
        $link = Model::$link;
        $page = intval($page);
        $colNews = Page::$colNews;
        $offset = ($page - 1) * $colNews;
        return $this->findMany('SELECT id, date, title, announce FROM news ORDER BY date DESC LIMIT ' . mysqli_real_escape_string($link,$offset) . ' , ' . mysqli_real_escape_string($link,$colNews));

    }

    public function getLastNew()
    {
        return $this->findOne("SELECT title, announce, image FROM news ORDER BY date
                                        DESC LIMIT 1");
    }

    public function getCountPages()
    {
        $colNews = Page::$colNews;
        $countNews = $this->findOne("SELECT COUNT(id) as count FROM news");
        return ceil($countNews['count']/$colNews) ;
    }
}