<?php
    include_once 'backend/rules.php';

    session_start();

    $category = $_GET['category'];

    if (!isset($category)) {
      header("Location: catalog-main.php");
    }

    $catalogItems = [];
    
    if ($category == "smartphones") {
      foreach ($smartphones as $smartphone) {
        $catalogItems[] = $smartphone;
      }
    }
    else if ($category == "laptops") {
      foreach ($laptops as $laptop) {
        $catalogItems[] = $laptop;
      }
    }
    else if ($category == "tablets") {
      foreach ($tablets as $tablet) {
        $catalogItems[] = $tablet;
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | IT Discover Hub</title>
    <link rel="stylesheet" href="catalog.css" />
    <link rel="stylesheet"
    href=https://fonts.googleapis.com/css?family=Poppins:300,400,700 />
  </head>
  <body>
    <header>
      <p class="website-title">IT Discover Hub</p>
      <nav class="header-nav">
        <ul>
          <li><a class="current-page" href="">Home</a></li>
          <li><a href="">About us</a></li>
          <li><a href="">Catalog</a></li>
          <li><a href="">News</a></li>
          <li><a class="contact-us-link" href="">Contact us</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
        <div class="h1-compare-link-container">
          <h1><?php echo $category ?></h1>
          <a class="compare-link" href="compare-products.php?category=<?php echo $category ?>">Compare</a>
        </div>
              <div class="catalog-container">
              <?php foreach ($catalogItems as $catalogItem) {
                ?> 
                <div class="catalog-item-container">
                    <!-- this 'a' tag goes to product-page.php and passes the model of the current $smartphone in loop as parameter -->
                    <a href="product-page.php?category=<?php echo $category ?>&model=<?php echo $catalogItem->model ?>">
                        <img class="catalog-item-img" src="images/catalog-images/laptop2.jpg" alt="">
                        <p class="catalog-item-text"><?php echo $catalogItem->model ?></p>
                    </a>
                    <?php if (isset($_SESSION['isLoggedIn']) && isInUserWishlists($_SESSION['email'], $category, $catalogItem->model) === true) { ?>
                      <button class="remove-wishlist-btn" data-model="<?php echo $catalogItem->model; ?>">Remove wishlist</button>
                    <?php } else { ?>
                      <button class="wishlist-btn" data-model="<?php echo $catalogItem->model; ?>">Add to wishlist</button>
                    <?php } ?>
                </div>
              <?php } ?> 
              </div>
    </main>
    <footer>
      <section class="subscribe-section">
        <h2 class="width-60">Subscribe today and plug into the future!</h2>
        <p class="width-60">
          We promise not to flood your inbox – our updates are as sleek as our
          gadgets. Join the TDA community and stay ahead in the world of
          technology. Because when it comes to staying informed, ITDH has your
          back.
        </p>
        <div class="subscribe-div">
          <div class="subscribe-div-text">
            <p>Stay in the loop</p>
            <p>
              Subscribe to receive latest news and updates about ITDH.
              <span class="block">We promise not to spam you.</span>
            </p>
          </div>
          <form class="subscription-form" action="#" method="post">
            <input
              type="email"
              name="email"
              placeholder="Enter email address "
              required
            />
            <button class="submit-button" type="submit">Continue</button>
          </form>
        </div>
      </section>
      <section class="footer-section">
        <div class="footer-navs-and-information">
          <div>
            <p class="website-title">IT Discover Hub</p>
            <p>"Unlock Exclusive Content - Dive Into Our Website!"</p>
            <p>@ITDiscoverHub</p>
          </div>
          <div class="about-us-div">
            <p><strong>About us</strong></p>
            <nav>
              <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Catalog</a></li>
                <li><a href="">Careers</a></li>
                <li><a href="">Contact us</a></li>
              </ul>
            </nav>
          </div>
          <div class="contact-us-div">
            <p><strong>Contact us</strong></p>
            <p>Have questions? Contact us for friendly assistance.</p>
            <p>+900 000 0000</p>
          </div>
          <div>
            <nav class="soc-meds-nav">
              <a href=""
                ><img
                  class="soc-med-icon"
                  src="images/fb-icon.png"
                  alt="fb icon"
              /></a>
              <a href=""
                ><img
                  class="soc-med-icon"
                  src="images/ig-icon.png"
                  alt="ig icon"
              /></a>
              <a href=""
                ><img
                  class="soc-med-icon"
                  src="images/twitter-icon.png"
                  alt="twitter icon"
              /></a>
              <a href=""
                ><img
                  class="soc-med-icon"
                  src="images/linked-in-icon.png"
                  alt="linked-in icon"
              /></a>
            </nav>
          </div>
        </div>
        <div class="line-separator"></div>
        <p class="copyright text-align-center">
          Copyright® 2023. IT Discover Hub. All Rights Reserved.
        </p>
      </section>
    </footer>
    <script>
      let isLoggedIn = <?php echo isset($_SESSION['isLoggedIn']) ? 'true' : 'false' ;?>;
      let email = <?php echo isset($_SESSION['email']) ? "'" . $_SESSION['email'] . "'" : 'null' ;?>;
      let category = <?php echo "'" . $category . "'"; ?>;
    </script>
    <script src="catalog.js" defer></script>
  </body>
</html>
