const slidePage = document.querySelector(".slidePage");
const firstNextBtn = document.querySelector(".nextBtn");
const container = document.querySelector(".container");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submit = document.querySelector(".submit");
const progress = document.querySelector(".progress-bar")
const two = document.querySelector(".two");
const three = document.querySelector(".three");


firstNextBtn.addEventListener("click", function(){
  slidePage.style.marginLeft = "-50%";
  container.style.height = "40vh";
  two.style.backgroundColor = "var(--verdeClaro)";
  two.style.color = "var(--branco)";
  two.style.border = "3px solid var(--branco)";
})

nextBtnSec.addEventListener("click", function(){
  slidePage.style.marginLeft = "-100%";
  three.style.backgroundColor = "var(--verdeClaro)";
  three.style.color = "var(--branco)";
  three.style.border = "3px solid var(--branco)";
})

nextBtnThird.addEventListener("click", function(){
  slidePage.style.marginLeft = "-150%"
  progress.style.display = "none"
  container.style.height = "30vh"
})


prevBtnSec.addEventListener("click", function(){
  slidePage.style.marginLeft = "0%"
  container.style.height = "30vh";
  two.style.backgroundColor = "var(--branco)";
  two.style.color = "var(--verde)";
  two.style.border = "3px solid var(--verdeClaro)";
})

prevBtnThird.addEventListener("click", function(){
  slidePage.style.marginLeft = "-50%";
  three.style.backgroundColor = "var(--branco)";
  three.style.color = "var(--verde)";
  three.style.border = "3px solid var(--verdeClaro)";
})

prevBtnFourth.addEventListener("click", function(){
  slidePage.style.marginLeft = "-100%"
  progress.style.display = "flex"
  container.style.height = "40vh"
})
