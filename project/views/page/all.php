<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="/project2/template/css/style.css" rel="stylesheet" type="text/css">
    <style> .image_first { background-image: url('<?php echo $image_path; ?>') } </style>
    <title> Список новостей </title>
</head>

<body>
<div class="container_news">
    <div class="header">
        <div>
            <img class="logo" src="/project2/template/logo/Логотип.png" alt="Логотип компании">
        </div>
        <div class="logo_string">ГАЛАКТИЧЕСКИЙ ВЕСТНИК</div>
    </div>

    <div class="image_and_title">
        <div class="image_first" >
            <div class="first_new">
                <div class="header_first_new"><?php echo $title_last; ?></div>
                <div class="announce_first_new"><?php echo $announce_last; ?></div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="title_news">Новости</div>
        <div class="content_list">
            <?php foreach ($news as $newsItem): ?> <!-- цикл foreach -->


                <div class="content_item" onClick="window.location.href = '/project2/news/one/<?php echo $newsItem['id']; ?>'">
                    <div>
                        <div class='date_news'><?php echo gmdate('d.m.Y', strtotime($newsItem['date'])); ?></div>
                    </div>
                    <div>
                        <div class='title'><?php echo $newsItem['title']; ?></div>
                    </div>
                    <div>
                        <div class='announce_news'><?php echo $newsItem['announce']; ?></div>
                    </div>
                    <a href='/project2/news/one/<?php echo $newsItem['id']; ?> ' class="button_details">ПОДРОБНЕЕ
                        <div></div>
                    </a>
                </div>
            <?php endforeach; ?> <!-- конец цикла foreach -->
        </div>
        <div class="footer_menu">
            <?php
            if (isset($page))
                $page_active = $page;
            else
                $page_active = 1;
            for ($page = 1; $page <= $count_pages; $page++) {
                if ($page == $page_active)
                    $class_a = 'menu_button_active';
                else
                    $class_a = 'menu_button';
                ?>
                <div class="footer_pages"><a href=/project2/news/<?php echo $page; ?> class=<?php echo $class_a; ?>> <?php echo  $page; ?>  </a></div>
                <?php
            }
            ?> <!-- конец цикла for -->

            <?php
            if ($count_pages > 1 && $page_active != $count_pages) {
                ?>
                <div class="footer_pages"> <a class='next_button_active' href=/project2/news/<?php echo $page_active + 1; ?>>
                        <div></div>
                    </a></div>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="footer"> &copy; 2023&mdash;2412 &laquo;Галактический вестник&raquo;</div>
</div>
</body>
</html>