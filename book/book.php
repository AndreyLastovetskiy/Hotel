<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Website</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- swiper js cdn link -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- custom css link -->
   <link rel="stylesheet" href="../style.css">
</head>
<body>

   <!-- header -->

   <header class="header">

      <a href="#" class="logo"> <i class="fas fa-hotel"></i> hotel </a>

      <nav class="navbar">
         <a href="../index.php">Главная</a>
         <?php
         if(empty($_COOKIE['id_user'])) { ?>
            <a href="./login.php" class="btn"> Авторизация</a>
            <a href="./registr.php" class="btn"> Регистрация</a>
         <?php } ?>
         
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </header>

   <!-- end -->

   <!-- reservation -->

   <section class="reservation" id="reservation" style="margin-top: 150px;">

      <h1 class="heading">ЗАБРОНИРУЙТЕ СЕЙЧАС</h1>

      <form action="./vendor/book.php" method="post">
         <input type="hidden" name="id_offer" value="<?= $_GET['id']; ?>">
         <div class="container">

            <div class="box">
               <p>Имя <span>*</span></p>
               <input type="text" class="input" name="name" placeholder="Ваше Имя" required>
            </div>

            <div class="box">
               <p>Email <span>*</span></p>
               <input type="email" class="input" name="email" placeholder="Ваш Email" required>
            </div>

            <div class="box">
               <p>Дата заселения <span>*</span></p>
               <input type="date" class="input" name="date_in" required>
            </div>

            <div class="box">
               <p>Дата выселения <span>*</span></p>
               <input type="date" class="input" name="date_out" required>
            </div>

            <div class="box">
               <p>Взрослые <span>*</span></p>
               <select name="adults" class="input" name="adults" required>
                  <option value="1">1 взрослый</option>
                  <option value="2">2 взрослых</option>
                  <option value="3">3 взрослых</option>
                  <option value="4">4 взрослых</option>
                  <option value="5">5 взрослых</option>
                  <option value="6">6 взрослых</option>
               </select>
            </div>

            <div class="box">
               <p>Дети <span>*</span></p>
               <select name="child" class="input" name="children" required>
                  <option value="1">1 ребенок</option>
                  <option value="2">2 ребенка</option>
                  <option value="3">3 ребенка</option>
                  <option value="4">4 ребенка</option>
                  <option value="5">5 детей</option>
                  <option value="6">6 детей</option>
               </select>
            </div>
   
         </div>

         <input type="submit" value="check availability" class="btn">

      </form>

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

   <script src="../script.js"></script>

</body>
</html>