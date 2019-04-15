<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="minimum-scale=1.0, target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<title>title</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/adaptive.css">
	<link rel="stylesheet" type="text/css" href="css/v-adaptive.css">

</head>
<body>

<div id="wrapper">
	<header id="header" class="rL">
		<div class="inner"> 
			<div class="reg-user-block fright">
			    <span class="reg-user-block__avatar" style="background-image: url(images/ava-company.png)"></span>
			</div>
			<nav class="main_menu fright rL">
				<div class="db cp menu btn11 mobile-menu-trigger">
					<div class="icon-left"></div>
					<div class="icon-right"></div>
				</div>
                <div class="main_menu__container">
                    <ul>
                        <li class="active"><a href="">Главная</a></li>
                        <li><a href="">Ломозаготовители</a></li>
                        <li><a href="">О проекте</a></li>
                        <li><a href="">Контакты</a></li> 
                    </ul>
                    <div class="city"> 
                        <select class="region">
                            <option value="Moscow">Санкт-Петербург</option>
                            <option value="Saint-Petersburg">Москва</option>
                            <option value="Yekaterinburg">Екатеринбург</option>
                            <option value="Krasnoyarsk">Красноярск</option>
                        </select>
                    </div>
                </div>
			</nav>
			<div class="clear"></div>
		</div>
	</header>
	<main id="main" class="comments-page">
		<div class="inner">
		    <h1 class="page-name">Отзывы компании</h1> 
		    <div class="tb w100 comments-table">
		        <div class="tbc left-cell">
		            <form class="control-box shadow-element">
                    <div class="select-box">
                        <select class="region"> 
                            <option value="Saint-Petersburg">Москва</option>
                            <option value="Moscow">Санкт-Петербург</option>
                            <option value="Yekaterinburg">Екатеринбург</option>
                            <option value="Krasnoyarsk">Красноярск</option>
                        </select>
                    </div>
                    <label class="checkbox-btn db all-reviews"> 
                        <input type="checkbox">
                        <span>Все отзывы</span>
                    </label>

                    <span class="cuption db">Офис</span>
                    <label class="checkbox-btn db office"> 
                        <input type="checkbox">
                        <span>ул.Тверская д. 9</span>
                    </label>

                    <span class="cuption db">Пункты приема</span>
                    <label class="checkbox-btn db reception-point"> 
                        <input type="checkbox">
                        <span>ул. Гагарина д. 53</span>
                    </label><label class="checkbox-btn db reception-point"> 
                        <input type="checkbox">
                        <span>ул. Покровская д. 23</span>
                    </label><label class="checkbox-btn db reception-point"> 
                        <input type="checkbox">
                        <span>ул. Шебургская д. 15</span>
                    </label>
                </form>
		        </div>
		        <div class="tbc right-cell">
		            <div class="no-comment-box shadow-element">
		                Пока нет отзывов.  Ваш отзыв может стать первым. 
		            </div>
                    <form class="leave-comment shadow-element">
                        <textarea class="leave-comment__textatea textarea" placeholder="Оставить отзыв..."></textarea>
                        <div class="leave-comment__btn-box">
                           <label class="positive-radio">
                               <input type="radio" name="comment-radio" value="positive">
                               <span></span>
                           </label>
                           <label class="negative-radio">
                               <input type="radio" name="comment-radio" value="negative">
                               <span></span>
                           </label>
                        <!-- Когда пользователь не зарегистрирован, то у нижеприведенного input присутствует класс user-not-registered, по которому вызывается модальное окно -->
                            <input type="button" value="Отправить" class="user-not-registered">
                        </div>
                    </form>
                    <div class="copy-link-box shadow-element">
                        <div class="copy-link-box__container">
                            <span class="copy-link-box__container__text">
                                Попросите клиентов оставить отзыв о вашей компании. Сслыка на этот пункт приема.
                            </span>
                            <a  class="btn btn_color abs">
                                Скопировать ссылку
                            </a>
                        </div>
                    </div>
		        </div>
		    </div>
		</div>
		<!-- modal-->
        <div class="g-hidden">
            <div class="b-modal" id="w-modal"> 
                <div class="warning-modal">
                    <div class="b-modal_close arcticmodal-close"></div>
                    <span class="warning-modal__message_top">
                        Что-бы отставить отзыв, вы должны быть аторизованным!
                    </span>
                    <div class="warning-modal__btn-box clearfix">
                        <a class="reg-btn reg-btn_bg shadow-element fleft">Войти</a>
                        <a class="reg-btn reg-btn_no-bg shadow-element fright">Регистрация</a>
                    </div>
                    <div class="grey-line"></div>
                    <span class="warning-modal__message_bottom">
                        Пока никто не оставил отзыв. Ваш отзыв может стать первым.
                    </span>
                </div>
            </div>
        </div>
	</main>
	<div id="subfooter"></div>
</div><!--end wrapper-->
<div id="footer">
	<div class="inner">
		<div class="fleft rL hid left_block box">
			<p>ИНН 6745643567</p>
			<p>ОГРН 5675759949</p>
			<a href="" class="white_button">Войти</a>
			<a href="" class="orange_button button">Регистрация</a>
		</div>
		<nav class="fleft rL hid foot_menu box">
			<ul>
				<li><a href="">Ломозаготовители</a></li>
				<li><a href="">О проекте</a></li>
			</ul>
		</nav>
		<nav class="fleft rL hid foot_menu box">
			<ul>
				<li><a href="">Правила рейтинга</a></li>
				<li><a href="">Контакты</a></li>
			</ul>
		</nav>
		<div class="rL hid copy_block">
			<a href="">Техническая поддержка</a>
			<p>Copyright © 2018-2019 </p>
			<a class="logo_app db" href=""></a>
		</div>
	</div>
</div>



<script src="js/jquery-1.12.1.js"></script>
<script src="js/jquery.jscrollpane.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/slick.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.arcticmodal.js"></script>
<script src="js/script.js"></script>

</body>
</html>
