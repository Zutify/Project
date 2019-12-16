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
            <span class="user-rating"></span>

            <h1 class="rate">Oceń przejazd</h1>

            <div class="col-6">
                <label for="5star" class="rate">5</label>
            </div>

            <div class="col-6">
                <input type="radio" name="star" id="5star" value="5" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;"><span class="star"></span>
            </div>


            <div class="col-6">
                <label for="4star" class="rate">4</label>
            </div>

            <div class="col-6">
                <input type="radio" name="star" id="4star" value="4" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;">
            </div>
            <div class="col-6">
                <label for="3star" class="rate">3</label>
            </div>

            <div class="col-6">
                <input type="radio" name="star" id="3star" value="3" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;">
            </div>


            <div class="col-6">
                <label for="2star" class="rate">2</label>
            </div>

            <div class="col-6">
                <input type="radio" name="star" id="2star" value="2" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;">
            </div>

            <div class="col-6">
                <label for="1star" class="rate">1</label>
            </div>

            <div class="col-6">
                <input type="radio" name="star" id="1star" value="1" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;">
            </div>



            <div>
                <input type="submit" value="DALEJ" name="submitRate" class="btn btn-success btn-lg btn-block" style="height: 120px; font-size: 50px; margin-top: 150px;">
            </div>
        </form>
    </div>


</div>