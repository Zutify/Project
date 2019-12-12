<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
include 'php/user_data.php';
?>


<div class="container-fluid" style="min-width: 250px;">
    <div class="mt-5 mb-5 ml-5">
        <a href="?page=editProfile" class="h4 text-dark">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Wstecz
        </a>
    </div>

    <div class="h2 ml-5 my-5">
        Opis kierowcy
    </div>
    <form action="php/car_add.php" method="POST">
        <div class="container-fluid mt-3 mb-5 h2">

            <div class="row w-100">
                <div class="col-8 border-bottom border-top border-dark py-5 pl-5">
                    <div class="pl-3">
                        <div class="row">
                            <div class="col-4">
                                Marka auta
                            </div>
                            <div class="col-8">
                                <?php
                                echo '<input name="carBrand" ';
                                if (isset($carBrand))
                                    echo 'value="' . $carBrand . '"';
                                echo ' class="display-inline-block" style="background: transparent; border:none; font-color: black;">'
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 border-bottom border-top border-left border-dark py-5">
                    <div class="pl-3">
                        <div class="row">
                            <div class="col-4">
                                Model
                            </div>
                            <div class="col-8">
                                <?php
                                echo '<input name="carModel"';
                                if (isset($carModel))
                                    echo 'value="' . $carModel . '"';
                                echo 'class="display-inline-block w-100" style="background: transparent; border:none; font-color: black;">'
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row w-100">
                <div class="col py-5 pl-5">
                    <div class="pl-3">
                        <div class="row">
                            <div class="col-4">
                                Opis
                            </div>
                            <div class="col-4">
                                <?php
                                echo '<textarea name="driverDescription" rows="6" cols="33" style="border: none;">';
                                if (isset($description))
                                    echo $description;
                                echo '</textarea>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->

        </div><!-- end container fluid - table -->


        <div class="w-50 mx-auto" style="margin-top: 0px;">
            <input type="submit" value="Potwierdź" name="submit" class="btn btn-success btn-block mb-5" style="height: 80px; border-radius: 40px; font-size: 40px;">
        </div>
    </form>



</div>
<!--<script>
    $(document).ready(function() {
        $('#btn-close').click(function() {
            $('#btn-driver').fadeIn();
            $('#btn-close').hide();
            $.when($('#driverInfo').fadeOut("slow")).done(function() {
                $('#driverInfo *').detach();
            });
        });
    });
</script>-->