const btnFilterAll = document.getElementById("filterAll");
const btnFilterStarter = document.getElementById("filterStarter");
const btnFilterDish = document.getElementById("filterDish");
const btnFilterDessert = document.getElementById("filterDessert");

const starters = document.getElementById("starters");
const dishes = document.getElementById("dishes");
const desserts = document.getElementById("desserts");


if(btnFilterAll != null){
btnFilterAll.addEventListener("click", (evt) => {
    btnFilterStarter.classList.remove("active");
    btnFilterDish.classList.remove("active");
    btnFilterDessert.classList.remove("active");

    evt.currentTarget.classList.add("active");
    
    starters.style.display = "grid";
    dishes.style.display = "grid";
    desserts.style.display = "grid";
})};


if(btnFilterStarter != null){
btnFilterStarter.addEventListener("click", (evt) => {
    btnFilterAll.classList.remove("active");
    btnFilterDish.classList.remove("active");
    btnFilterDessert.classList.remove("active");

    evt.currentTarget.classList.add("active");
    
    starters.style.display = "grid";
    dishes.style.display = "none";
    desserts.style.display = "none";
})};


if(btnFilterDish != null){
btnFilterDish.addEventListener("click", (evt) => {
    btnFilterAll.classList.remove("active");
    btnFilterStarter.classList.remove("active");
    btnFilterDessert.classList.remove("active");

    evt.currentTarget.classList.add("active");
    
    starters.style.display = "none";
    dishes.style.display = "grid";
    desserts.style.display = "none";
})};


if(btnFilterDessert != null){
btnFilterDessert.addEventListener("click", (evt) => {
    btnFilterAll.classList.remove("active");
    btnFilterStarter.classList.remove("active");
    btnFilterDish.classList.remove("active");

    evt.currentTarget.classList.add("active");
    
    starters.style.display = "none";
    dishes.style.display = "none";
    desserts.style.display = "grid";
})};





