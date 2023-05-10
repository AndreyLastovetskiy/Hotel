<?php
require_once("./db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Website</title>
   <script src="https://kit.fontawesome.com/61b86703fe.js" crossorigin="anonymous"></script>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- swiper js cdn link -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- custom css link -->
   <link rel="stylesheet" href="style.css">
</head>
<body>

   <!-- header -->

   <header class="header">

      <a href="#" class="logo"> <i class="fas fa-hotel"></i> hotel </a>

      <nav class="navbar">
         <a href="./index.php">Главная</a>
         <a href="#room">Предложения</a>
         <a href="#gallery">Галлерея</a>
         <?php
         if(empty($_COOKIE['id_user'])) { ?>
            <a href="./login.php" class="btn"> Авторизация</a>
            <a href="./registr.php" class="btn"> Регистрация</a>
         <?php } ?>
         
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </header>

   <!-- end -->

   <!-- home -->

   <section class="home" id="home">

      <div class="swiper home-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide" style="background: url(images/home-slide1.jpg) no-repeat;">
               <div class="content">
                  <h3>здесь сбываются мечты</h3>
                  <a href="#" class="btn"> посетите наше предложение</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide2.jpg) no-repeat;">
               <div class="content">
                  <h3>здесь сбываются мечты</h3>
                  <a href="#" class="btn"> посетите наше предложение</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide3.jpg) no-repeat;">
               <div class="content">
                  <h3>здесь сбываются мечты</h3>
                  <a href="#" class="btn"> посетите наше предложение</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide4.jpg) no-repeat;">
               <div class="content">
                  <h3>здесь сбываются мечты</h3>
                  <a href="#" class="btn"> посетите наше предложение</a>
               </div>
            </div>

         </div>

         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>

      </div>

   </section>

   <!-- end -->

   <!-- room -->

    <section class="room" id="room">
         <div class="room-heading">
            <h1 class="heading" style="color: #0077b6;">наши предложения</h1>
            <?php
            if(empty($_COOKIE['id_user'])) {
               echo "";
            } elseif($_COOKIE['id_group'] == 1) { ?>
               <a href="./create/offers.php" style="color: #0077b6;"><i class="fa-regular fa-square-plus fa-2xl"></i></a>
            <?php } ?>
            
         </div>
        
         <div class="room-wrapper">
            <?php
            $select_room = mysqli_query($link, "SELECT * FROM `offer` ORDER BY `id` DESC");
            $select_room = mysqli_fetch_all($select_room);

            foreach($select_room as $sr) { ?>
               <div class="swiper-slide slide">
                  <div class="image">
                     <span class="price"><?= $sr[6] ?>/ночь</span>
                     <img src="<?= "./" . $sr[7] ?>">
                     <a href="#" class="fas fa-shopping-cart"></a>
                  </div>
                  <div class="content">
                     <h3><?= $sr[2] ?></h3>
                     <p><?= $sr[3] ?></p>
                     <a href="./book/room.php?id=<?= $sr[0] ?>" class="btn">Забронировать</a>
                  </div>
               </div>
            <?php } ?>
         </div>
        

      </div>

   </section>

   <!-- end -->

   <!-- services -->

   <section class="services">

      <div class="box-container">

         <div class="box">
            <img src="images/service1.png" alt="">
            <h3>бассейны</h3>
         </div>

         <div class="box">
            <img src="images/service2.png" alt="">
            <h3>еда и напитки</h3>
         </div>

         <div class="box">
            <img src="images/service3.png" alt="">
            <h3>рестораны</h3>
         </div>

         <div class="box">
            <img src="images/service4.png" alt="">
            <h3>фитнес</h3>
         </div>

         <div class="box">
            <img src="images/service5.png" alt="">
            <h3>Салоны красоты</h3>
         </div>

         <div class="box">
            <img src="images/service6.png" alt="">
            <h3>Курортные пляжи</h3>
         </div>

      </div>

   </section>

   <!-- end -->

   <!-- gallery -->

   <section class="gallery" id="gallery">

      <h1 class="heading">Галлерея</h1>

      <div class="swiper gallery-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <img src="images/gallery1.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery2.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery3.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery4.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery5.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery6.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

         </div>

      </div>

   </section>

   <!-- end -->

   <!-- footer -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>Контакты</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-852-4565 </a>
            <a href="#"> <i class="fas fa-phone"></i> +123-852-4565</a>
            <a href="#"> <i class="fas fa-envelope"></i> ninjashub4@gmail.com</a>
            <a href="#"> <i class="fas fa-map"></i> karachi, pakistan</a>
         </div>

         <div class="box">
            <h3>Быстрые Ссылки</h3>
            <a href="#home"> <i class="fas fa-arrow-right"></i> Главная</a>
            <a href="#room"> <i class="fas fa-arrow-right"></i> Предложения</a>
            <a href="#gallery"> <i class="fas fa-arrow-right"></i> Галлерея</a>
         </div>

      </div>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-instagram"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-pinterest"></a>
      </div>

      <div class="credit">&copy; copyright @ 2023</div>

   </section>

   <!-- end -->

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <script src="script.js"></script>

</body>
</html>