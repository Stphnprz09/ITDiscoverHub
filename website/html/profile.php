<?php
include_once '../php_servers/models.php';
include_once '../php_servers/db_server.php';  

// Check if the user is logged in 
session_start();

$isLoggedIn = false;

if (isset($_SESSION['isLoggedIn'])) {
  $isLoggedIn = true;
}

if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['email'];

$users = getUsers();
$currentUser = null;

foreach ($users as $user) {
    if ($user->email === $userEmail) {
        $currentUser = $user;
        break;
    }
}

if ($currentUser === null) {
    echo "User not found.";
    exit();
}

$wishlists = getWishlistsByEmail($userEmail);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile | IT Discover Hub</title>
    <link rel="stylesheet"  href="../css/profile.css" />
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
          <li><a href="catalog-main.php">Catalog</a></li>
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

    <div class="container">
      <aside class="left-aside">
        <div class="Edit-Profile">
          <div class="profile-image1">
             <img src="<?php echo htmlspecialchars($currentUser->getProfilePicture()); ?>" alt="Profile Picture">
          </div>
          <div class="profile-info">
            <h3>Edit Profile</h3>
            <h2 class="user-name"><?php echo $currentUser->getFirstName() . ' ' . $currentUser->getLastName(); ?></h2>
          </div>
        </div>
        <div class="aside-nav">
          <ul>
            <li>
              <a class="current" href="#">
                <img src="../images/info-icon.png" alt="icon">
                <span>General Details</span>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../images/wishlist-icon.png" alt="icon">
                <span>Wishlist</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <section class="main-content">
        <div class="general-details">
          <div class="update-profile-pic">
              <img id="profileImage" src="<?php echo htmlspecialchars($currentUser->getProfilePicture()); ?>" alt="Profile Picture">
          </div>
          <div class="update-user-details">
          <form id="updateUserAndPicForm" action="../php_servers/profile_server.php" method="post"
                        enctype="multipart/form-data">              

              <div class="form-group">
                    <div class="change-pic">
                        <label for="profilePicture" class="upload-label">Update Profile Picture</label>
                        <input type="file" id="profilePicture" name="profilePicture" accept="image/*"
                                    class="input-hidden">
                    </div>
              </div>
              <div class="edit-name">
                <div class="form-group">
                    <label class="firstName">First name</label>
                    <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($currentUser->getFirstName()); ?>">
                </div>
                <div class="form-group">
                    <label class="lastName">Last name</label>
                    <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($currentUser->getLastName()); ?>">
                </div>
            </div>

              <div class="form-group">
                  <label class="email">Email</label>
                  <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($currentUser->getEmail()); ?>">
              </div>
      
              <div class="form-group">
                <div class="password-container">
                  <label class="password">Password</label>
                  <input type="password" id="password" name="password" placeholder="" value="<?php echo htmlspecialchars($currentUser->getPassword()); ?>">
                  <i class="fa-solid fa-eye-slash show-password-button"></i>
                </div>
              </div>
                        
                        <button type="reset" value="Reset">Cancel</button>
                        <button type="submit">Save</button>
          </form>
          </div>
        </div>
        
        <div id="wishlistContainer" class="wishlist">
          <div class="wishlist-head">
            <img src="../images/wishlist-icon.png" alt="wishList-icon">
            <span>My Wishlist</span>
          </div>
          <div class="user-wishlist">
            <?php
            // Display wishlist items
              foreach ($wishlists as $wishlistItem) {
                echo '<div class="Wishlist-item">';
                echo '<span>' . htmlspecialchars($wishlistItem->category) . '</span>';
                echo '<span class="model">' . htmlspecialchars($wishlistItem->model) . '</span>';
                echo '<i class="fa-regular fa-trash-can" onclick="deleteWishlistItem(\'' . $wishlistItem->category . '\', \'' . $wishlistItem->model . '\')"></i>';
                echo '</div>';
              }
            ?>
          </div>
        </div>
      </section>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
          // Display General Details by default
              const generalDetailsSection = document.querySelector(".general-details");
              generalDetailsSection.style.display = "block";

              const links = document.querySelectorAll('.aside-nav a');
              const contentSections = document.querySelectorAll('.main-content > div');

              links.forEach((link, index) => {
                  link.addEventListener('click', () => {
                      links.forEach(otherLink => otherLink.classList.remove('current'));
                      link.classList.add('current');

                      // Hide all sections
                      contentSections.forEach(section => section.style.display = 'none');

                      // Display the corresponding section
                      contentSections[index].style.display = 'block';
                  });
              });

              const passwordInput = document.getElementById("password");
              const showPasswordButton = document.querySelector(".show-password-button");

              showPasswordButton.addEventListener("click", () => {
                  if (passwordInput.type === "password") {
                      passwordInput.type = "text";
                      showPasswordButton.classList.remove("fa-eye-slash");
                      showPasswordButton.classList.add("fa-eye");
                  } else {
                      passwordInput.type = "password";
                      showPasswordButton.classList.remove("fa-eye");
                      showPasswordButton.classList.add("fa-eye-slash");
                  }
              });

              const updateUserAndPicForm = document.getElementById("updateUserAndPicForm");
              const profilePictureInput = document.getElementById("profilePicture");
              const profileImage = document.getElementById("profileImage");
              let isProfilePictureChanged = false;

              let isFirstNameChanged = false;
              let isLastNameChanged = false;
              let isEmailChanged = false;
              let isPasswordChanged = false;


              updateUserAndPicForm.addEventListener("submit", function (event) {
                  event.preventDefault();

                  const formData = new FormData(updateUserAndPicForm);

                  if (isProfilePictureChanged) {
                      formData.append('isProfilePictureChanged', true);
                  }
                  if (isFirstNameChanged) {
                      formData.append('isFirstNameChanged', true);
                  }
                  if (isLastNameChanged) {
                      formData.append('isLastNameChanged', true);
                  }
                  if (isEmailChanged) {
                      formData.append('isEmailChanged', true);
                  }
                  if (isPasswordChanged) {
                      formData.append('isPasswordChanged', true);
                  }

                  fetch("../php_servers/profile_server.php", {
                      method: "POST",
                      body: formData
                  })
                      .then(response => response.text())
                      .then(data => {

                          isProfilePictureChanged = false;
                          isFirstNameChanged = false;
                          isLastNameChanged = false;
                          isEmailChanged = false;
                          isPasswordChanged = false;

                          // Redirect to the profile page after successful update
                          window.location.href = "../html/profile.php";
                      })
                      .catch(error => {
                          console.error("Error updating profile details:", error);
                          alert("Failed to update profile details. Please try again.");
                      });
              });


              profilePictureInput.addEventListener("change", function () {
                  isProfilePictureChanged = true;
                  const file = profilePictureInput.files[0];

                  if (file) {
                      const reader = new FileReader();
                      reader.onload = function (e) {
                          profileImage.src = e.target.result;
                      };
                      reader.readAsDataURL(file);
                  }
              });


              const initialFormValues = {
                  firstName: "<?php echo htmlspecialchars($currentUser->getFirstName()); ?>",
                  lastName: "<?php echo htmlspecialchars($currentUser->getLastName()); ?>",
                  email: "<?php echo htmlspecialchars($currentUser->getEmail()); ?>",
                  password: "<?php echo htmlspecialchars($currentUser->getPassword()); ?>"
              };

              const cancelButton = document.querySelector('button[type="reset"]');
              cancelButton.addEventListener('click', function () {
                  if (isFormChanged() || isProfilePictureChanged) {
                      const confirmDiscard = confirm("You have unsaved changes. Are you sure you want to discard them?");
                      if (confirmDiscard) {
                          alert("Changes discarded!");
                          window.location.reload();
                      }
                  } else {
                      alert("No changes made.");
                  }
              });

              const saveButton = document.querySelector('button[type="submit"]');
              saveButton.addEventListener('click', function (event) {
                  if (!isFormChanged() && !isProfilePictureChanged) {
                      event.preventDefault(); // Prevent the form from submitting when no changes are made
                      alert("No changes made. Please update the form before saving.");
                  } else {
                      alert("Changes saved!");
                  }
              });

              function isFormChanged() {
                  return (
                      updateUserAndPicForm.elements.firstName.value !== initialFormValues.firstName ||
                      updateUserAndPicForm.elements.lastName.value !== initialFormValues.lastName ||
                      updateUserAndPicForm.elements.email.value !== initialFormValues.email ||
                      updateUserAndPicForm.elements.password.value !== initialFormValues.password
                  );
              }

      });
    </script>
    <script src="../javascript/profile.js" defer></script>

  <section class="footer-section">
          <div class="footer-navs-and-information">
            <div>
              <img class="website-logo" src="../images/IDH-logo-1.png" alt="Logo of ITDiscoverHub" />
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
                <a href="https://www.facebook.com/profile.php?id=61555182040614"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/itdiscoverh/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://twitter.com/itdiscover_hub"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/it-discover-hub-7453472a9/"><i class="fa-brands fa-linkedin-in"></i></a>
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