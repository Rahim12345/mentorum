<?php
if($index_value == "true")
{
    ?>
    <div class="size1 overlay1" style="margin-top: 10px;margin-left:5%;;margin-right:5%;">

    <!--  -->

    <div class="size1 flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-50">

        <h3 class="l1-txt1 txt-center p-b-25" style="font-family: new times roman;">

            Tezliklə

        </h3>



        <p class="m2-txt1 txt-center p-b-48" style="font-family: new times roman;">

            Səhifədə bəzi təkminləşdirmə işləri aparılır,lütfən biraz sonra yenidən cəhd edin

        </p>



        <div class="flex-w flex-c-m cd100 p-b-33">

            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">

                <span class="l2-txt1 p-b-9 days">1</span>

                <span class="s2-txt1">Gün</span>

            </div>



            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">

                <span class="l2-txt1 p-b-9 hours">1</span>

                <span class="s2-txt1">Saat</span>

            </div>



            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">

                <span class="l2-txt1 p-b-9 minutes">59</span>

                <span class="s2-txt1">Dəqiqə</span>

            </div>



            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">

                <span class="l2-txt1 p-b-9 seconds">59</span>

                <span class="s2-txt1">Saniyə</span>

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
