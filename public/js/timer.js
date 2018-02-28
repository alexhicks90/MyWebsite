var timer = document.getElementById("timer");
    var time = 0;
    var tick = setInterval(function() {
      
      var hours = ("0" + Math.floor(time / 3600)).slice(-2);
      var minutes = ("0" + Math.floor(time / 60)).slice(-2);
      var seconds = ("0" + Math.floor(time % 60)).slice(-2);

      timer.innerHTML = hours + ":" + minutes + ":" + seconds;
      time++;
}, 1000); 