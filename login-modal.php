<?php
if($index_value == "true")
{
    ?>
    <div id="login" class="modal fade" role="dialog">

    <div class="modal-dialog">



        <div class="modal-content">

            <div class="modal-body">

                <button data-dismiss="modal" class="close">&times;</button>

                <h4>Mentorum - Login</h4>

                <form onsubmit="return false">

                    <input type="email" name="email" id="email" class="username form-control" placeholder="Emailinizi daxil edin" />

                    <input type="password" name="password" id="password" class="password form-control" placeholder="Şifrənizi daxil edin" />

                    <input class="btn login" id="loginBtn" type="submit" value="Daxil ol" />

                    <a href="<?= $domain; ?>registration" id="registrationBtn" style="float: right;margin-top:20px;color:white;border-bottom:1px dotted white">Hesabın yoxdur?</a>

                </form>

            </div>

        </div>

    </div>

    </div>
    <?php
}
else
{
    header("location:./");
}
?>
