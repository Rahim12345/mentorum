<?php
if($index_value == "true")
{
    ?>
    <div id="login2" class="modal fade" role="dialog">

        <div class="modal-dialog">



            <div class="modal-content">

                <div class="modal-body">

                    <button data-dismiss="modal" class="close">&times;</button>

                    <h4>Hesablara baxmaq üçün Daxil olunss</h4>

                    <form onsubmit="return false">

                        <input type="email" name="email2" id="email2" class="username form-control" placeholder="Emailinizi daxil edin" />

                        <input type="password" name="password2" id="password2" class="password form-control" placeholder="Şifrənizi daxil" />

                        <input type="hidden" name="id2" id="id2" class="password form-control" placeholder="Şifrənizi daxil" />

                        <input class="btn login" id="loginBtn2" type="submit" value="Daxil ol" />

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