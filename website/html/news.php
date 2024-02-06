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
    <link rel="stylesheet" href="../css/news.css" />
    <link rel="stylesheet"
    href=https://fonts.googleapis.com/css?family=Poppins:300,400,700 />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="shortcut icon"
      href="../frontend/css/images/IDH_logo.png"
      type="image/x-icon"
    />
    <title>News | IT Discover Hub</title>
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
          <li><a href="catalog-main.php">Catalog</a></li>
          <li><a class="current-page" href="news.php">News</a></li>
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
      <p class="from-to-current-page text-align-center">
        <a class="from-page" href="">Home </a> >
        <a class="current-page" href=""> News</a>
      </p>
      <h1 class="width-80 center text-align-center">
        Explore the world of tech news with IT Discover Hub – where every click
        opens a door to innovation and insight.
      </h1>

      <!-- image gallery news -->
      <div id="gallery-grid">
        <div id="Gallery1"></div>
        <div id="Gallery2"></div>
        <div id="Gallery3"></div>
        <div id="Gallery4"></div>
      </div>

      <!-- Article -->
      <div class="border-article">
        <h2>LATEST NEWS</h2>
      </div>

      <!-- NEWS API -->
      <div class="API-content">
        <div id="news-container"></div>
      </div>
    </main>
    <!-- footer -->
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
  </body>
  <script>
    var requestOptions = {
      method: "GET",
      redirect: "follow",
    };

    // fetch a json file
    fetch("news.json", requestOptions)
      .then((response) => response.json())
      .then((data) => {
        console.log(data);

        const galleryData = 4;

        data.slice(0, galleryData).forEach((news, index) => {
          const galleryIndex = index + 1;
          const images = `<a href="${news.newsURL}" target="_blank">
                        <img src="${news.newsImage}">
                        <p>${news.newsTitle}</p></a>`;
          document
            .getElementById(`Gallery${galleryIndex}`)
            .insertAdjacentHTML("beforeend", images);
        });
      })
      .then((error) => console.log(error));

    fetch(
      "https://newsapi.org/v2/top-headlines?country=us&category=technology&apiKey=2cc204642c1c4b42b1171b82e8e25286",
      requestOptions
    )
      .then((res) => res.json())
      .then((data) => {
        console.log(data);
        if (data.articles) {
          //maximum of 10 datas to fetch
          const dataArticle = 10;
          let dataCount = 0;

          const shuffledArticle = shuffleArray(data.articles);

          shuffledArticle.forEach((news) => {
            if (
              news.urlToImage !== null &&
              news.urlToImage !== undefined &&
              dataCount < dataArticle
            ) {
              const newsImg = `<img src = "${news.urlToImage}" width="200px" height="150px">`;
              const title = `<h2>${news.title}</h2>`;
              const description = `<p> ${news.description}</p>`;
              const content = `<p>${news.content}</p>`;
              const url = `<a href="${news.url}">READ</a>`;

              document
                .getElementById("news-container")
                .insertAdjacentHTML("beforeend", newsImg);
              document
                .getElementById("news-container")
                .insertAdjacentHTML("beforeend", title);
              document
                .getElementById("news-container")
                .insertAdjacentHTML("beforeend", description);
              document
                .getElementById("news-container")
                .insertAdjacentHTML("beforeend", content);
              document
                .getElementById("news-container")
                .insertAdjacentHTML("beforeend", url);

              dataCount++;
            }
          });
        } else {
          console.log("No articles found in the response");
        }
      })
      .then((error) => console.log(error));

    //function for shuffleArray
    function shuffleArray(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
      return array;
    }
  </script>
</html>
