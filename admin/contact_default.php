<div class="card shadow mb-4" style="min-height: 450px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
            <?php
            if (!empty($errorContact)) {
                echo '<font style="color:white;">' . $errorContact . "</font>";
            }
            ?>
        </h6>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="contactForm">
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email daxil et <sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" placeholder="info@example.com" value="<?php if(!empty($email)){ echo $email; }  ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Telefon daxil et <sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="number" name="phone" id="phone" class="form-control" placeholder="555555555" maxlength="9" value="<?php if(!empty($phone)){ echo $phone; }  ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="contactAdd" class="btn btn-success" style="position: relative;float: right;">Əlaqə&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>