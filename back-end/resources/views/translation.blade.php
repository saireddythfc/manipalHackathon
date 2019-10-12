<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <title>Speech to text conversion using JavaScript</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <style>
body {
  background: #1e2440;
  color: #f2efe2;
  font-size: 16px;
}
 
 
button:focus {
    outline: 0;
}
 
.mycontainer {
    max-width: 500px;
    margin: 0 auto;
    padding: 150px 100px;
    text-align: center;
}
 
 
.mywebapp {
    margin: 50px auto;
}
 
#textbox {
    margin: 30px 0;
}
 
@media (max-width: 768px) {
  .mycontainer {
    width: 85vw;
    max-width: 85vw;
  }
 
    button {
        margin-bottom: 10px;
}
}

</style>
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
 
    </head>
 
    <body>
        <div class="mycontainer">
 
            <h1>Speech to text conversion using JavaScript</h1>
 
            <div class="mywebapp">
                <div class="input">
                    <textarea id="textbox" rows="6"></textarea>
                </div>        
                <button id="start-btn" title="Start">Start</button>
                <p id="instructions">Press the Start button</p>

                <button class="btn btn-primary">Post Title</button>

            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
var SpeechRecognition = window.webkitSpeechRecognition;  
var recognition = new SpeechRecognition();
var Textbox = $('#textbox');
var instructions = $('instructions');
var Content = '';
recognition.continuous = true;
recognition.onresult = function(event)
{
  var current = event.resultIndex;
    var transcript = event.results[current][0].transcript;
    Content += transcript;
console.log(Content);
Textbox.val(Content);
};
     
recognition.onstart = function() {
instructions.text('Voice recognition is ON.');
}
 
recognition.onspeechend = function() {
  instructions.text('No activity.');
}
 
recognition.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions.text('Try again.');  
  }
}
 
$('#start-btn').on('click', function(e) {
  if (Content.length) {
    Content += ' ';
  }
  recognition.start();
console.log('recording start');
});

$
 
Textbox.on('input', function() {
  Content = $(this).val();
})
</script>
    </body>
</html>