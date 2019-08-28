<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>APP NAME</title>
        <link rel="stylesheet" href="assets/css/studentscreenstyle.css">
        <script src="assets/js/studentscreenfunc.js"></script>
    </head>
    <body>
        <div class="box">
        <h2 align="center">Student Activity Screen <h2>
            <form method="post" action="login.php">
                <div>
                    <label align="left">TITLE: Vocabulary is important</label>  Time left: <span id="timer" onchange="startTime()"></span>
                </div>
        <div class="inputBox">
            <textarea rows="10" cols="50" placeholder="Start writing your essay .">
            </textarea>
        </div>
        <div style="text-align: center;">
            <input type="submit" name="submit" value="Login">
        </div>
        <br />
        <br />
                <script>
                document.getElementById('timer').innerHTML =
                05 + ":" + 00;
                startTimer();

                function startTimer() 
                {
                  var presentTime = document.getElementById('timer').innerHTML;
                  var timeArray = presentTime.split(/[:]+/);
                  var m = timeArray[0];
                  var s = checkSecond((timeArray[1] - 1));
                  if(s==59){m=m-1}
                  if(m<0){alert('timer completed')}

                  document.getElementById('timer').innerHTML =
                    m + ":" + s;
                  setTimeout(startTimer, 1000);
                }

                function checkSecond(sec)
                {
                  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                  if (sec < 0) {sec = "59"};
                  return sec;
                }

                </script>
            </form>
        </div>
    </body>
</html>