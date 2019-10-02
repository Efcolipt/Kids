<?php
 
 require_once('phpmailer/PHPMailerAutoload.php');
 $data = $_POST;
if (isset($data['sendmail'])) {
	mb_internal_encoding("UTF-8");
	header('Content-Type: text/html; charset=utf-8');
	$data['name'] = stripslashes($data['name']);
	$data['name'] = htmlspecialchars($data['name']);
	$data['phone'] = stripslashes($data['phone']);
	$data['phone'] = htmlspecialchars($data['phone']);
	$data['selectForIsM'] = stripslashes($data['selectForIsM']);
	$data['selectForIsM'] = htmlspecialchars($data['selectForIsM']);
	$MessageError = array();
	$MessageSuccess = array();
	$selectForIsM = array();
	$selectForIsM[] = "СлингоСтарты";
	$selectForIsM[] = "Конкурс 'Папа может!'";
	$selectForIsM[] = "Ползунковый марафон";
	$dataCounterSuccess = 0;
	
	if (strlen(trim($data['name'])) <= 1 ) {
		$MessageError[] = 'Введите имя';
	}
	if (strlen(trim($data['phone'])) != 16 ) {
		$MessageError[] = 'Введите телефон';
	}
	if (strlen(trim($data['selectForIsM'])) < 5 ) {
		$MessageError[] = 'Выберите элемент из списка';
	}
	for($s = 0; $s < count($selectForIsM); $s++){
		if ($selectForIsM[$s] == trim($data['selectForIsM'])) {
			$dataCounterSuccess += 1;
		}

	}

		$pattern_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
	if (!preg_match($pattern_email, $data['email']) !==0 && !strlen($data['email']) > 3) {
		$MessageError[] = 'Не корректно введен Email';
	}

	
		if (empty($MessageError)) {
			if ($dataCounterSuccess != 0 ) {
				$mail = new PHPMailer;
				$mail->CharSet = 'utf-8';

				$messageBody = '<p>Номер клиента:'.$data['phone'].'</p> <p>Email клиента:'.$data['email'].'</p> <p>Выбрал: '.$data['selectForIsM'].'</p>';

				$mail->isSMTP();                                    
				$mail->Host = 'smtp.mail.ru';  						

				$mail->SMTPAuth = true;                              
				$mail->Username = '79811225412@mail.ru'; 
				$mail->Password = '1KMViKMV1'; 
				$mail->SMTPSecure = 'ssl';                            
				$mail->Port = 465; 
				$mail->setFrom('79811225412@mail.ru'); 
				$mail->addAddress('icq-416597405@mail.ru');     
				$mail->isHTML(true);                                  
				$mail->Subject = 'Новая заявка с сайта s-detstvo.ru';
				$mail->Body  = $messageBody;
				$mail->AltBody = '';

				if(!$mail->send()) {
				   $MessageError[] = "Что то пошло не так , попробуйте еще раз!";
				} else {
				    $MessageSuccess[] = "Спасибо за заявку!";
				}
			}else{
				$MessageError[] = "Выберите элемент из списка!";
			}
			
		}



}

	
?>
		

<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
	<title>Семейный праздник "Счастливое детство"</title>
	<meta charset="UTF-8">
	<!-- Media -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Skype toolbar none -->
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

	<!-- Meta for search -->
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="">
	<meta name="description" content="В программе: выставка товаров и услуг для беременных и детей, тест-драйв колясок, ползунковый марафон, конкурсы для всей семьи, розыгрыш призов">
	<meta name="author" content="Libils Team">
	<meta name="copyright" content="Libils Team">

	<!-- Open Graph Meta -->
	<meta property="og:title" content="Семейный праздник 'Счастливое детство'">
	<meta property="og:locale" content="ru_RU">
	<meta property="og:description" content="">
	<meta property="og:image" content="">
	<meta property="og:site_name" content="Семейный праздник 'Счастливое детство'">
	<meta property="og:url" content="">
	<meta property="og:type" content="website">


	<!-- Css -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
	<link rel="shortcut icon" href="image/favicon/fav.ico" type="image/x-icon">
	
	<!-- OWL -->
	<link rel="stylesheet" href="owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="owl-carousel/owl.theme.default.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<div class="wrapper">
		<nav class="navbar navbar-expand-lg navbar-dark bg-default sticky-top">
			<div class="container">
				<a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarMenu">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="#indicatorsCarouselIntro">Главная</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#About_UsY">О нас</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="#BrandsY">Партнеры</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="#ContactsY"> Контакты</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="#IwithYouY"> Участвовать </a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="#GiveTestimonialY">  Оставить заявку </a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="main__content">
			<div id="indicatorsCarouselIntro" class="carousel slide" data-ride="carousel">
				
				<ol class="carousel-indicators">
					<li data-target="#indicatorsCarouselIntro" data-slide-to="0" class="active"></li>
					<li data-target="#indicatorsCarouselIntro" data-slide-to="1"></li>
					<li data-target="#indicatorsCarouselIntro" data-slide-to="2"></li>
					<li data-target="#indicatorsCarouselIntro" data-slide-to="3"></li>
					<li data-target="#indicatorsCarouselIntro" data-slide-to="4"></li>
					<li data-target="#indicatorsCarouselIntro" data-slide-to="5"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="carouselIntroGradient"></div>
						<img class="d-block w-100" src="image/carouselIntro/slideO.jpg" alt="Первый слайд">
						<div class="carousel-caption">
							<h3>Где, когда, во сколько?</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae assumenda id veritatis ab modi ducimus adipisci quidem commodi vel nam.</p>
							<a href="#GiveTestimonialY" class="btn btn-warning d-block ">Оставить заявку</a>
						</div>
					</div>
					<div class="carousel-item">
						<div class="carouselIntroGradient"></div>
						<img class="d-block w-100" src="image/carouselIntro/slideS.jpg" alt="Второй слайд">
						<div class="carousel-caption ">
							<h3>СлингоСтарты</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae assumenda id veritatis ab modi ducimus adipisci quidem commodi vel nam.</p>
							<a href="#GiveTestimonialY" class="btn btn-warning d-block ">Оставить заявку</a>
						</div>
					</div>
					<div class="carousel-item">
						<div class="carouselIntroGradient"></div>
						<img class="d-block w-100" src="image/carouselIntro/slideT.jpg" alt="Третий слайд">
						<div class="carousel-caption ">
							<h3>Коляски тест драйв</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae assumenda id veritatis ab modi ducimus adipisci quidem commodi vel nam.</p>
							<a href="#GiveTestimonialY" class="btn btn-warning d-block">Оставить заявку</a>
						</div>
					</div>

					<div class="carousel-item">
						<div class="carouselIntroGradient"></div>
						<img class="d-block w-100" src="image/carouselIntro/slideK.jpg" alt="Третий слайд">
						<div class="carousel-caption ">
							<h3>Папа может!</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae assumenda id veritatis ab modi ducimus adipisci quidem commodi vel nam.</p>
							<a href="#GiveTestimonialY" class="btn btn-warning d-block ">Оставить заявку</a>
						</div>
					</div>
					<div class="carousel-item">
						<div class="carouselIntroGradient"></div>
						<img class="d-block w-100" src="image/carouselIntro/slideT.jpg" alt="Третий слайд">
						<div class="carousel-caption ">
							<h3>Ползунковый марафон</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae assumenda id veritatis ab modi ducimus adipisci quidem commodi vel nam.</p>
							<a href="#GiveTestimonialY" class="btn btn-warning d-block ">Оставить заявку</a>
						</div>
					</div>
					<div class="carousel-item">
						<div class="carouselIntroGradient"></div>
						<img class="d-block w-100" src="image/carouselIntro/slideT.jpg" alt="Третий слайд">
						<div class="carousel-caption ">
							<h3>Главный приз.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae assumenda id veritatis ab modi ducimus adipisci quidem commodi vel nam.</p>
							<a href="#GiveTestimonialY" class="btn btn-warning d-block">Оставить заявку</a>
						</div>
					</div>
					 
				</div>
				<a class="carousel-control-prev notHr" href="#indicatorsCarouselIntro" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next notHr" href="#indicatorsCarouselIntro" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				<!-- <a class="carousel-control-prev" href="#indicatorsCarouselIntro" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#indicatorsCarouselIntro" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a> -->
			</div>
			<div class="forms mt-4">
				<div class="container">
					<h2>Наши мероприятия</h2>
					<div class="inner__forms">
						<div class="form ">
							<div class="img__this__form">
								<div class="gradient__form"></div>
								<img src="image/forms/slF.jpg" alt="slF">
							</div>
							<div class="about__this__form">
								<p>Если Вам от 6 месяцев до 3 лет и Вы умеете быстро ползать по прямой дистанции 5 метров, то приглашаем Вас зарегистрироваться и принять участие в нашем марафоне.Группа поддержки с с погремушками и игрушками приветствуется. Подписывайтесь на нашу группу в VK и следите за новостями конкурса "Ползунковый марафон"</p>
							</div>
						</div>
						<div class="form" >
							<div class="img__this__form">
								<div class="gradient__form"></div>
								<img src="image/forms/slO.jpg" alt="slO">
							</div>
							<div class="about__this__form">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id maiores provident, iure nostrum laudantium eos fugiat architecto omnis. Nemo.</p>
							</div>
						</div>
						<div class="form">
							<div class="img__this__form">
								<div class="gradient__form"></div>
								<img src="image/forms/slT.jpg" alt="slT">
							</div>
							<div class="about__this__form">
								<p>Тест-драйв с щебнем, песком и травой - ерунда! В условиях современного города есть только одно настоящее препятствие для детской коляски - бордюр и поребрик😄. Только у нас Вы сможете пройти мастер-класс, который научит Вас правильно маневрировать в городской среде, чтобы надолго сохранять колеса и стойки коляски в целостности</p>
							</div>
						</div>
						<div class="form">
							<div class="img__this__form">
								<div class="gradient__form"></div>
								<img src="image/forms/slFR.jpg" alt="slFR">
							</div>
							<div class="about__this__form">
								<p>Если Вы - папа -супермен, и можете все, то приглашаем Вас с малышом на веселые конкурсы.Предварительная запись и подтверждение на самом мероприятии обязательна.Подписывайтесь на нашу группу VK, и следите за подробностями конкурса "Папа может!".</p>
							</div>
						</div>
					</div>
					<div class="btn__callback__block">
						<a  href = "#GiveTestimonialY" class=" btn btn-warning btn-lg">Оставить заявку</a>
					</div>
				</div>
			</div>
			<div class="brands " id="BrandsY">
				<div class="container">
					<div class="owl-carousel owl-theme">
						<div class="item"><a href="#"><img src="image/brands/1.jpg" alt="1"></a></div>
						<div class="item"><a href="#"><img src="image/brands/2.jpg" alt="2"></a></div>
						<div class="item"><a href="#"><img src="image/brands/3.jpg" alt="3"></a></div>
						
						
						
					</div>
				</div>
			</div>
			<div class="aboutUs bg-default" id="About_UsY">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="image/forms/slF.jpg" alt="slF">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>О нас</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo laborum libero rem, hic sint rerum facilis qui ad, maiores ab quia autem laudantium aspernatur adipisci atque, doloremque voluptate consequuntur quidem! Neque accusantium libero id iste reprehenderit ipsa laudantium expedita odit.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="carouselUsers " id="IwithYouY">
				<div class="container">
					<h2>Принять участие</h2>
					<div class="owl-carousel owl-theme">
						<div class="item">
							<img src="image/forms/slF.jpg" alt="">
							<a class="btn btn-warning">Оставить заявку</a>
						</div>
						<div class="item"><img src="image/forms/slF.jpg" alt=""><a href="#GiveTestimonialY"  class="btn btn-warning">Оставить заявку</a></div>
						<div class="item"><img src="image/forms/slF.jpg" alt=""><a href="#GiveTestimonialY"  class="btn btn-warning">Оставить заявку</a></div>
						<div class="item"><img src="image/forms/slF.jpg" alt=""><a href="#GiveTestimonialY"  class="btn btn-warning">Оставить заявку</a></div>
						<div class="item"><img src="image/forms/slF.jpg" alt=""><a  href="#GiveTestimonialY" class="btn btn-warning">Оставить заявку</a></div>
						<div class="item"><img src="image/forms/slF.jpg" alt=""><a href="#GiveTestimonialY"  class="btn btn-warning">Оставить заявку</a></div>
						<div class="item"><img src="image/forms/slF.jpg" alt=""><a href="#GiveTestimonialY"  class="btn btn-warning">Оставить заявку</a></div>
						<div class="item"><img src="image/forms/slF.jpg" alt=""><a href="#GiveTestimonialY"  class="btn btn-warning">Оставить заявку</a></div>
					</div>
				</div>
			</div>
			<div class="contacts bg-default"id="ContactsY">
				<div class="container">
					<h2>Наши контакты</h2>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sd-12">
							<div class="contact__about__fast__info">
								<p><i class="fas fa-phone"></i>Телефон: <a href="tel:+7912911231">+79129111231</a></p>
								<p><i class="fas fa-envelope"></i>Почта:<a href="mailto:example@example.com"> example@example.com</a></p>
								<p><i class="far fa-map"></i>Адрес: Ул. Байконурская 9 , блок 2 , офис 209</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sd-12 videoContacts">
							<iframe   src="https://www.youtube.com/embed/1wRi15T1Gp8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>

					</div>
				</div>
			</div>
			<div class="schedule">
				<div class="container">
					<div class="inner__schedule ">
						<h2 class="text-center">Рассписание мероприятия:</h2>

						<div class="row">
							<div class="col-12 d-block timespant">
								<button class="btn-outline-info btn change__schedule_One">17 Марта</button>
								<button class="btn-outline-info btn change__schedule_Two">18 Марта</button>
								<div class="scheldule__still" data-id="1">
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">17 M</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem  dolor sit amet, consectetuer adipiscing elit.</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p>
								</div>
								<div class="scheldule__still" data-id="2">
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">18 M</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem  dolor sit amet, consectetuer adipiscing elit.</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p>
									<p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p><p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p><p><span class="time__start__schedule">12:00</span>	<span class="about__time__start">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="giveTestimonial bg-default" id="GiveTestimonialY">
				<div class="container">
					<div class="innert__giveTestimonial">
						<h2>Оставить заявку</h2>
						<div class="row justify-content-center">
							<div class="col-lg-6 col-md-6 col-sd-12">
									<?php if (!empty($MessageError)) {
											echo '<div class="alert alert-danger"><p>'.array_shift($MessageError).'</p></div>';
									}  

									if (!empty($MessageSuccess)) {
											echo '<div class="alert alert-success"><p>'.array_shift($MessageSuccess).'</p></div>';
									} ?>
								<form action="" method="post">
									<input type="text" name="name" placeholder="Ваше имя" class="inp__contact">
									<input type="text" name="phone" placeholder="Телефон" class="inp__contact phM">
									<input type="email" name="email" placeholder="Email" class="inp__contact">
									<select class="selectForIs" name="selectForIsM">
									   <option value="Ползунковый марафон" selected>Ползунковый марафон</option>
									   <option value="СлингоСтарты">СлингоСтарты</option>
									   <option value="Конкурс 'Папа может!'">Конкурс "Папа может!"</option>
									   </select>
									<button type="submit" name="sendmail" class="btn btn-lg btn-warning">Оставить заявку</button>
								</form>
								<div class="policy">
									<small>Нажимая на кнопку "Оставить заявку", Вы соглашаетесь с <a href="policy/policy.pdf">Политикой конфиденциальности</a></small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sd-12">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, sequi, molestias. Cupiditate quibusdam, vel facere excepturi commodi officia quas accusamus nulla dicta aliquam id consequuntur rem, fugiat ex fuga libero, ab tempora optio nostrum explicabo corrupti labore quam non eveniet.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="where__is__we ">
				<div class="inner__where__is__we text-center">
					<h2>Наше месторасположение </h2>
					<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A040af8f834c202710346712bb79badd4c547c4b7ef050dc2749b95143577b7ba&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
				</div>
			</div>
			
	
		</div>

		
		
		<div class="LibilsTeam">
			<div class="container">
				<p>Site created <a href="https://vk.com/libils_team" title="Группа в Вк">Libils Team</a> 2019©</p>
			</div>
		</div>

	</div>




	<!-- Optional JS and Jquery -->
	
	<script src="https://kit.fontawesome.com/de8f891afd.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="owl-carousel/owl.carousel.min.js"></script>
	<script src="js/mask.js" type="text/javascript"></script>	
	<script src="js/main.js" type="text/javascript"></script>
	 

</body>
</html>