<!DOCTYPE html>
<html>
<head>
<?php 

  require_once __DIR__ . '/businesses.php';

?>
<style>
input[type=text] {
    width: 330px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}

form.search_box {
  margin-bottom: -5%;
}

html, body { height: 100%; padding: 0; margin: 0; }
div { width: 25%; height: 25%; float: left; margin-top: 5% }

/* The Overlay (background) */
.overlay {
    /* Height & width depends on how you want to reveal the overlay (see JS below) */    
    height: 100%;
    width: 0;
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    background-color: rgb(0,0,0); /* Black fallback color */
    background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
    overflow-x: hidden; /* Disable horizontal scroll */
    transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
    top: 25%; /* 25% from the top */
    width: 100%; /* 100% width */
    text-align: center; /* Centered text/links */
    margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
}

.overlay-content h1{
    color: white;
}

/* The navigation links inside the overlay */
.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block; /* Display block instead of inline */
    transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

img{ 
  cursor: pointer; 
  cursor: hand; 
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
    }
}

</style>

</head>
<body>

<p>What Should I Eat in Dublin?</p>
<form class="search_box">
  <input type="text" name="search" placeholder="Search for a kind of food..">
</form>

</br></br>
<?php $i = 1 ?>
<?php foreach ($groups as $food_type): ?>
  <?php $random_business_id = array_rand($businesses[$food_type], 1); ?>
  <?php // echo '<pre>' . print_r($businesses[$food_type][$random_business_id], true) . '</pre>' ?>
  <div id="div<?php print $i ?>"
    data-website="<?php print $businesses[$food_type][$random_business_id]['website'] ?>"
    data-name="<?php print $businesses[$food_type][$random_business_id]['name'] ?>"
  >
      <img src="http://www.paddykeoghgoode.com/whatshouldieatindublin/<?php print $food_type ?>.png" onclick="openNav(<?php print($i) ?>)">
  </div>
<?php $i++ ?>
<?php endforeach; ?>

<div id="myNav" class="overlay">
<!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <!-- Overlay content -->
  <div class="overlay-content">
    <h1 id="company-name">Company Name</h1>
    <a id="website-link" href="#">URL</a>
  </div>
</div>

<script type="text/javascript">
  /* Open when someone clicks on the span element */
function openNav(counter) {
    document.getElementById("myNav").style.width = "100%";

    var id = "div" + counter;
    var website = document.getElementById(id).getAttribute("data-website");
    var name = document.getElementById(id).getAttribute("data-name");
    document.getElementById("website-link").setAttribute("href",website);
    document.getElementById("website-link").innerHTML = website;
    document.getElementById("company-name").innerHTML = name;
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>

</body>
</html>

