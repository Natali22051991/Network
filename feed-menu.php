<?php
session_status();


$pdo = require 'db_connect.php';

if (isset($_SESSION['id'])) { // если данные сессии установлены
//d($_SESSION);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        if (isset($_POST['action']) && $_POST['action'] === 'Поделиться') {
//                d($_POST);
//                d($_FILES);
            if (!empty($_POST['post'])) {


                $post = htmlspecialchars(trim($_POST['post']));

//                $_SESSION['post'] = htmlspecialchars(trim($_POST['post']));

//                d($_SESSION);
                //проверяем наличие картинки и если есть помещаем в папку images
                $image_photo = $_FILES['file-photo'];
                $image_video = $_FILES['file-video'];
                //проверяем наличие картинки и если есть помещаем в папку images
                if (!empty($image_photo['name']) || !empty($video_post['name'])) {
                    $image_photo['name'] = 'post/images/' . $image_photo['size'] . '_' . $image_photo['name'];
                    $image_video['name'] = 'post/images/' . $image_video['size'] . '_' . $image_video['name'];
                    move_uploaded_file($image_photo['tmp_name'], $image_photo['name']);
                    move_uploaded_file($image_video['tmp_name'], $image_video['name']);
                    $image_photo['name'] = str_replace('post/', '', $image_photo['name']);
                    $image_video['name'] = str_replace('post/', '', $image_video['name']);
                } else {
                    $image_photo['name'] = null;
                    $image_video['name'] = null;
                }


                $query = "INSERT INTO posts VALUES (?, ?, ?, ?, ?, ?)";

                $insert_query = $pdo->prepare($query); // после получаем объект
                //выполняем запрос
                $result = $insert_query->execute([null, $post, null, $image_photo['name'], $image_video['name'], $_SESSION['id']]);

            }


        }

    }
}

?>
<div class="feed-menu">
    <div class="creat-post">
        <div class="header-creat-post">
            <h4>Расскажи о себе</h4>
        </div>
        <div class="section-creat-post">
            <div class="input-creat-post">
                <form name="" method="POST" enctype="multipart/form-data">
                    <?php
                    if (isset($_SESSION['avatar'])) {
                        echo "<a href='#'><img class='ava-post' width='40' height='40' src='registration/$_SESSION[avatar]' alt='$_SESSION[avatar]'></a>";
                        echo "<input class='input-post' type='text' name='post' placeholder='Расскажи о чем ты думаешь, $_SESSION[first_name]?'>";
                    } else {
                        echo "<a href='#'><img width='40' height='40' src='registration/images/undefined.png'></a>";
                        echo "<input type='text' name='post' placeholder='Расскажи о чем ты думаешь, ?'>";
                    }
                    ?>
                    <div class="footer-creat-post">
                        <div class="upload-file__wrapper">
                            <input
                                    type="file"
                                    name="file-photo"
                                    id="upload-file__input_1"
                                    class="upload-file__input"
                                    accept=".jpg, .jpeg, .png"
                                    multiple
                            >
                            <label class="upload-file__label" for="upload-file__input_1">
                                <img width="24" height="24" src="img/picture.svg" alt="picture">
                                <p>Photo</p>
                            </label>
                        </div>
                        <div class="upload-file__wrapper">
                            <input
                                    type="file"
                                    name="file-video"
                                    id="upload-file__input_1"
                                    class="upload-file__input"
                                    accept=".jpg, .jpeg, .png"
                                    multiple
                            >
                            <label class="upload-file__label" for="upload-file__input_1">
                                <img width="24" height="24" src="img/icons8-video-message-40.png"
                                     alt="icons8-video-message-40">
                                <p>Video</p>
                            </label>
                        </div>
                    </div>
            </div>
            <div class="footer-creat-post">
                <input id="button" type="submit" name="action" value="Поделиться">

            </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['action']) && $_POST['action'] === 'Поделиться') {


        if (!empty($_POST['post']) || !empty($_FILES['photo']['name'])) {

            $query = "SELECT posts.id, post, posts.add_date, photo_post, video_post, id_user, first_name, last_name, avatar FROM posts, users
 WHERE posts.id_user = users.id
 ORDER BY add_date DESC ";
            $result = $pdo->query($query, PDO::FETCH_ASSOC);


//            d($news_post_user);
//                $_SESSION['avatar'] = str_replace('registration/','',$news_post_user['avatar']);
//                $_SESSION['first_name'] = $news_post_user['first_name'];
//            $_SESSION['last_name'] = $news_post_user['last_name'];
//            $_SESSION['post'] = $news_post_user['post'];
//                $_SESSION['photo_post'] = str_replace('post/','',$news_post_user['photo_post']);
//            $news_item = $result->fetch()


            if (isset($result)) {
                while ($post_el = $result->fetch()) {
//        d($post_el);
                    if (!empty($post_el['avatar'])) {
                        $post_el['avatar'] = str_replace('registration/', '', $post_el['avatar']);
                    }

                    if (isset($post_el['photo_post'])) {

                        echo <<<_HTML_
<div class="item-1">
        <div class="header-item-1">
            <div class="user-header-item-1">

        <a href='user.php'><img width='48' height='48' src='registration/$post_el[avatar]' alt='$post_el[avatar]'></a>

           <div class="text">

                <p><b>$post_el[first_name] $post_el[last_name]</b></p>
                 <span>$post_el[add_date]</span>

         </div>
          </div>
          <div class="info-header-item-1">
       <a href="#"><img width="17" height="48" src="img/NewsFeed-2.svg" alt="NewsFeed-2"></a>
            </div>
     </div>

      
            <div class='text-image-item-1'>$post_el[post]<p><br><br><br><br></p>
            
            <img width='100%' height='300' src='post/$post_el[photo_post]'></div>
  <div class="likes-item-1">
            <img width="16" height="16" src="img/like.svg" alt="like">
            <p class="clicks"></p>
        </div>
        <div class="footer-item-1">
            <div class="group-footer-item-1">
                <button class="footer-btn like-btn">
                    <img width="25" height="25" src="img/like2.svg" alt="like2">
                    <p>Like</p>
                </button>
                <button class="footer-btn">
                    <img width="21" height="21" src="img/Vector-massage.svg" alt="Vector-massage">
                    <p>Комментарий</p>
                </button>
            </div>
        </div>
    </div>
         
_HTML_;

                    }
                }
            }
        }
    }
    //    echo '<div class="item-1">
    //        <div class="header-item-1">
    //            <div class="user-header-item-1">';
    //
    //            echo  "<a href='user.php'><img width='48' height='48' src='registration/$_SESSION[avatar]' alt='$_SESSION[avatar]></a>";
    //
    //              echo  '<div class="text">';
    //
    //                    echo "<p><b>$_SESSION[first_name] $_SESSION[last_name]</b></p>";
    //                    echo "<span>3 ч</span>";
    //
    //             echo   '</div>';
    //          echo  '</div>';
    //          echo  '<div class="info-header-item-1">';
    //             echo   '<a href="#"><img width="17" height="48" src="img/NewsFeed-2.svg" alt="NewsFeed-2"></a>';
    //            echo '</div>';
    //       echo '</div>';
    //
    //
    //            echo "<div class='text-image-item-1'>$$post_el[post]<p><br><br><br><br></p>";
    //            if (isset($post_el['photo_post'])) {
    //                echo "<img width='100%' height='300' src='$post_el[photo_post]'>";
    //            }
    //            echo "</div> ";
    //
    //
    //
    ?>


    <div class="item-2">
        <div class="header-item-2">
            <a href="#"><img width="48" height="48" src="img/custom3.svg" alt="custom3"></a>
            <div class="text">
                <a href="#">
                    <p><b>Figma</b></p>
                </a>
                <span>5 hrs</span>
            </div>
        </div>
        <div class="text-item-2">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod id iste voluptatem
                accusantium dolores ea doloremque, ab tenetur perspiciatis odit cupiditate rem voluptate
                soluta, voluptates veniam, dolor harum omnis deleniti. Aspernatur fugit ipsum dolore
                quas soluta asperiores accusamus consequatur voluptate doloribus pariatur similique
                laborum delectus quasi, incidunt, distinctio, labore quae consectetur repellendus
                facere! Fuga totam et rerum esse accusamus veritatis repellendus quo obcaecati ad
                ducimus deserunt maiores similique, ullam quisquam aut, maxime quibusdam eius. Omnis
                illo suscipit ipsa possimus magni! Obcaecati itaque dignissimos vel aut ut explicabo
                accusantium ratione, deleniti ex recusandae quia, consequuntur molestiae quibusdam porro
                voluptas nihil aliquam.</p>
        </div>
    </div>
    <div class="item-2">
        <div class="header-item-2">
            <a href="#"><img width="48" height="48" src="img/custom3.svg" alt="custom3"></a>
            <div class="text">
                <a href="#">
                    <p><b>Figma</b></p>
                </a>
                <span>5 hrs</span>
            </div>
        </div>
        <div class="text-item-2">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod id iste voluptatem
                accusantium dolores ea doloremque, ab tenetur perspiciatis odit cupiditate rem voluptate
                soluta, voluptates veniam, dolor harum omnis deleniti. Aspernatur fugit ipsum dolore
                quas soluta asperiores accusamus consequatur voluptate doloribus pariatur similique
                laborum delectus quasi, incidunt, distinctio, labore quae consectetur repellendus
                facere! Fuga totam et rerum esse accusamus veritatis repellendus quo obcaecati ad
                ducimus deserunt maiores similique, ullam quisquam aut, maxime quibusdam eius. Omnis
                illo suscipit ipsa possimus magni! Obcaecati itaque dignissimos vel aut ut explicabo
                accusantium ratione, deleniti ex recusandae quia, consequuntur molestiae quibusdam porro
                voluptas nihil aliquam.</p>
        </div>
    </div>
</div>
