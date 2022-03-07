<?php
echo "
<h1 style='text-align:center'> Here is the zip file contents: </h1>
<a href='download.php?path=public/Join.pdf' style='font-weight:bold' > Join.pdf </a>
<br>
<a href='#' style='font-weight:bold' onclick= 'display()' > test.png </a>


<div style='visibility: hidden'>
<hr>
<img src='public/test2.png' id='image' width='400' height='300' style='margin-left:300px'  />
</div>


<script>
function display(){
    var x = document.getElementById('image');
    if (x.style.visibility === 'hidden') {
      x.style.visibility = 'visible';
    } else {
      x.style.visibility = 'hidden';
    }
}
</script>
";

?>