<?php
  session_start();

  $isLoggedIn = false;

  if (isset($_SESSION['isLoggedIn'])) {
    $isLoggedIn = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catalog | IT Discover Hub</title>
    <link rel="stylesheet" href="../css/catalog-main.css" />
    <link rel="stylesheet"
    href=https://fonts.googleapis.com/css?family=Poppins:300,400,700 />
  <!--Need internet-->
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
      <section class="section-catalog-categories with-bg">
        <h2>
          Upgrade your IT experience today – because when it comes to
          technology, excellence starts here at IT Discover Hub.
        </h2>
        <p>
          At IT Discover Hub, we understand the fast-paced nature of the tech
          industry, and we're committed to keeping you at the forefront of
          innovation. Stay updated on the newest releases, read insightful
          reviews, and make informed decisions about your IT investments.
        </p>
        <nav class="nav-catalog-categories">
          <div class="catalog-category">
            <a class="category-link" href="catalog.php?category=smartphones">
              <img
                class="category-icon"
                src="../images/smartphone-icon.png"
                alt="smartphone icon"
              />
              <p>Smartphones</p>
              <img
                class="arrow-icon"
                src="../images/arrow-icon.png"
                alt="arrow icon"
              />
            </a>
          </div>
          <div class="catalog-category">
            <a class="category-link" href="catalog.php?category=laptops">
              <img
                class="category-icon"
                src="../images/graphic-cards-icon.png"
                alt="laptop icon"
              />
              <p>Laptops</p>
              <img
                class="arrow-icon"
                src="../images/arrow-icon.png"
                alt="arrow icon"
              />
            </a>
          </div>
          <div class="catalog-category">
            <a class="category-link" href="catalog.php?category=tablets">
              <img
                class="category-icon"
                src="../images/computer-icon.png"
                alt="tablet icon"
              />
              <p>Tablets</p>
              <img
                class="arrow-icon"
                src="../images/arrow-icon.png"
                alt="arrow icon"
              />
            </a>
          </div>
        </nav>
      </section>
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
                <li><a href="catalog.php">Catalog</a></li>
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
  </body>
</html>
