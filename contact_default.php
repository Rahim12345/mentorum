<?php
if (isset($_GET["page"]) && $_GET["page"] == "contact") {
    $query = $conn->prepare("SELECT * FROM contact ORDER BY id DESC");
    $query->execute();
    $rows = $query->fetchall(PDO::FETCH_ASSOC);
    $count = count($rows);
    ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="margin-top: 50px;">
        <div class="container" data-aos="fade-up">
            
            <div class="row mt-5">
            <?php if(!empty($errorSuccestion)){ echo '<span class="btn btn-danger" style="width:98%;margin:auto;margin-bottom:15px;">'.$errorSuccestion.'</span>'; } ?>
                
                
                <div class="col-lg-4">
                    <div class="info">

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <?php
                            if ($count == 0) {
                            ?>
                                <p>daxil edilməyib</p>
                            <?php
                            } else {
                            ?>
                                <p><?php echo $rows[0]["email"];  ?></p>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Zəng et:</h4>
                            <p class="lead">
                                <?php
                                if ($count == 0) {
                                ?>
                                    <a class="btn btn-info" href="javascript:;" style="width:80%">Nömrə daxil edilməyib</a>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn-info" href="tel:+994<?php echo $rows[0]["phone"];  ?>" onclick='call();return false;' style="width:80%">+994<?php echo $rows[0]["phone"];  ?></a>
                                <?php
                                }
                                ?>
                            </p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="" method="post" id="contactForm" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="name" style="margin-bottom: -1.5rem;">Ad&Soyad</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Ad&Soyad" value="<?php if($name!=''){ echo $name;} ?>" minlength="3" maxlength="30" required />
                                <div class="validate">
                                    <span class='arrow'>
                                        <label class='error'></label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="emaill" style="margin-bottom: -1.5rem;">Email</label>
                                <input type="email" class="form-control" name="emaill" id="emaill" placeholder="Emailiniz" value="<?php if($email!=''){ echo $email;} ?>" required />
                                <div class="validate">
                                    <span class='arrow'>
                                        <label class='error'></label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" style="margin-bottom: -1.5rem;">Mövzü</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Mövzu" value="<?php if($subject!=''){ echo $subject;} ?>" minlength="4" maxlength="30" required />
                            <div class="validate">
                                <span class='arrow'>
                                    <label class='error'></label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" style="margin-bottom: -1.5rem;">Mesaj</label>
                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Mesaj yaz" minlength="30" maxlength="500" required><?php if($message!=''){ echo $message;} ?></textarea>
                            <div class="validate">
                                <span class='arrow'>
                                    <label class='error'></label>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Yüklənir...</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Mesajınız göndərildi.Təşəkkür edirik!</div>
                        </div>
                        <div class="text-right"><button type="submit" name="sendMessage">Mesaj göndər</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
<?php
} else {
    header("location:./");
}
