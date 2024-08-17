//  script for click on fas fa-bars toggle-menu in phone screen 
let BtnList = document.getElementsByClassName("fas fa-bars toggle-menu")[0]
let links = document.querySelector('[class="links"]')

window.addEventListener("resize", function () {
  if (window.innerHeight <= 768) {
    links.style.display = "none"
    BtnList.onclick = () => {
      links.style.cssText = "display: flex; flex-direction: column; position:absolute; top:100%; left:0; width: 100%;background-color: #00000075; "
    }
    links.onmouseleave = () => {
      links.style.display = "none"
    }
  }
  if (window.innerWidth > 768) {
    links.style.cssText = "display: flex; position: relative; "
    links.onmouseleave = () => {
      links.style.display = "display: flex; position: relative; "
    }
  }
})
// ==============================================

// script to add new skill
let btnSkill = document.getElementsByClassName("btn-skill")[0]
let Newskill = document.querySelector('[class="Newskill"]')
console.log(Newskill)
btnSkill.onclick = () => {
  lay.style.display = "block";
  Newskill.style.display = "block"
}
let btnAddSkill = document.querySelector('[add="add"]')
let inputSkill = document.querySelector('[id="Nskill"]')
btnAddSkill.onclick = () => {
  if (!inputSkill.value == "") {
    let ul = document.querySelector('[class="ulSkill"]')
    let liValue = document.createElement("li")
    liValue.innerHTML = inputSkill.value
    ul.appendChild(liValue)
    lay.style.display = "none";
    Newskill.style.display = "none"
  }
  else {
    //window.alert("add skill")
    lay.style.display = "none";
    Newskill.style.display = "none"
  }
}
// ========================================
// script to add new project
let projects = document.getElementsByClassName("projects")[0];
let addform = document.getElementsByClassName("addForm")[0];
let lay = document.getElementsByClassName("addlay")[0];
let projImge = document.querySelector('[name="photoProj"]');
let projName = document.querySelector('[name="projName"]');
let projInfo = document.querySelector('[name="infoproj"]');
let sub = document.querySelector('[class="sub"]');



let add = document.getElementsByClassName("fa-plus")[0];
add.onclick = function () {
  lay.style.display = "block";
  addform.style.display = "grid";
}

lay.onclick = () => {
  lay.style.display = "none";
  addform.style.display = "none";
  //new skill
  Newskill.style.display = "none"
}
//=============================================

// script to add new comment 
CountAveRating()
puttotalrate()
// function for ratings in comment from data dase 
function RateFromDB() {
  let cards = document.querySelectorAll('[class="card fornum"]');
  let rate = document.querySelectorAll('[class="numOfRateFromDB"]');
  for (let i = 0; i < (cards.length); i++) {//for cards
    for (let j = 0; j < rate[i].innerHTML; j++) {//for stars
      console.log("donnned")
      cards[i].lastElementChild.firstElementChild.children[j].style.color = "var(--mainColor)"
    }
  }
}
RateFromDB()
window.RateFromDB()
//script for ratings
let rats = document.querySelector('[class="rating not"]')

let selectedRating = 0;

function highlight(starNumber) {
  for (let i = 1; i <= starNumber; i++) {
    document.querySelector(`.rating.not .star:nth-child(${i})`).style.color = 'red';
  }
}

function resetStars() {
  for (let i = 1; i <= 5; i++) {
    document.querySelector(`.rating.not .star:nth-child(${i})`).style.color = (i <= selectedRating) ? 'var(--mainColor)' : 'black';
  }
}

function rate(rating) {
  selectedRating = rating;
  resetStars();
  console.log(`Rated: ${rating} stars`);
  document.querySelector('[name="numOfRateIn1Comm"]').value = rating;
}

function removeAtrr() {
  let star = document.querySelectorAll(".star")
  for (let i = 0; i < star.length; i++) {
    if (!star[i].parentElement.classList.contains("not")) {
      star[i].removeAttribute("onclick")
      star[i].removeAttribute("onmouseover");
      star[i].removeAttribute("onmouseout");
    }
  }
}
removeAtrr()

function removeNot() {
  let star = document.querySelectorAll(".star")
  for (let i = 0; i < star.length; i++) {
    if (star[i].parentElement.classList.contains("not")) {
      star[i].parentElement.classList.remove("not")
    }
  }
}


function CountAveRating() {
  let star = document.querySelectorAll(".star")
  let CountOf5 = 0
  let CountOfColor = 0
  for (let i = 0; i < star.length; i++) {
    if (i % 5 == 0) {
      CountOf5++
    }
    if (star[i].style.color == "var(--mainColor)") {
      CountOfColor++;
    }
  }
  console.log(`count of stars has color: ${CountOfColor}`)
  console.log(`count of group stars : ${CountOf5}`)

  let average = CountOfColor / (CountOf5 - 1);
  console.log(`Average of ratings : ${average}`)
  console.log(`##################################`)
  return average;

}
CountAveRating()

function puttotalrate() {
  let totalrate = CountAveRating();
  let starsRate = document.querySelectorAll(".total-rate");
  for (let i = 0; i < starsRate.length; i++) {
    starsRate[i].style.color = "var(--mainColor)";
  }
  let NewtotalRate = Math.round(totalrate);
  console.log(`New Total Rate = ${NewtotalRate}`)
  for (let i = 0; i < NewtotalRate; i++) {
    starsRate[i].style.color = "greenyellow";
  }
}
puttotalrate()

