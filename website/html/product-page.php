<?php 
    include_once '../php_servers/rules.php';

    session_start();

    $isLoggedIn = false;

    if (isset($_SESSION['isLoggedIn'])) {
      $isLoggedIn = true;
    }

    $category = $_GET['category'];
    $model = $_GET['model'];

    if (!isset($category) || !isset($model)) {
      header("Location: catalog-main.php");
    }

    $product = null;
    
    if ($category == "smartphones") {
      $product = getSmartphoneByModel($model);
    }
    else if ($category == "laptops") {
      $product = getLaptopByModel($model);
    }
    else if ($category == "tablets") {
      $product = getTabletByModel($model);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php if (isset($product)) echo $product->model ?> | IT Discover Hub</title>
    <link rel="stylesheet" href="../css/product-page.css" />
    <link rel="stylesheet"
    href=https://fonts.googleapis.com/css?family=Poppins:300,400,700 />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
  <header>
      <img
        class="website-logo"
        src="../images/IDH-logo-1.png"
        alt="Logo of ITDiscoverHub"
      />

      <nav class="header-nav">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="about-us.php">About us</a></li>
          <li><a class="current-page" href="catalog-main.php">Catalog</a></li>
          <li><a href="news.php">News</a></li>
          <li>
            <a class="contact-us-link" href="contact-us.php">Contact us</a>
          </li>
          <?php if ($isLoggedIn === true) { ?>
            <li class="dropdown-wrapper">
              <a class="user-icon" href="profile.php"><img src="<?php echo $_SESSION['profilePicture'] ?>" alt="Profile Picture"></a>
              <span class="drop-icon" tabindex="0" onclick="toggleDropdown(this)">
                <i class="fa-solid fa-angle-down"></i>
              </span>
              <div class="dropdown-content">
                <a class="sign-out" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sign Out</a>
              </div>
            </li>
          <?php } else { ?>
            <li>
              <div class="sign-in">
                <a href="login.php">
                  <i class="fa-solid fa-arrow-right-to-bracket"></i>
                  <span class="hidden-text">Sign In</span>
                </a>
              </div>
            </li>
          <?php } ?>
          <script>
            function toggleDropdown(element) {
              element.closest('.dropdown-wrapper').classList.toggle('active');
            }
          </script>
        </ul>
      </nav>
    </header>
    <main>
      <?php if (isset($product)) { ?>
        <div class="product-container">
          <h1><?php echo $product->model ?></h1>
          <?php if ($category == "smartphones") { ?>
            <img class="product-img" src="../images/catalog/smartphones/<?php echo $product->imageFileName?>" alt="">
          <?php } else if ($category == "laptops") { ?>
            <img class="product-img" src="../images/catalog/laptops/<?php echo $product->imageFileName?>" alt="">
          <?php } else if ($category == "tablets") { ?>
            <img class="product-img" src="../images/catalog/tablets/<?php echo $product->imageFileName?>" alt="">
          <?php } ?>
          <table border="1">
            <tr>
              <th>Brand</th>
              <td><?php echo $product->brand ?></td>
            </tr>
            <tr>
              <th>Model</th>
              <td><?php echo $product->model ?></td>
            </tr>
            <tr>
              <th>OS</th>
              <td><?php echo $product->os ?></td>
            </tr>
            <?php  if ($category === "smartphones" || $category === "tablets") {  ?>
              <tr>
                <th>Screen</th>
                <td><?php echo $product->screen ?></td>
              </tr>
            <?php } ?>
            <?php  if ($category === "laptops" || $category === "tablets") {  ?>
              <tr>
                <th>Processor</th>
                <td><?php echo $product->processor ?></td>
              </tr>
            <?php } ?>
            <?php  if ($category === "smartphones") {  ?>
              <tr>
                <th>Chipset</th>
                <td><?php echo $product->chipset ?></td>
              </tr>
              <tr>
                <th>GPU</th>
                <td><?php echo $product->gpu ?></td>
              </tr>
            <?php } ?>
            <tr>
              <th>ram</th>
              <td><?php echo $product->ram ?></td>
            </tr>
            <tr>
              <th>Storage</th>
              <td><?php echo $product->storage ?></td>
            </tr>
            <?php  if ($category === "tablets") {  ?>
              <tr>
                <th>Battery Life</th>
                <td><?php echo $product->batteryLife ?></td>
              </tr>
            <?php } ?>
            <tr>
              <th>Price</th>
              <td>$<?php echo $product->price ?></td>
            </tr>
          </table>
        </div>
        <!-- if user is logged in and this catalog item is in his/her wishlist, the button is "Remove wishlist" -->
        <?php if (isset($_SESSION['isLoggedIn']) && isInUserWishlists($_SESSION['email'], $category, $product->model) === true) { ?>
          <button class="remove-wishlist-btn" data-model="<?php echo $product->model; ?>">Remove wishlist</button>
          <!-- else if user is NOT logged in or this catalog item is NOT in his/her wishlist, the button is "Add to wishlist" -->
        <?php } else { ?>
          <button class="wishlist-btn" data-model="<?php echo $product->model; ?>">Add to wishlist</button>
        <?php } ?>
      <?php } ?>
    </main>
    <footer id="footer">
      <section class="subscribe-section">
        <h2 class="width-60">Subscribe today and plug into the future!</h2>
        <p class="width-60">
          We promise not to flood your inbox - our updates are as sleek as<br />
          our gadgets. Join the TDA community and stay ahead in the world<br />
          of technology. Because when it comes to staying informed, IDH has<br />your
          back.
        </p>
        <div class="subscribe-div">
          <div class="subscribe-div-text">
            <p><span class="head">Stay in the loop</span></p>
            <p>
              Subscribe to receive latest news and updates about ITDH.
              <span class="block">We promise not to spam you.</span>
            </p>
          </div>
          <form class="subscription-form" action="../php_servers/subscribe.php" method="post">
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
            <img
              class="website-logo"
              src="../images/IDH-logo-1.png"
              alt="Logo of ITDiscoverHub"
            />
            <p>"Unlock Exclusive Content - Dive Into Our Website!"</p>
            <p>@ITDiscoverHub</p>
          </div>
          <div class="about-us-div">
            <p><strong>About us</strong></p>
            <nav>
              <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="catalog-main.php">Catalog</a></li>
                <li><a href="about-us.php">About us</a></li>
                <li><a href="contact-us.php">Contact us</a></li>
              </ul>
            </nav>
          </div>
          <div class="contact-us-div">
            <p><strong>Contact us</strong></p>
            <p>Have questions? Contact us for friendly assistance.</p>
            <div class="email">
              <i class="fa-regular fa-envelope"></i>
              <p>itdiscoverhub@gmail.com</p>
            </div>
          </div>
          <div>
            <nav class="soc-meds-nav">
              <a href="https://www.facebook.com/profile.php?id=61555182040614"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
              <a href="https://www.instagram.com/itdiscoverh/"
                ><i class="fa-brands fa-instagram"></i
              ></a>
              <a href="https://twitter.com/itdiscover_hub"
                ><i class="fa-brands fa-twitter"></i
              ></a>
              <a href="https://www.linkedin.com/in/it-discover-hub-7453472a9/"
                ><i class="fa-brands fa-linkedin-in"></i
              ></a>
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
      // variables that other js linked needs, such as wishlist.js
      const isLoggedIn = <?php echo isset($_SESSION['isLoggedIn']) ? 'true' : 'false' ;?>;
      const email = <?php echo isset($_SESSION['email']) ? "'" . $_SESSION['email'] . "'" : 'null' ;?>;
      const urlParams = new URLSearchParams(window.location.search);
      const category = urlParams.get("category");
    </script>
    <script src="../javascript/wishlist.js"></script>
</body>
</html>