<div class="row">
    <div class="col-12">
        <?php
            if(isset($reservation)){
                foreach ($reservation as $item) {
                    echo "<div class='col-12'><button class='btn btn-primary buttonDefault buttonDark '>Stolik: ".$item['IdStolik']."   Lokal: ".$item['IdLokal']."</button></div>";
                }
            }
            else{
                echo "<h1> Nie masz rezerwacji :(</h1>";
            }
        ?>
    </div>
</div>