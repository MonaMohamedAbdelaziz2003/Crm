<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 id="mm"></h1>
<script>
    fetch("http://127.0.0.1:8000/api/customer/1/projects")
    .then((response) => {
        return response.json();
    })
    .then((data) => {
          document.getElementById("mm").innerHTML =JSON.stringify(data);
      })
  </script>
</body>
</html>
<?php
