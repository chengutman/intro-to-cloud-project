(function() {
  var audio = new Audio(
    "https://cdn.rawgit.com/bl4ckdu5t/csa/21eb94fa/audio/sugar.mp3"
  );
  audio.loop = true;
  audio.play();
  var controlBtn = document.querySelector("control");
  document.addEventListener("click", e => (audio.paused ? audio.play() : audio.pause()));
})();

