const home = document.getElementById("home");
const ranks = document.getElementById("ranks");
const calledRBT = document.getElementById("calledRBT");
const callingRBT = document.getElementById("callingRBT");
const allRBT = document.getElementById("allRBT");

const homeTab = document.getElementById("homeTab");
const ranksTab = document.getElementById("ranksTab");
const calledRBTTab = document.getElementById("calledRBTTab");
const callingRBTTab = document.getElementById("callingRBTTab");
const allRBTTab = document.getElementById("allRBTTab");

homeTab.addEventListener("click", function () {
  home.classList.remove("d-none");
  ranks.classList.add("d-none");
  calledRBT.classList.add("d-none");
  callingRBT.classList.add("d-none");
  allRBT.classList.add("d-none");

  homeTab.classList.add("active");
  ranksTab.classList.remove("active");
  allRBTTab.classList.remove("active");
});

ranksTab.addEventListener("click", function () {
  home.classList.add("d-none");
  ranks.classList.remove("d-none");
  calledRBT.classList.add("d-none");
  callingRBT.classList.add("d-none");
  allRBT.classList.add("d-none");

  homeTab.classList.remove("active");
  ranksTab.classList.add("active");
  allRBTTab.classList.remove("active");
});

callingRBTTab.addEventListener("click", function () {
  home.classList.add("d-none");
  ranks.classList.add("d-none");
  calledRBT.classList.add("d-none");
  callingRBT.classList.remove("d-none");
  allRBT.classList.add("d-none");

  homeTab.classList.remove("active");
  ranksTab.classList.remove("active");
  allRBTTab.classList.remove("active");
});

calledRBTTab.addEventListener("click", function () {
  home.classList.add("d-none");
  ranks.classList.add("d-none");
  calledRBT.classList.remove("d-none");
  callingRBT.classList.add("d-none");
  allRBT.classList.add("d-none");

  homeTab.classList.remove("active");
  ranksTab.classList.remove("active");
  allRBTTab.classList.remove("active");
});

allRBTTab.addEventListener("click", function () {
  home.classList.add("d-none");
  ranks.classList.add("d-none");
  calledRBT.classList.add("d-none");
  callingRBT.classList.add("d-none");
  allRBT.classList.remove("d-none");

  homeTab.classList.remove("active");
  ranksTab.classList.remove("active");
  allRBTTab.classList.add("active");
});
