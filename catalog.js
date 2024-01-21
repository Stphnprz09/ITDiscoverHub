let wishlistBtns = document.querySelectorAll(".wishlist-btn");
console.log(wishlistBtns);

for (let i = 0; i < wishlistBtns.length; i++) {
  wishlistBtns[i].addEventListener("click", function () {
    if (isLoggedIn) {
    } else {
      window.location.href = "login.php";
    }
  });
}
