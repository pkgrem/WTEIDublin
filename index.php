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

html, body { height: 100%; padding: 0; margin: 0; }
div { width: 25%; height: 25%; float: left; margin-top: 5% }
#div1 { background: #DDD; }
#div2 { background: #AAA; }
#div3 { background: #777; }
#div4 { background: #444; }

</style>

</head>
<body>

<p>What Should I Eat in Dublin?</p>
<form>
  <input type="text" name="search" placeholder="Search for a kind of food..">
</form>

</br></br>
<?php $i = 1 ?>
<?php foreach ($groups as $food_type): ?>
  <?php // UNCOMMENT ME WHEN QUERY LIMIT IS RESET $random_business = array_rand($businesses[$food_type], 1); ?>
  <div id="div<?php print $i ?>">
  <!-- UNCOMMENT ME WHEN QUERY LIMIT IS RESET 
    <a href="<?php //print $random_business['website'] ?>"> 
  -->
  <!-- COMMENT ME OUT WHEN QUERY LIMIT IS RESET -->
    <a href="<?php print $businesses[$food_type][0]['website'] ?>">
  <!-- **************** -->
      <img src="http://www.paddykeoghgoode.com/whatshouldieatindublin/<?php print $food_type ?>.png">
    </a>
  </div>
  <?php $i++ ?>
<?php endforeach; ?>



</body>
</html>

