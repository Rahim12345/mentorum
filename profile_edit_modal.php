<?php
if($index_value == "true")
{
    ?>
    <style>

        .btn-file {

            position: relative;

            overflow: hidden;

        }



        .btn-file input[type=file] {

            position: absolute;

            top: 0;

            right: 0;

            min-width: 100%;

            min-height: 100%;

            font-size: 100px;

            text-align: right;

            filter: alpha(opacity=0);

            opacity: 0;

            outline: none;

            background: white;

            cursor: inherit;

            display: block;

        }



        #img-upload {

            width: 25%;

            border-radius: 50%;

        }

    </style>

    <div id="editProfile" class="modal fade" role="dialog" style="padding-bottom: 200px;">

        <div class="modal-dialog">



            <div class="modal-content">

                <div class="modal-body">

                    <button data-dismiss="modal" class="close">&times;</button>

                    <h4>Mentorum - Hesabını düzənlə</h4>

                    <form id="editProfileForm" onsubmit="return false">

                        <?php

                        $query = $conn->prepare("SELECT * FROM users WHERE id=?");

                        $query->execute([$_SESSION["id"]]);

                        $rows = $query->fetchall(PDO::FETCH_ASSOC);

                        $count = count($rows);

                        if ($count != 0) {

                        ?>

                            <div class="x_panel">

                                <div class="x_content">



                                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

                                        <li class="nav-item">

                                            <a class="nav-link active" id="haqqimda-tab" data-toggle="tab" href="#haqqimda" role="tab" aria-controls="haqqimda" aria-selected="true" style="color: black;">Haqqımda</a>

                                        </li>

                                        <li class="nav-item">

                                            <a class="nav-link" id="umumi-tab" data-toggle="tab" href="#umumi" role="tab" aria-controls="umumi" aria-selected="false" style="color: black;">Ümumi</a>

                                        </li>

                                        <li class="nav-item">

                                            <a class="nav-link" id="sosial_media-tab" data-toggle="tab" href="#sosial_media" role="tab" aria-controls="sosial_media" aria-selected="false" style="color: black;">Sosial Media</a>

                                        </li>

                                    </ul>

                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="haqqimda" role="tabpanel" aria-labelledby="haqqimda-tab">



                                            <div class="form-group row">

                                                <label for="imgInp" class="col-sm-3 col-form-label" style="color:white">Pofile şəkli</label>

                                                <div class="input-group col-sm-9">

                                                    <span class="input-group-btn">

                                                        <span class="btn btn-default btn-file">

                                                        <input type="file" id="imgInp" name="imgInp">

                                                        </span>

                                                    </span>

                                                    <input type="text" class="form-control" style="display: none;" readonly>

                                                    <img id='img-upload' src="assets/profiles/<?php if(strlen($rows[0]['image'])!=0){ echo $rows[0]['image']; }else{ echo 'user.png'; }  ?>"/>

                                                </div>

                                            </div>



                                            <div class="form-group row">

                                                <label for="nameEdit" class="col-sm-3 col-form-label" style="color:white">Ad & Soyad</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="nameEdit" id="nameEdit" class="username form-control" placeholder="Ad,Soyadınızı daxil edin" value="<?= $rows[0]['name'] ?>" />

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="passwordEdit" class="col-sm-3 col-form-label" style="color:white">Şifrə</label>

                                                <div class="col-sm-9">

                                                    <input type="password" name="passwordEdit" id="passwordEdit" class="password form-control" placeholder="Şifrənizi daxil edin" value="<?= $rows[0]['password'] ?>" />

                                                </div>

                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="umumi" role="tabpanel" aria-labelledby="umumi-tab">

                                            <div class="form-group row">

                                                <label for="profisionEdit" class="col-sm-3 col-form-label" style="color:white">İxtisas</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="profisionEdit" id="profisionEdit" class="password form-control" placeholder="İxtisas daxil edin" value="<?= $rows[0]['profision'] ?>" />

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="addressEdit" class="col-sm-3 col-form-label" style="color:white">Ünvan</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="addressEdit" id="addressEdit" class="password form-control" placeholder="Ünvanınızı daxil edin" value="<?= $rows[0]['address'] ?>" />

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="phoneEdit" class="col-sm-3 col-form-label" style="color:white">Telefon</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="phoneEdit" id="phoneEdit" class="password form-control" placeholder="Telefon nömrənizi daxil edin" value="<?= $rows[0]['phone'] ?>" />

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="practiceEdit" class="col-sm-3 col-form-label" style="color:white">İş təcrübəsi</label>

                                                <div class="col-sm-9">

                                                    <textarea name="practiceEdit" class=" password form-control" style="border:2px white dotted" id="practiceEdit" cols="30" rows="6"><?= $rows[0]['practice'] ?></textarea>

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="aboutEdit" class="col-sm-3 col-form-label" style="color:white">Haqqımda</label>

                                                <div class="col-sm-9">

                                                    <textarea name="aboutEdit" class=" password form-control" style="border:2px white dotted" id="aboutEdit" cols="30" rows="6"><?= $rows[0]['practice'] ?></textarea>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="sosial_media" role="tabpanel" aria-labelledby="sosial_media-tab">

                                        <div class="form-group row">

                                                <label for="twEdit" class="col-sm-3 col-form-label" style="color:white">Twitter</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="twEdit" id="twEdit" class="password form-control" placeholder="Twitter linkinizi daxil edin" value="<?= $rows[0]['twitter'] ?>" />

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="fbEdit" class="col-sm-3 col-form-label" style="color:white">Facebook</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="fbEdit" id="fbEdit" class="password form-control" placeholder="Facebook linkinizi daxil edin" value="<?= $rows[0]['facebook'] ?>" />

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="instaEdit" class="col-sm-3 col-form-label" style="color:white">İnstagram</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="instaEdit" id="instaEdit" class="password form-control" placeholder="İnstagram linkinizi daxil edin" value="<?= $rows[0]['instagram'] ?>" />

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label for="inEdit" class="col-sm-3 col-form-label" style="color:white">Linkedin</label>

                                                <div class="col-sm-9">

                                                    <input type="text" name="inEdit" id="inEdit" class="password form-control" placeholder="Linkedin linkinizi daxil edin" value="<?= $rows[0]['linkedin'] ?>" />

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-12">

                                                <button class="btn btn-danger float-right" id="editMyProfile">Hesabı düzənlə</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php

                        }

                        ?>



                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>

        $(document).ready(function() {

            $(document).on('change', '.btn-file :file', function() {

                var input = $(this),

                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

                input.trigger('fileselect', [label]);

            });



            $('.btn-file :file').on('fileselect', function(event, label) {



                var input = $(this).parents('.input-group').find(':text'),

                    log = label;



                if (input.length) {

                    input.val(log);

                } else {

                    if (log) alert(log);

                }



            });



            function readURL(input) {

                if (input.files && input.files[0]) {

                    var reader = new FileReader();



                    reader.onload = function(e) {

                        $('#img-upload').attr('src', e.target.result);

                    }



                    reader.readAsDataURL(input.files[0]);

                }

            }



            $("#imgInp").change(function() {

                readURL(this);

            });

        });

    </script>
    <?php
}
else
{
    header("location:./");
}
?>
