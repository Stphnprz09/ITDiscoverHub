<?php
    include_once '../php_servers/rules.php';

    session_start();

    $isLoggedIn = false;

    if (isset($_SESSION['isLoggedIn'])) {
      $isLoggedIn = true;
    }

    $category = $_GET['category'];
    $catalogItems = [];

    if (!isset($category)) {
      header("Location: catalog-main.php");
    }

    // if the get request is from the advanced filter form
    if (isset($_GET['filter'])) {
      $brand = $_GET['brand'];
      $os = $_GET['os'];
      $ram = $_GET['ram'];
      $storage = $_GET['storage'];
      $price = $_GET['price'];

      if ($category == "smartphones") {
        $smartphonesByFilter = getSmartphonesByFilter($brand, $os, $ram, $storage, $price);
        if (isset($smartphonesByFilter)) {
          foreach ($smartphonesByFilter as $smartphone) {
            $catalogItems[] = $smartphone;
          }
        }
      }
      else if ($category == "laptops") {
        $laptopsByFilter = getLaptopsByFilter($brand, $os, $ram, $storage, $price);
        if (isset($laptopsByFilter)) {
          foreach ($laptopsByFilter as $laptop) {
            $catalogItems[] = $laptop;
          }
        }
      }
      else if ($category == "tablets") {
        $tabletsByFilter = getTabletsByFilter($brand, $os, $ram, $storage, $price);
        if (isset($tabletsByFilter)) {
          foreach ($tabletsByFilter as $tablet) {
            $catalogItems[] = $tablet;
          }
        }
      }
    }
    // else
    else {
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
    }

    usort($catalogItems, 'compareCatalogItemsByDate');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catalog | IT Discover Hub</title>
    <link rel="stylesheet" href="../css/catalog.css" />
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
        <div class="heading-functionalities-container">
          <h1><?php echo $category ?></h1>
          <div class="functionalities-container">
            <!-- search -->
            <div class="search-container">
              <input class="search-input" type="text" autocomplete="off">
              <div class="search-suggestions-container">
                <ul class="search-suggestions"></ul>
              </div>
            </div>
            <!-- advanced filter -->
            <div class="advanced-filter-container">
              <button class="advanced-filter-btn" id="advanced-filter-btn">Advanced Filter</button>
              <div class="dropdowns-container hide" id="dropdowns-container">
                <form method="GET" action="catalog.php">
                  <!-- hidden input tag to pass a "category" parameter in the get request -->
                  <input type="hidden" name="category" value="<?php echo $category ?>">
                  <!-- if the category is "smartphones", the following is the options for brand and os -->
                  <?php if ($category == "smartphones") { ?>
                  <select name="brand" id="brand">
                    <option value="" selected>Brand</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Apple">Apple</option>
                    <option value="Xiaomi">Xiaomi</option>
                    <option value="OPPO">OPPO</option>
                    <option value="Vivo">Vivo</option>
                  </select>
                  <select name="os" id="os">
                    <option value="" selected>OS</option>
                    <option value="Android">Android</option>
                    <option value="iOS">iOS</option>
                  </select>
                  <?php } ?>
                  <!-- if the category is "laptops", the following is the options for brand and os -->
                  <?php if ($category == "laptops") { ?>
                  <select name="brand" id="brand">
                    <option value="" selected>Brand</option>
                    <option value="Dell">Dell</option>
                    <option value="Samsung">Samsung</option>
                    <option value="HP">HP</option>
                  </select>
                  <select name="os" id="os">
                    <option value="" selected>OS</option>
                    <option value="Windows">Windows</option>
                  </select>
                  <?php } ?>
                  <!-- if the category is "tablets", the following is the options for brand and os -->
                  <?php if ($category == "tablets") { ?>
                  <select name="brand" id="brand">
                    <option value="" selected>Brand</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Lenovo">Lenovo</option>
                    <option value="Redmi">Redmi</option>
                  </select>
                  <select name="os" id="os">
                    <option value="" selected>OS</option>
                    <option value="Android">Android</option>
                  </select>
                  <?php } ?>
                  <select name="ram" id="ram">
                    <option value="" selected>RAM</option>
                    <option value="2GB">2GB</option>
                    <option value="4GB">4GB</option>
                    <option value="8GB">8GB</option>
                    <option value="16GB">16GB</option>
                  </select>
                  <select name="storage" id="storage">
                    <option value="" selected>Storage</option>
                    <option value="32GB">32GB</option>
                    <option value="64GB">64GB</option>
                    <option value="128GB">128GB</option>
                    <option value="256GB">256GB</option>
                    <option value="516GB">516GB</option>
                  </select>
                  <select name="price" id="price">
                    <option value="99999999" selected>Price</option>
                    <option value="100">< $100</option>
                    <option value="500">< $500</option>
                    <option value="1000">< $1000</option>
                    <option value="1500">< $1500</option>
                  </select>
                  <input type="submit" class="apply-advanced-filter-btn" id="apply-advanced-filter-btn" name="filter" value="Apply"></input>
                </form>
              </div>
            </div>
            <!-- link for compare-products.php -->
            <a class="compare-link" href="compare-products.php?category=<?php echo $category ?>">Compare</a>
          </div>
        </div>

        <?php if (count($catalogItems) <= 0 ) { ?>
          <p style="text-align: center; margin: 6rem auto 0;">No resuls found.</p>
        <?php } ?>

        <!-- the display of catalog items -->
        <div class="catalog-container">
          <?php foreach ($catalogItems as $catalogItem) { ?> 
            <div class="catalog-item-container">
                <!-- the link goes to the product-page.php and displays the clicked catalog item -->
                <a href="product-page.php?category=<?php echo $category ?>&model=<?php echo $catalogItem->model ?>">
                  <?php if ($category == "smartphones") { ?>
                    <img class="catalog-item-img" src="../images/catalog/smartphones/<?php echo $catalogItem->imageFileName?>" alt="">
                  <?php } else if ($category == "laptops") { ?>
                    <img class="catalog-item-img" src="../images/catalog/laptops/<?php echo $catalogItem->imageFileName?>" alt="">
                  <?php } else if ($category == "tablets") { ?>
                    <img class="catalog-item-img" src="../images/catalog/tablets/<?php echo $catalogItem->imageFileName?>" alt="">
                  <?php } ?>
                  <p class="catalog-item-text"><?php echo $catalogItem->model ?></p>
                </a>
                <!-- if user is logged in and this catalog item is in his/her wishlist, the button is "Remove wishlist" -->
                <?php if (isset($_SESSION['isLoggedIn']) && isInUserWishlists($_SESSION['email'], $category, $catalogItem->model) === true) { ?>
                  <button class="remove-wishlist-btn" data-model="<?php echo $catalogItem->model; ?>">Remove wishlist</button>
                <!-- else if user is NOT logged in or this catalog item is NOT in his/her wishlist, the button is "Add to wishlist" -->
                  <?php } else { ?>
                  <button class="wishlist-btn" data-model="<?php echo $catalogItem->model; ?>">Add to wishlist</button>
                <?php } ?>
              </div>
          <?php } ?> 
        </div>
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
    <script src="../javascript/catalog.js"></script>
    <script src="../javascript/wishlist.js"></script>
  </body>
</html>
