
<html>
    <head>

<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
  <div class="box">
    <div class="search-bar">
      <form action="../search.php" method="GET">
        <input type="text" placeholder="Search" name="query" class="search-bar-new" value="<?php
        if (isset($_GET['query'])) {
            echo $_GET['query'];
        }?>">
        <button class="butn"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</div>
</body>
</html