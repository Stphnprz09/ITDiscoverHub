let wishlistBtns = document.querySelectorAll(".wishlist-btn");
let removeWishlistBtns = document.querySelectorAll(".remove-wishlist-btn");

for (let i = 0; i < wishlistBtns.length; i++) {
  let wishlistBtn = wishlistBtns[i];
  wishlistBtn.addEventListener("click", function () {
    if (isLoggedIn) {
      model = wishlistBtn.getAttribute("data-model");

      fetch("backend/wishlist_server.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
          "email=" +
          encodeURIComponent(email) +
          "&category=" +
          encodeURIComponent(category) +
          "&model=" +
          encodeURIComponent(model),
      })
        .then((response) => response.text())
        .then((data) => {
          if (data == "1") {
            alert("Successfully added to your wish list.");
          } else {
            alert("An error occured. Please try again later.");
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });

      location.reload();
    } else {
      window.location.href = "login.php";
    }
  });
}

for (let i = 0; i < removeWishlistBtns.length; i++) {
  let removeWishlistBtn = removeWishlistBtns[i];
  removeWishlistBtn.addEventListener("click", function () {
    model = removeWishlistBtn.getAttribute("data-model");

    fetch(
      "backend/wishlist_server.php?email=" +
        email +
        "&category=" +
        category +
        "&model=" +
        model,
      {
        method: "DELETE",
      }
    )
      .then((response) => response.text())
      .then((data) => {
        if (data == "1") {
          alert("Wishlist successfully deleted.");
          location.reload();
        } else {
          alert("An error occured. Please try again later.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
}
