<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="/project2/template/css/style.css" rel="stylesheet" type="text/css">

    <!-- запись в заголовке -->
    <title> <?php echo $title; ?> </title>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <img class="logo" src="/project2/template/logo/Логотип.png" alt="Логотип компании">
        </div>
        <div class="logo_string">Галактический вестник</div>
    </div>
    <div class="line"></div>
    <div class="content_block">
        <div class="path"> Главная / <?php echo"<div class='path_last'>" . $title . "</div>"; ?></div>
        <div class="header_news"><?php echo $title; ?></div>
        <div class="date_news"><?php echo $date; ?></div>

        <div class="content_one_new">

            <div class="content_text_one_new">
                <div>
                    <div class="announce_new"><?php echo $announce; ?></div>
                </div>
                <div class="content_list_one_new">
                    <div>
                        <div class="text_one_new"><?php echo $content; ?></div>
                    </div>
                </div>


            </div>
            <div class="image_one_new">
                <img src='<?php echo $image_path; ?>' alt='Изображение' class="image_new">
            </div>
        </div>
        <div>
            <?php echo '<a href="javascript:history.back()" class="footer_news"> <div></div>НАЗАД К НОВОСТЯМ</a>'; ?>
        </div>
    </div>

    <div class="footer_view"> &copy; 2023&mdash;2412 &laquo;Галактический вестник&raquo;</div>
</div>
</body>
</html>