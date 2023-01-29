<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AJAX Example</title>
</head>
<body>
  <h1>AJAX Example</h1>

  <p>The time in stef's underwear is <time id="currentTime"><?= date('g:i:s') ?></time></p>

  <button id="btn">Refresh</button>
  
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script>
    // $('#btn').on('click', function(){

    //   $.ajax("gettime.php").done(
    //     function(data) {
          
    //       $("#currentTime").html(data);
    //     }
    //   )

    // });

    setInterval(() => {
      $.ajax("gettime.php").done(function(data) {
        $("#currentTime").html(data);
      })
    }, 1000);
  </script>
</body>
</html>