<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | IT Discover Hub</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet"
    href=https://fonts.googleapis.com/css?family=Poppins:300,400,500,700 />
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
          <li><a class="current-page" href="home.php">Home</a></li>
          <li><a href="about-us.html">About us</a></li>
          <li><a href="catalog-main.html">Catalog</a></li>
          <li><a href="news.html">News</a></li>
          <li>
            <a class="contact-us-link" href="contact-us.html">Contact us</a>
          </li>

          <!--Sign In-->
          <li>
            <div class="sign-in">
              <a href="signup.html">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                <span class="hidden-text">Sign In</span>
              </a>
            </div>
          </li>

          <!--User Icon, Sign Out--><!--
          <li class="dropdown-wrapper">
            <a class="user-icon" href=""><i class="fa-regular fa-user"></i></a>
            <span class="drop-icon" tabindex="0" onclick="toggleDropdown(this)">
              <i class="fa-solid fa-angle-down"></i>
            </span>
            <div class="dropdown-content">
              <a class="sign-out" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sign Out</a>
            </div>
          </li>
          
          <script>
            function toggleDropdown(element) {
              element.closest('.dropdown-wrapper').classList.toggle('active');
            }
          </script>-->
        </ul>
      </nav>
    </header>
    <main>
      <section class="primary-section with-bg">
        <h1 class="font-size-large">
          Welcome to
          <span class="block">IT Discover Hub</span>
          <span class="block font-size-medium">
            where curiosity meets innovation.
          </span>
        </h1>
        <p>
          Your one-stop destination for all<br />
          things IT equipment. Dive into the world of cutting-edge<br />
          technology, and discover a comprehensive range of top-notch IT<br />
          gears to elevate your digital experience.
        </p>
        <a class="more-details-link" href="#footer">Get more details</a>
      </section>
      <section class="section-popular-technologies width-80">
        <div class="flex-space-between-center">
          <h2>Current Popular Technologies</h2>
          <a class="see-all-link" href="catalog.html">SEE ALL</a>
        </div>
        <div class="popular-technologies-div">
          <div class="popular-technologies-item">
            <img src="css/images/catalog-images/laptop1.jpg" alt="laptop" />
            <div class="popular-technologies-bs">
              <button class="wishlist-button">Add to my wishlist</button>
            </div>
          </div>
          <div class="popular-technologies-item">
            <img src="css/images/catalog-images/laptop2.jpg" alt="laptop" />
            <div class="popular-technologies-bs">
              <button class="wishlist-button">Add to my wishlist</button>
            </div>
          </div>
          <div class="popular-technologies-item">
            <img src="css/images/catalog-images/laptop3.jpg" alt="laptop" />
            <div class="popular-technologies-bs">
              <button class="wishlist-button">Add to my wishlist</button>
            </div>
          </div>
          <div class="popular-technologies-item">
            <img src="css/images/catalog-images/tablet1.jpg" alt="tablet" />
            <div class="popular-technologies-bs">
              <button class="wishlist-button">Add to my wishlist</button>
            </div>
          </div>
          <div class="popular-technologies-item">
            <img src="css/images/catalog-images/tablet2.jpg" alt="tablet" />
            <div class="popular-technologies-bs">
              <button class="wishlist-button">Add to my wishlist</button>
            </div>
          </div>
          <div class="popular-technologies-item">
            <img src="css/images/catalog-images/tablet3.jpg" alt="tablet" />
            <div class="popular-technologies-bs">
              <button class="wishlist-button">Add to my wishlist</button>
            </div>
          </div>
        </div>
      </section>
      <section class="third-section width-80">
        <h2 class="width-60">IT Discover Hub</h2>
        <p class="width-60">
          Explore our extensive catalog featuring the latest laptops, desktops,
          servers, networking equipment, storage solutions, and more. Whether
          you're a tech enthusiast, a business professional, or an IT expert,
          we've curated a selection of premium products from leading brands to
          meet your diverse needs.
        </p>
        <div class="relative-for-design">
          <img src="../images/bg3.jpg" alt="background image" />
        </div>
      </section>

      <section class="section-catalog-gallery text-align-center width-80">
        <h2 class="width-80 center">Explore Our Extensive Catalog</h2>
        <p class="width-80 center">
          Dive into a curated selection of the latest laptops, desktops,
          servers, and networking solutions from industry-leading brands.
          Whether you're a home user, a small business, or an enterprise, find
          the perfect IT equipment to optimize your digital endeavors.
        </p>
        <div class="catalog-gallery">
          <img
            class="grid-col-span-4"
            src="css/images/catalog-images/monitor1.jpg"
            alt="desktop monitor"
          />
          <img
            class="grid-col-span-4"
            src="css/images/catalog-images/monitor2.jpg"
            alt="desktop monitor"
          />
          <img
            class="grid-col-span-4"
            src="css/images/catalog-images/smartphone1.jpg"
            alt="smartphone"
          />
          <img
            class="grid-col-span-3"
            src="css/images/catalog-images/smartphone2.jpg"
            alt="smartphone"
          />
          <img
            class="grid-col-span-4"
            src="css/images/catalog-images/keyboard1.jpg"
            alt="keyboard"
          />
          <img
            class="grid-col-span-5"
            src="css/images/catalog-images/keyboard2.jpg"
            alt="keyboard"
          />
        </div>
        <a class="see-all-link center" href="catalog.html">SEE ALL</a>
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
          <form class="subscription-form" action="subscribe.php" method="post">
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
