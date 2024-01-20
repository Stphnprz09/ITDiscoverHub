// let searchIn = document.getElementById("search-in");
// searchIn.addEventListener("change", function () {
//   // searchIn = searchIn.value;
//   console.log(searchIn.value);
// });

const searchContainers = document.querySelectorAll(
  ".compare-products-container .search-container"
);
for (let i = 0; i < searchContainers.length; i++) {
  let searchContainer = searchContainers[i];
  let searchInput = searchContainers[i].querySelector(".search-input");

  searchInput.addEventListener("input", function () {
    getSearchSuggestions(searchContainer, searchInput, "smartphones");
  });
}

document.addEventListener("click", function (e) {
  if (e.target.classList.contains("search-suggestions-list-item")) {
    let model = e.target.innerText;
    let column = null;
    if (e.target.parentElement.classList.contains("col-1")) {
      column = 1;
    } else if (e.target.parentElement.classList.contains("col-2")) {
      column = 2;
    }
    fetch("catalog-products.php?model=" + model)
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        document.getElementById("brand-col-" + column).innerText =
          data["brand"];
        document.getElementById("model-col-" + column).innerText =
          data["model"];
        document.getElementById("screen-col-" + column).innerText =
          data["screen"];
        document.getElementById("os-col-" + column).innerText = data["os"];
        document.getElementById("chipset-col-" + column).innerText =
          data["chipset"];
        document.getElementById("GPU-col-" + column).innerText = data["GPU"];
        document.getElementById("RAM-col-" + column).innerText = data["RAM"];
        document.getElementById("storage-col-" + column).innerText =
          data["storage"];
        document.getElementById("price-col-" + column).innerText =
          data["price"];
      })
      .catch((error) => console.error("Error fetching:", error));

    clearSuggestions();
  }
});

function getSearchSuggestions(searchContainer, searchInput, searchIn) {
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

  fetch(
    "search-suggestions.php?searchIn=" +
      searchIn +
      "&searchFor=" +
      searchInput.value
  )
    .then((response) => response.json())
    .then((data) => {
      searchSuggestionsContainer.style.display = "block";
      searchSuggestions.innerHTML = "";

      for (let i = 0; i < data.length; i++) {
        let searchSuggestionsItem = document.createElement("li");
        searchSuggestionsItem.innerText = data[i];
        searchSuggestionsItem.classList.add("search-suggestions-list-item");
        searchSuggestions.appendChild(searchSuggestionsItem);
      }

      if (data.length <= 0) {
        searchSuggestions.innerHTML = "<p>No results found.</p>";
      }
    })
    .catch((error) => console.error("Error fetching suggestions:", error));
}

function clearSuggestions() {
  let searchInputs = document.querySelectorAll(".search-input");
  for (let i = 0; i < searchInputs.length; i++) {
    searchInputs[i].value = "";
  }
  let searchSuggestionsContainers = document.querySelectorAll(
    ".search-suggestions-container"
  );
  for (let i = 0; i < searchSuggestionsContainers.length; i++) {
    searchSuggestionsContainers[i].style.display = "none";
  }
  let searchSuggestions = document.querySelectorAll(".search-suggestions");
  for (let i = 0; i < searchSuggestions.length; i++) {
    searchSuggestions[i].innerHTML = "";
  }
}
