
<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
include 'php/user_data.php';
?>

<div class="container-fluid w-100" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-end">
        <div class="d-inline-block mr-5 mt-5" id="btn-side-menu">
            <button type="button" class="btn">
                <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
            </button>
        </div>
    </div>

    <div class="container-fluid mt-3 mb-5 h2">

        <a href="../index.php?page=passwordReset&mode=reset" class="text-body">
            <div class="row  w-100">
                <div class="col-12 border-top border-bottom border-dark py-5">
                    <div class="text-center">
                        Zresetuj hasło
                    </div>
                </div>
            </div>
        </a>

        <form action="php/edit_profile.php" method="POST">
            <div class="row w-100">
                <div class="col-8 border-bottom border-dark py-5 pl-5">
                    <div class="pl-3">
                        <div class="row">
                            <div class="col-4">
                                E-mail
                            </div>
                            <div class="col-8">
                                <?php
                                echo '<input name="profileEmail" value="'.$Email.'" class="display-inline-block" style="background: transparent; border:none; font-color: black;">'
                                ?>
                            </div>
                            <!-- div gdzie będzie wyświetlany error jeśli się pojawi -->
                            <label class="text-danger h4 ">
                                <?php check_msg('profileEmail'); ?>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-4 border-bottom border-left border-dark py-5">
                    <div class="pl-3">
                        <div class="row">
                            <div class="col-4">
                                Imię
                            </div>
                            <div class="col-8">
                                <?php
                                echo '<input name="profileName" value="'.$Name.'" class="display-inline-block w-100" style="background: transparent; border:none; font-color: black;">'
                                ?>
                            </div>
                            <!-- div gdzie będzie wyświetlany error jeśli się pojawi -->
                            <label class="text-danger h4">
                                <?php check_msg('profileName'); ?>
                            </label>
                        </div>
                    </div>
                </div>

            </div> <!-- end row -->
            <div class="row w-100">
                <div class="col border-bottom border-dark py-5 pl-5">
                    <div class="pl-3">
                        <div class="row">
                            <div class="col-4">
                                Numer telefonu
                            </div>
                            <div class="col-8">
                                <?php
                                echo '<input name="phoneNumber" value="'.$PhoneNumber.'" class="display-inline-block w-100" style="background: transparent; border:none; font-color: black;">'
                                ?>
                            </div>
                            <!-- div gdzie będzie wyświetlany error jeśli się pojawi -->
                            <label class="text-danger h4">
                                <?php check_msg('phoneNumber'); ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
            <div class="row w-75 mx-auto">
                <div class="col pt-5">
                    <div>
                        <input type="submit" name="submitProfile" class="btn btn-success btn-block" style="height: 120px; font-size:36px;" value="POTWIERDŹ">
                    </div>
                </div>
            </div><!-- end row-->

            <div class="row w-100" style="height: 80px;">
                <div class="col border-bottom border-dark">
                    <!-- empty row-->
                </div>
            </div>
        </form>


        <a href="../index.php?page=favouritePlaces" class="text-body">
            <div class="row w-100">
                <div class="col border-bottom border-dark py-5 pl-5">
                    <div class="pl-3">
                        Edytuj ulubione miejsca
                    </div>
                    <div class="text-muted h3 pl-3 pt-2">
                        Zarządzaj ulubionymi miejscami podróży
                    </div>
                </div>
            </div><!-- end row -->
        </a>
    </div><!-- end container fluid-->

    <a href="?page=driverInfo">
        <div class="w-75 mx-auto mt-5">
            <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;" id="btn-driver">
                <span class="text-white h3">JESTEM KIEROWCĄ</span>
            </button>
        </div>
    </a>

    <div id="driverInfo" style="width: 100%;"></div>

</div>

<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>
<!--<script>
    $(document).ready(function () {
        $('#btn-driver').click(function(){
            //document.getElementById('btn-action').style.display = "none";
            $('#btn-driver').fadeOut();
            $('#driverInfo').hide().load('?page=driverInfo').fadeIn("slow");
            document.getElementById('sideMenu').style.height = "130vh";
        });
    });
</script>-->

