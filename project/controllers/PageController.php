<?php
namespace Project\Controllers;
use \Core\Controller;
use \Project\Models\Page;

class PageController extends Controller
{
    public function one($params)
    {
        $page = (new Page) -> getById($params['id']);

        return $this->render('page/one', [
            'image_path' => "/project2/template/images/" . $page['image'],
            'content' => $page['content'],
            'announce' => $page['announce'],
            'date' => gmdate('d.m.Y', strtotime($page['date'])),
            'title' => $page['title']
        ]);
    }

    public function all($params)
    {

        $news = (new Page) -> getAll($params['page']);
        $lastNew = (new Page) -> getLastNew();
        $countPages = (new Page) -> getCountPages();
        return $this->render('page/all', [
            'news' => $news,
            'title' => "Новости",
            'image_path' => "/project2/template/images/" . $lastNew['image'],
            'title_last' => $lastNew['title'],
            'announce_last' => $lastNew['announce'],
            'count_pages' => $countPages,
            'page' => $params['page']
        ]);
    }
}