<?php 
    require_once 'card-data.php';
?>

<div class="card-wrapper --center-align">
    <?php for ($i = 0; $i < 3; $i++) { 
         echo '
         <div class="card">
            <div class="card__title">
               <h5>'.$fullName.', <span class="card__title--age">'.$age.'</span></h5>
               <p class="card__title--username">('.$username.')</p>
               <p class="card__title--about">'.$about.'</p>
            </div>
 
            <div class="card__info">';
               if(isset($_SESSION['loggedin'])) {
                   echo '<a href="#" class="card__info--email" title="'.$username.'\'s email address">'.$email.'</a>';

               } else {
                   echo '<a href="#" class="card__info--email" title="You have to login to view'.$username.'\'s email address"></a>';
               }
               echo '
               <a href="#" class="card__info--postal" title="'.$username.'\'s postal code">'.$postalCode.'</a>
               <a href="#" class="card__info--salary" title="'.$username.'\'s monthly salary">'.$salary.'</a>
               <a href="#" class="card__info--seeking" title="'.$username.'\'s seeking preference">'.$seeking.'</a>
            </div>
 
            <div id="mapid" class="card__map"></div>
            
            <div class="card__poi">
                <p>Possible meeting spots:</p>
                <ul class="card__poi-list"></ul>
            </div>
 
            <div class="card__options">
               <div class="card__options--dislike"></div>
               <div class="card__options--like"></div>
            </div>
         </div>';
    } ?>
</div>