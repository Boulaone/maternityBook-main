var choixDate = document.getElementById("choix_date");
var date = document.getElementById("date");

choixDate.addEventListener("change", function() {
  if (choixDate.value === "date_conception" || choixDate.value === "date_regles") {
    date.classList.remove("hidden");
  } else {
    date.classList.add("hidden");
  }
});