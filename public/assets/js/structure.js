let buttons = document.querySelectorAll(".btnModif");
let inputTodo = document.getElementById("tacheModif");
let inputId = document.getElementById("idTache");
let modifDiv = document.querySelector(".modif");
let sousCorp = document.querySelector(".sousCorps");

buttons.forEach((btn) => {
  btn.addEventListener("click", () => {
    let description = btn.dataset.description;
    let id = btn.dataset.id;
    inputTodo.value = description;
    inputId.value = id;
    modifDiv.scrollIntoView({ behavior: "smooth" });
    modifDiv.classList.add("montrer");
  });
});

document.addEventListener("click", (e) => {
    
    if (!modifDiv.contains(e.target) && !e.target.closest(".btnModif")) {
      modifDiv.classList.remove("montrer");
    }
  
});
