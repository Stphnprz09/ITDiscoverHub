<?php 
    include_once 'backend/rules.php';

    $category = $_GET['category'];
    $model = $_GET['model'];

    if (!isset($category) || !isset($model)) {
      header("Location: catalog-main.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | IT Discover Hub</title>
    <link rel="stylesheet" href="product-page.css" />
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
      <?php if ($category === "smartphones") { ?>
        <?php $smartphone = getSmartphoneByModel($model); ?>
          <?php if (isset($smartphone)) { ?>
              <div class="product-container">
                  <h1><?php echo $smartphone->model ?></h1>
                  <img class="product-img" src="images/catalog-images/smartphone1.jpg" alt="">
                  <table border="1">
                      <tr>
                          <th>Brand</th>
                          <td><?php echo $smartphone->brand ?></td>
                      </tr>
                      <tr>
                          <th>Model</th>
                          <td><?php echo $smartphone->model ?></td>
                      </tr>
                      <tr>
                          <th>Screen</th>
                          <td><?php echo $smartphone->screen ?></td>
                      </tr>
                      <tr>
                          <th>OS</th>
                          <td><?php echo $smartphone->os ?></td>
                      </tr>
                      <tr>
                          <th>Chipset</th>
                          <td><?php echo $smartphone->chipset ?></td>
                      </tr>
                      <tr>
                          <th>GPU</th>
                          <td><?php echo $smartphone->GPU ?></td>
                      </tr>
                      <tr>
                          <th>RAM</th>
                          <td><?php echo $smartphone->RAM ?></td>
                      </tr>
                      <tr>
                          <th>Storage</th>
                          <td><?php echo $smartphone->storage ?></td>
                      </tr>
                      <tr>
                          <th>Price</th>
                          <td><?php echo $smartphone->price ?></td>
                      </tr>
                  </table>
              </div>
          <?php } ?>
        <?php } ?>
      <?php if ($category === "laptops") { ?>
        <?php $laptop = getLaptopByModel($model); ?>
          <?php if (isset($laptop)) { ?>
              <div class="product-container">
                  <h1><?php echo $laptop->model ?></h1>
                  <img class="product-img" src="images/catalog-images/laptop1.jpg" alt="">
                  <table border="1">
                      <tr>
                          <th>Brand</th>
                          <td><?php echo $laptop->brand ?></td>
                      </tr>
                      <tr>
                          <th>Model</th>
                          <td><?php echo $laptop->model ?></td>
                      </tr>
                      <tr>
                          <th>OS</th>
                          <td><?php echo $laptop->os ?></td>
                      </tr>
                      <tr>
                          <th>Processor</th>
                          <td><?php echo $laptop->processor ?></td>
                      </tr>
                      <tr>
                          <th>RAM</th>
                          <td><?php echo $laptop->RAM ?></td>
                      </tr>
                      <tr>
                          <th>Storage</th>
                          <td><?php echo $laptop->storage ?></td>
                      </tr>
                      <tr>
                          <th>Price</th>
                          <td><?php echo $laptop->price ?></td>
                      </tr>
                  </table>
              </div>
          <?php } ?>
      <?php } ?>
      <?php if ($category === "tablets") { ?>
        <?php $tablet = getTabletByModel($model); ?>
          <?php if (isset($tablet)) { ?>
              <div class="product-container">
                  <h1><?php echo $tablet->model ?></h1>
                  <img class="product-img" src="images/catalog-images/laptop1.jpg" alt="">
                  <table border="1">
                      <tr>
                          <th>Brand</th>
                          <td><?php echo $tablet->brand ?></td>
                      </tr>
                      <tr>
                          <th>Model</th>
                          <td><?php echo $tablet->model ?></td>
                      </tr>
                      <tr>
                          <th>Screen</th>
                          <td><?php echo $tablet->screen ?></td>
                      </tr>
                      <tr>
                          <th>Processor</th>
                          <td><?php echo $tablet->processor ?></td>
                      </tr>
                      <tr>
                          <th>RAM</th>
                          <td><?php echo $tablet->RAM ?></td>
                      </tr>
                      <tr>
                          <th>Storage</th>
                          <td><?php echo $tablet->storage ?></td>
                      </tr>
                      <tr>
                          <th>Battery Life</th>
                          <td><?php echo $tablet->batteryLife ?></td>
                      </tr>
                      <tr>
                          <th>Price</th>
                          <td><?php echo $tablet->price ?></td>
                      </tr>
                  </table>
              </div>
          <?php } ?>
      <?php } ?>
      <button class="wishlist-btn">Add to wishlist</button>
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
</body>
</html>