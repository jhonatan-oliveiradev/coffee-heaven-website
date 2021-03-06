<?php

$db_name = 'mysql:host=localhost;dbname=contact_db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if (isset($_POST['send'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $guests = $_POST['guests'];
   $guests = filter_var($guests, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND guests = ?");
   $select_contact->execute([$name, $number, $guests]);

   if ($select_contact->rowCount() > 0) {
      $message[] = 'message sent already!';
   } else {
      $insert_contact = $conn->prepare("INSERT INTO `contact_form`(name, number, guests) VALUES(?,?,?)");
      $insert_contact->execute([$name, $number, $guests]);
      $message[] = 'message sent successfully!';
   }
}

?>

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="description" content="Official website of Coffee Heaven" />
   <title>Coffee Heaven | drink coffee and step on clouds</title>
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Merienda+One&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="css/style.css" />
</head>

<body>

   <?php

   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }

   ?>

   <header class="header">
      <section class="flex">
         <a href="#home" class="logo"><img src="images/logo.png" alt="logo" /></a>

         <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#gallery">gallery</a>
            <a href="#team">team</a>
            <a href="#contact">contact</a>
         </nav>

         <div id="menu-btn" class="fas fa-bars"></div>
      </section>
   </header>

   <div class="home-bg">
      <section class="home" id="home">
         <div class="content">
            <h3>coffee heaven</h3>
            <p>
               We are a bunch of coffee lovers with a vision for a better coffee
               world. By roasting coffee more sustainably, more fun and more, we
               want to innovate, promote and challenge a coffee industry.
            </p>
            <a href="#about" class="btn">about us</a>
         </div>
      </section>
   </div>

   <section class="about" id="about">
      <div class="image">
         <img src="images/about-img.svg" alt="" />
      </div>
      <div class="content">
         <h3>A cup of coffee can complete your day</h3>
         <p>
            Our coffee is warm as a hug! Made with all the love our team has, a
            cup of our coffee can improve your day by 100%. We have flavors and
            tastes for everyone, we always think about what is best for our
            customers and friends.
         </p>
         <a href="#menu" class="btn">our menu</a>
      </div>
   </section>

   <section class="facility">
      <div class="heading">
         <img src="images/heading-img.png" alt="" />
         <h3>our facility</h3>
      </div>

      <div class="box-container">
         <div class="box">
            <img src="images/icon-1.png" alt="" />
            <h3>varieties of coffees</h3>
            <p>We have several types of coffee to satisfy all our customers.</p>
         </div>

         <div class="box">
            <img src="images/icon-2.png" alt="" />
            <h3>coffee beans</h3>
            <p>
               Selected beans, freshly roasted and ground, make for a tasty coffee
               that is always hot.
            </p>
         </div>

         <div class="box">
            <img src="images/icon-3.png" alt="" />
            <h3>breakfast and sweets</h3>
            <p>
               Start your day with more energy eating your breakfast in one of our
               stores.
            </p>
         </div>

         <div class="box">
            <img src="images/icon-4.png" alt="" />
            <h3>read to go coffee</h3>
            <p>
               Hurry? No problem! We have the perfect espresso to accompany you on
               your way to work.
            </p>
         </div>
      </div>
   </section>

   <section class="menu" id="menu">
      <div class="heading">
         <img src="images/heading-img.png" alt="" />
         <h3>popular menu</h3>
      </div>

      <div class="box-container">
         <div class="box">
            <img src="images/menu-1.png" alt="" />
            <h3>love you coffee</h3>
         </div>

         <div class="box">
            <img src="images/menu-2.png" alt="" />
            <h3>Cappuccino</h3>
         </div>

         <div class="box">
            <img src="images/menu-3.png" alt="" />
            <h3>Mocha coffee</h3>
         </div>

         <div class="box">
            <img src="images/menu-4.png" alt="" />
            <h3>Frappuccino</h3>
         </div>

         <div class="box">
            <img src="images/menu-5.png" alt="" />
            <h3>black coffee</h3>
         </div>

         <div class="box">
            <img src="images/menu-6.png" alt="" />
            <h3>love heart coffee</h3>
         </div>
      </div>
   </section>

   <section class="gallery" id="gallery">
      <div class="heading">
         <img src="images/heading-img.png" alt="" />
         <h3>our gallery</h3>
      </div>

      <div class="box-container">
         <img src="images/gallery-1.webp" alt="" />
         <img src="images/gallery-2.webp" alt="" />
         <img src="images/gallery-3.webp" alt="" />
         <img src="images/gallery-4.webp" alt="" />
         <img src="images/gallery-5.webp" alt="" />
         <img src="images/gallery-6.webp" alt="" />
      </div>
   </section>

   <section class="team" id="team">
      <div class="heading">
         <img src="images/heading-img.png" alt="" />
         <h3>our team</h3>
      </div>

      <div class="box-container">
         <div class="box">
            <img src="images/our-team-1.jpg" alt="" />
            <h3>Joe</h3>
         </div>

         <div class="box">
            <img src="images/our-team-2.jpg" alt="" />
            <h3>Gus</h3>
         </div>

         <div class="box">
            <img src="images/our-team-3.jpg" alt="" />
            <h3>Mary</h3>
         </div>

         <div class="box">
            <img src="images/our-team-4.jpg" alt="" />
            <h3>Alex</h3>
         </div>

         <div class="box">
            <img src="images/our-team-5.jpg" alt="" />
            <h3>Charlotte</h3>
         </div>

         <div class="box">
            <img src="images/our-team-6.jpg" alt="" />
            <h3>Mark</h3>
         </div>
      </div>
   </section>

   <section class="contact" id="contact">
      <div class="heading">
         <img src="images/heading-img.png" alt="" />
         <h3>Contact Us</h3>
      </div>

      <div class="row">
         <div class="image">
            <img src="images/contact-img.svg" alt="" />
         </div>
         <form action="" method="POST">
            <h3>book a table</h3>
            <input type="text" name="name" required class="box" maxlength="20" placeholder="enter your name" />
            <input type="number" name="number" required class="box" maxlength="20" placeholder="enter your number" min="0" max="9999999999" onkeypress="if(this.value.length==10) return false;" />
            <input type="number" name="guests" required class="box" maxlength="20" placeholder="how many guests?" min="0" max="99" onkeypress="if(this.value.length==1) return false;" />
            <input type="submit" name="send" value="send message" class="btn" />
         </form>
      </div>
   </section>

   <section class="footer">
      <div class="box-container">
         <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>our email</h3>
            <p>contact@coffeeheaven.com</p>
            <p>recruit@coffeeheaven.com</p>
         </div>

         <div class="box">
            <i class="fas fa-clock"></i>
            <h3>opening hours</h3>
            <p>07:00am to 09:00pm</p>
         </div>

         <div class="box">
            <i class="fas fa-map-marker-alt"></i>
            <h3>shop location</h3>
            <p>5th Avenue, 1453 - NY</p>
         </div>

         <div class="box">
            <i class="fas fa-phone"></i>
            <h3>our number</h3>
            <p>+123-456-7890</p>
            <p>+111-222-3333</p>
         </div>
      </div>

      <div class="credit">
         &copy; copyright @ 2022 by <span>J.dev</span> | all rights reserved.
      </div>
   </section>

   <!-- custom js file link -->
   <script defer src="js/script.js"></script>

   <div class="credit"> &copy; copyright @ <?= date('Y'); ?> by <span>J.Dev</span> | all rights reserved! </div>

   </section>

   <!-- footer section ends -->























   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>