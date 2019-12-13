<?php

?>

<div class="container-fluid" style="min-width: 250px;">
    <div class="mt-5 mb-5 ml-5">
        <a href="index.php?page=?" class="h4 text-dark">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Wstecz
        </a>
    </div>



    <div class="w-75 mx-auto ">

        <form action="php/rating_add.php" method="POST">
            <h1 class="row">Oceń przejazd</h1>

            <div class="row rate">
                <input type="radio" id="5star" name="rate" value="5" />
                <label for="5star" title="text">5 stars</label>
                <input type="radio" id="4star" name="rate" value="4" />
                <label for="4star" title="text">4 stars</label>
                <input type="radio" id="3star" name="rate" value="3" />
                <label for="3star" title="text">3 stars</label>
                <input type="radio" id="2star" name="rate" value="2" />
                <label for="2star" title="text">2 stars</label>
                <input type="radio" id="1star" name="rate" value="1" />
                <label for="1star" title="text">1 star</label>
            </div>

            <div>
                <input type="submit" value="DALEJ" name="submitRate" class="btn btn-success btn-lg btn-block" style="height: 120px; font-size: 50px; margin-top: 150px;">
            </div>
        </form>
    </div>


</div>