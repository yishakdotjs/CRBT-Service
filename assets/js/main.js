const home = document.getElementById("home");
const ranks = document.getElementById("ranks");
// const calledRBT = document.getElementById("calledRBT");
// const callingRBT = document.getElementById("callingRBT");
// const allRBT = document.getElementById("allRBT");

const homeTab = document.getElementById("homeTab");
const ranksTab = document.getElementById("ranksTab");
// const calledRBTTab = document.getElementById("calledRBTTab");
// const callingRBTTab = document.getElementById("callingRBTTab");
// const allRBTTab = document.getElementById("allRBTTab");

homeTab.addEventListener("click", function () {
  home.classList.remove("d-none");
  ranks.classList.add("d-none");
  // calledRBT.classList.add("d-none");
  // callingRBT.classList.add("d-none");
  // allRBT.classList.add("d-none");

  homeTab.classList.add("active");
  ranksTab.classList.remove("active");
  // allRBTTab.classList.remove("active");
});

ranksTab.addEventListener("click", function () {
  home.classList.add("d-none");
  ranks.classList.remove("d-none");
  // calledRBT.classList.add("d-none");
  // callingRBT.classList.add("d-none");
  // allRBT.classList.add("d-none");

  homeTab.classList.remove("active");
  ranksTab.classList.add("active");
  // allRBTTab.classList.remove("active");
});

// callingRBTTab.addEventListener("click", function () {
//   home.classList.add("d-none");
//   ranks.classList.add("d-none");
//   calledRBT.classList.add("d-none");
//   callingRBT.classList.remove("d-none");
//   allRBT.classList.add("d-none");

//   homeTab.classList.remove("active");
//   ranksTab.classList.remove("active");
//   allRBTTab.classList.remove("active");
// });

// calledRBTTab.addEventListener("click", function () {
//   home.classList.add("d-none");
//   ranks.classList.add("d-none");
//   calledRBT.classList.remove("d-none");
//   callingRBT.classList.add("d-none");
//   allRBT.classList.add("d-none");

//   homeTab.classList.remove("active");
//   ranksTab.classList.remove("active");
//   allRBTTab.classList.remove("active");
// });

// allRBTTab.addEventListener("click", function () {
//   home.classList.add("d-none");
//   ranks.classList.add("d-none");
//   calledRBT.classList.add("d-none");
//   callingRBT.classList.add("d-none");
//   allRBT.classList.remove("d-none");

//   homeTab.classList.remove("active");
//   ranksTab.classList.remove("active");
//   allRBTTab.classList.add("active");
// });

const login = document.getElementById("login");
const register = document.getElementById("register");

login.addEventListener("click", function () {
  $("#loginModal").modal("show");
});

register.addEventListener("click", function () {
  $("#registerModal").modal("show");
});

const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");

loginForm.addEventListener("submit", function (e) {
  e.preventDefault();
  const email = document.getElementById("loginEmail").value;
  const password = document.getElementById("loginPassword").value;

  $.post(
    "validate.inc.php",
    { form: "login", email, password },
    function (response) {
      // Log the response to the console
      if (response === "success") {
        loginForm.submit();
      } else {
        alert(response);
      }
    }
  );
});

registerForm.addEventListener("submit", function (e) {
  e.preventDefault();

  const username = document.getElementById("registerName").value;
  const email = document.getElementById("registerEmail").value;
  const password = document.getElementById("registerPassword").value;

  $.post(
    "validate.inc.php",
    { form: "register", username, email, password },
    function (response) {
      // Log the response to the console
      if (response === "success") {
        registerForm.submit();
      } else {
        alert(response);
      }
    }
  );
});

function play_audio(src) {
  let audioPlayer = document.getElementById("audio_player");

  if (audioPlayer.paused) {
    audioPlayer.setAttribute("src", src);
    audioPlayer.play();
  } else {
    audioPlayer.pause();
  }
}

function fast_forward() {
  let audioPlayer = document.getElementById("audio_player");

  if (!audioPlayer.paused) {
    audioPlayer.currentTime += 10;
  }
}

function fast_backward() {
  let audioPlayer = document.getElementById("audio_player");

  if (!audioPlayer.paused) {
    audioPlayer.currentTime -= 10;
  }
}
