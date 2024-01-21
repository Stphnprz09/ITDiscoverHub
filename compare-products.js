// get all the elements of search containers
const searchContainers = document.getElementsByClassName("search-container");

// adds 'input' event listener to search inputs
// whenever user types a letter in the search input, it will generate search suggestions
for (let i = 0; i < searchContainers.length; i++) {
  let searchContainer = searchContainers[i];
  let searchInput = searchContainers[i].querySelector(".search-input");

  searchInput.addEventListener("input", function () {
    getSearchSuggestions(searchContainer, searchInput, "smartphones");
  });
}

// this gets and displays the search suggestions
// it is called in the event listener for search suggestions
// it fetches data from the PHP server every time a user inputs a letter in the search input
function getSearchSuggestions(searchContainer, searchInput, searchIn) {
  // where search suggestions will be displayed
  const searchSuggestionsContainer = searchContainer.querySelector(
    ".search-suggestions-container"
  );
  const searchSuggestions = searchContainer.querySelector(
    ".search-suggestions"
  );

  if (searchInput.value.trim() === "") {
    searchSuggestionsContainer.style.display = "none";
    searchSuggestions.innerHTML = "";
    return;
  }

  // fetches the search suggestions data
  fetch(
    "backend/search_suggestions_server.php?searchIn=" +
      searchIn +
      "&searchFor=" +
      searchInput.value
  )
    .then((response) => response.json())
    .then((data) => {
      searchSuggestionsContainer.style.display = "block";
      searchSuggestions.innerHTML = "";

      for (let i = 0; i < data.length; i++) {
        // creates the list element for each fetched data, which is appended to the search suggestions
        let searchSuggestionsItem = document.createElement("li");
        searchSuggestionsItem.innerText = data[i];
        searchSuggestionsItem.classList.add("search-suggestions-item");
        searchSuggestions.appendChild(searchSuggestionsItem);

        // adds 'click' event listeners to each search suggestions item
        // if clicked, the clicked item's data will be fetched from the PHP server, then displayed in the compare table
        searchSuggestionsItem.addEventListener("click", function () {
          getProduct(
            searchSuggestionsItem,
            searchInput,
            searchSuggestionsContainer,
            searchSuggestions
          );
        });
      }

      if (data.length <= 0) {
        searchSuggestions.innerHTML = "<p>No results found.</p>";
        searchSuggestions.style.padding = "10px";
      }
    })
    .catch((error) => console.error("Error fetching suggestions:", error));
}

// this gets the clicked item of the user from the search suggestions, and displays in the compare table
// the data of the clicked item is fetched from the PHP server
function getProduct(
  searchSuggestionsItem,
  searchInput,
  searchSuggestionsContainer,
  searchSuggestions
) {
  let model = searchSuggestionsItem.innerText;
  let column = null;

  // to determine which column should the data be displayed
  if (searchSuggestionsItem.parentElement.classList.contains("col-1")) {
    column = 1;
  } else if (searchSuggestionsItem.parentElement.classList.contains("col-2")) {
    column = 2;
  }

  // fetches the product data
  fetch("backend/catalog_products_server.php?model=" + model)
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      document.getElementById("brand-col-" + column).innerText = data["brand"];
      document.getElementById("model-col-" + column).innerText = data["model"];
      document.getElementById("screen-col-" + column).innerText =
        data["screen"];
      document.getElementById("os-col-" + column).innerText = data["os"];
      document.getElementById("chipset-col-" + column).innerText =
        data["chipset"];
      document.getElementById("GPU-col-" + column).innerText = data["GPU"];
      document.getElementById("RAM-col-" + column).innerText = data["RAM"];
      document.getElementById("storage-col-" + column).innerText =
        data["storage"];
      document.getElementById("price-col-" + column).innerText = data["price"];

      // clear search suggestions once data is fetched and displayed
      searchInput.value = "";
      searchSuggestionsContainer.style.display = "none";
      searchSuggestions.innerHTML = "";
    })
    .catch((error) => console.error("Error fetching product:", error));
}

// this is so that when the user clicks outside the search input, the search suggestions will stop being displayed
// but when the user clicks the search input again, the search suggestions will display again
document.addEventListener("click", function (e) {
  let searchSuggestionsContainers = document.querySelectorAll(
    ".search-suggestions-container"
  );

  if (
    e.target.classList.contains("search-input") &&
    e.target.value.trim() === ""
  ) {
    if (e.target.classList.contains("col-1")) {
      searchSuggestionsContainers[0].style.display = "block";
    } else if (e.target.classList.contains("col-2")) {
      searchSuggestionsContainers[1].style.display = "block";
    }
  } else {
    for (let i = 0; i < searchSuggestionsContainers.length; i++) {
      searchSuggestionsContainers[i].style.display = "none";
    }
  }
});
