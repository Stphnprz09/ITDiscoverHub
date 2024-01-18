<?php 
    include_once 'backend/models.php';
    include_once 'backend/rules.php';

    $model = "Samsung Galaxy S23 Ultra";
    $smartphone = getSmartphoneByModel($model);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | IT Discover Hub</title>
    <link rel="stylesheet" href="product-page.css" />
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
        <script>
            function getSuggestions() {

                var userInput = document.getElementById('searchInput').value;

                if (userInput.trim() === '') {
                    clearSuggestions();
                    return;
                }

            // Make an AJAX request to the PHP script
            fetch('search-suggestions.php?query=' + userInput)
                .then(response => response.json())
                .then(data => {
                    var searchSuggestions = document.getElementById('searchSuggestions');
                    searchSuggestions.innerHTML = '';

                    for (var i = 0; i < data.length; i++) {
                        var listLink = document.createElement('a');
                        var listItem = document.createElement('li');
                        listItem.innerText = data[i];
                        listItem.addEventListener('click', function () {
                            document.getElementById('searchInput').value = this.innerText;
                            clearSuggestions();
                        });
                        listLink.setAttribute('href', 'product-page.php?model='+listItem.innerText);
                        listLink.appendChild(listItem);
                        searchSuggestions.appendChild(listLink);
                    }
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        }

        function clearSuggestions() {
            var searchSuggestions = document.getElementById('searchSuggestions');
            searchSuggestions.innerHTML = '';
        }

        </script>
        <?php if (isset($smartphone)) { ?>
            <div class="product-container">
                <table border="1">
                    <tr>
                        <th></th>
                        <td id="search-item-1">
                            <p>Compare with:</p>
                            <form action="">
                                <input id="searchInput" type="text" autocomplete="off" oninput="getSuggestions()">
                                <ul id="searchSuggestions"></ul>
                                <button>Search</button>
                            </form>
                        </td>
                        <td id="search-item-2">
                            <p>Compare with:</p>
                            <form action="">
                                <input id="searchInput1" type="text">
                                <button>Search</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td id="img-item-1">
                            <img src="images/catalog-images/smartphone3.jpg" alt="">
                        </td>
                        <td id="img-item-2">
                            <img src="images/catalog-images/smartphone3.jpg" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td id="brand-item-1"><?php echo $smartphone->brand ?></td>
                        <td id="brand-item-2"><?php echo $smartphone->brand ?></td>
                    </tr>
                    <tr>
                        <th>Model</th>
                        <td id="model-item-1"><?php echo $smartphone->model ?></td>
                        <td id="model-item-2"><?php echo $smartphone->model ?></td>
                    </tr>
                    <tr>
                        <th>Screen</th>
                        <td id="screen-item-1"><?php echo $smartphone->screen ?></td>
                        <td id="screen-item-2"><?php echo $smartphone->screen ?></td>
                    </tr>
                    <tr>
                        <th>OS</th>
                        <td id="os-item-1"><?php echo $smartphone->os ?></td>
                        <td id="os-item-2"><?php echo $smartphone->os ?></td>
                    </tr>
                    <tr>
                        <th>Chipset</th>
                        <td id="echo-item-1"><?php echo $smartphone->chipset ?></td>
                        <td id="echo-item-2"><?php echo $smartphone->chipset ?></td>
                    </tr>
                    <tr>
                        <th>GPU</th>
                        <td id="GPU-item-1"><?php echo $smartphone->GPU ?></td>
                        <td id="GPU-item-2"><?php echo $smartphone->GPU ?></td>
                    </tr>
                    <tr>
                        <th>RAM</th>
                        <td id="RAM-item-1"><?php echo $smartphone->RAM ?></td>
                        <td id="RAM-item-2"><?php echo $smartphone->RAM ?></td>
                    </tr>
                    <tr>
                        <th>Storage</th>
                        <td id="storage-item-1"><?php echo $smartphone->storage ?></td>
                        <td id="storage-item-2"><?php echo $smartphone->storage ?></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td id="price-item-1"><?php echo $smartphone->price ?></td>
                        <td id="price-item-2"><?php echo $smartphone->price ?></td>
                    </tr>
                </table>
            </div>
        <?php } ?>
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