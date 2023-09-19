const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle "),
      toggle1 = body.querySelector(".toggle1"),
      toggle2 = body.querySelector(".toggle2"),
      searchBtn = body.querySelector(".Sb"),
      modeSwtich = body.querySelector(".Sb")

      toggle.addEventListener("click", () => {
        sidebar.classList.toggle("closer");
      });

      toggle1.addEventListener("click", () => {
        sidebar.classList.toggle("closer");
      });

      toggle2.addEventListener("click", () => {
        sidebar.classList.toggle("closer");
      });

const popup = document.getElementById("popup");
      
const openPopup = () => {
  popup.style.display = "block";
};

const closePopup = () => {
  popup.style.display = "none";
};

const form = document.querySelector("form");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;

  closePopup();
});

//ฟังชั่นต้นหา
function validateSearchForm() {
    var searchInput = document.getElementById("searchInput").value;
    if (searchInput.trim() === "") {
    }
}
