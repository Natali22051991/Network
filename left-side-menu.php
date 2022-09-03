<div class="left-side-menu">
    <div class="users">
        <?php
        if(isset($_SESSION['first_name'])){
            echo "<a href='user.php'><img width='28' height='28' src='registration/$_SESSION[avatar]' alt='$_SESSION[avatar]'><p><b>$_SESSION[first_name] $_SESSION[last_name]</b></p></a>";

        } else {
            echo '<a href="#"><img width="24" height="24" src="img/ellipse.svg" alt="ellipse"></a>';

            echo '<a id="name" href="#"><p><b>Пользователь</b></p></a>';
        }

        ?>
    </div>
    <div class="nav-group-navigator">
        <div class="navigator-item-selected">
            <a href="#"><img width="24" height="24" src="img/newsFeed.svg" alt="newsFeed"></a>
            <a href="news/news.php">
                <p><b>Новости</b></p>
            </a>
            <a href="#"><img class="newsFeed-2" width="15.75" height="3.63" src="img/NewsFeed-2.svg"
                             alt="NewsFeed-2"></a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/message.svg" alt="message"></a>
            <a href="message/message.php">
                <p>Сообщения</p>
            </a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/shop-market.svg" alt="shop-market"></a>
            <a href="https://www.ozon.ru/">
                <p>Marketplace</p>
            </a>
        </div>
    </div>
    <div class="nav-group-community">
        <h5>Сообщества</h5>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/trophy-product-design.svg"
                             alt="trophy-product-design"></a>
            <a href="community/product-design.php">
                <p>Product Design</p>
            </a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/trophy-product-design.svg"
                             alt="trophy-product-design"></a>
            <a href="community/ux-ui.php">
                <p>UX & UI</p>
            </a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/trophy-product-design.svg"
                             alt="trophy-product-design"></a>
            <a href="community/figma.php">
                <p>Figma</p>
            </a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/trophy-product-design.svg"
                             alt="trophy-product-design"></a>
            <a href="community/ant-design.php">
                <p>Ant Design</p>
            </a>
        </div>
    </div>
    <div class="nav-group-explore">
        <h5>Просмотр</h5>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/flag.svg" alt="flag"></a>
            <a href="pages/page.php">
                <p>Страницы</p>
            </a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/customer-service.svg"
                             alt="customer-service"></a>
            <a href="community/ant-design.php">
                <p>Сообщества</p>
            </a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/home2.svg" alt="home2"></a>
            <a href="events/event.php">
                <p>События</p>
            </a>
        </div>
        <div class="navigator-item">
            <a href="#"><img width="24" height="24" src="img/rocket.svg" alt="rocket"></a>
            <a href="apps/apps.php">
                <p>Приложения</p>
            </a>
        </div>
    </div>
</div>

