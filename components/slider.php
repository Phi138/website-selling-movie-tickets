<div class="slider">
  <div class="list">
  <?php include "./CSQL/connectslide.php" ?>
  </div>
  <div class="buttons">
    <button id="prev">
      < </button>
        <button id="next"> > </button>
  </div>
  <ul class="dots">
    <li class="active"></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <?php
    // Thêm một slide mới và một thẻ li tương ứng
    $newSlide = "<div class='slide'>...</div>";
    $newDot = "<li></li>";
    
    echo $newSlide;
    echo $newDot;
    ?>
  </ul>
</div>
