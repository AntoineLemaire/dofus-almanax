<?php
error_reporting(E_ALL);
?>

<html>
    <head>
        <meta charset="utf-8" />
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
            ga('create', 'UA-43771624-1', 'zone-bouffe.com');
            ga('send', 'pageview');
		
        </script>
        <script type="text/javascript" src="./ui/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="./ui/js/jquery.jcarousel.min.js"></script>
        <style type="text/css">
            *{
                font-family:"Times New Roman";	
                border: none;
            }
            .bonus{
                font-family:'Arial',Sans-Serif;
            }
            .bonus a {
                text-decoration: none;
            }
            html,body{
                padding:0;
                margin:0;
            }
            ul{
                list-style-type:none;
            }
            .offering {
                background-image:url('./ui/img/<?php echo $lang; ?>_bg.jpg');
                width: 451px;
                height: 236px;
            }
            .offering>div:first-child {
                padding:8px;
                float:right;
                width:376px;
            }
            .offering>div:nth-child(2){
                float:left;    
                height: 75px;
                width: 59px;
            }
                

            #div1, #div2, #div3, #div4, #div5 {
                margin:0px;
                padding:0px;
            }
            h3{
                color:white;
                margin:0;
                line-height:48px;
                display:inline-block;
                padding: 0 15px;
            }
            /*
            #ga{
                background: url("http://nojsstats.appspot.com/UA-17455729-4/almanax.zone-bouffe.com");
            }
            */

        </style>
        <link rel="stylesheet" type="text/css" href="./ui/css/skins/skin.css" />
        <script type="text/javascript">
            
            function carousel_initCallback(carousel) {
                jQuery('.carousel-next').bind('click', function() {
                    carousel.next();
                    return false;
                });

                jQuery('.carousel-prev').bind('click', function() {
                    carousel.prev();
                    return false;
                });
            };

            jQuery(document).ready(function() {
                jQuery("#carousel").jcarousel({
                    scroll: 1,
                    initCallback: carousel_initCallback,
                    // This tells jCarousel NOT to autobuild prev/next buttons
                    buttonNextHTML: null,
                    buttonPrevHTML: null,
                    animation: 10
                });
            });
            
            var ar=new Array(33,34,35,36,37,38,39,40);

            $(document).keydown(function(e) {
                var key = e.which;
                //console.log(key);
                //if(key==35 || key == 36 || key == 37 || key == 39)
                if($.inArray(key,ar) > -1) {
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        </script>
        <script type="text/javascript" src="http://snaptortoise.github.io/konami-js/konami.js"></script>
        <script type="text/javascript">
            var success = function() {
                window.top.location.href = "http://goo.gl/IbFHVn"; 
            }

            var konami = new Konami(success);
        </script>
    <body>
        <ul id="carousel" class="jcarousel-skin-tango">
            <?php
            for ($i = 0; $i <= 7; ++$i) {
                $offrande = (object) $offrandes[$current_date->format('m-d')]; ?>
                <li class="offering">
                    <div>
                        <div style="margin-left:268px" id="div1">
                            <font color=black><b>
                                <?php if ($i != 0) {
                    ?>
                                    <a class="carousel-prev" href="#" target="Contenu"><img src="ui/img/fleche_gauche.png" /></a>
                                <?php 
                } else {
                    ?>
                                    <span style="display:inline-block;width:10px;">&nbsp;</span>
                                <?php 
                } ?>
                                <?php
                                echo $current_date->format('d-m-Y'); ?>
                                <?php if ($i != 8) {
                                    ?>
                                    <a class="carousel-next" href="#" target="Contenu"><img src="ui/img/fleche_droite.png" /></a>
                                <?php 
                                } ?>
                            </b></font>
                        </div>
                        <!-- Affichage du Titre Bonus -->
                        <div style="margin-left:8px" id="div2">
                            <font color=black>
                            <b>
                                <?php echo $offrande->bonusTitle; ?>
                            </b>
                            <br />
                            <!-- Affichage de la description du Bonus -->
                            <?php
                            if (strlen($offrande->bonusDescription) > 105) {
                                echo '<span title="'.$offrande->bonusDescription.'">'.substr($offrande->bonusDescription, 0, 105).'...';
                            } else {
                                echo $offrande->bonusDescription;
                            } ?>
                            </font>
                        </div>
                        <!-- Nom du Méryde -->
                        <div style="margin-left:17px;margin-top:5px" id="div3"> 
                            <font color=white size=2>
                            <b><?php echo TXT_OFFRANDE_A.trim($offrande->name); ?></b>
                            </font>
                        </div>
                        <!-- Affichage de la ressource et de l'offrande -->
                        <div style="margin-left:21px;margin-top:10px" id="div4"> 
                            <table BORDER=0>
                                <tr>
                                    <td>
                                        <?php
                                        echo '<img src="./offering/'.$offrande->objectID.'.png" style="width:50px; height:50px;" />'; ?>
                                    </td>
                                    <td>
                                        <font color=white size=2><b>
                                            <?php echo TXT_FIND.trim($offrande->offering).TXT_ET_RAPPORTER ?>
                                        </b></font>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin:0;padding:0;width:150px;height: 18px;margin-top: 40px;margin-right: -8px;float:right;">
                            <a target="_blank" href="https://almanax.zone-bouffe.com/" style="display:inline-block;width:100%;height: 100%;"></a>
                        </div>
                    </div>
                    <div>
                        <a target="_blank" href="https://almanax.zone-bouffe.com/" style="display:inline-block;width:100%;height: 100%;"></a>
                    </div>
                </li>
            <?php
                $current_date->modify('+1 day');
            }
            ?>
            <li class="offering">
                <div>
                    <div style="margin-left:268px" id="div1">
                        <font color=black><b>
                            <?php if ($i != 0) {
                            ?>
                                <a class="carousel-prev" href="#" target="Contenu"><img src="ui/img/fleche_gauche.png" /></a>
                            <?php 
                                } else {
                            ?>
                                <span style="display:inline-block;width:10px;">&nbsp;</span>
                            <?php 
                            } ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;Bonus
                            <?php if ($i != 8) {
                             ?>
                                <a class="carousel-next" href="#" target="Contenu"><img src="ui/img/fleche_droite.png" /></a>
                            <?php 
                             } ?>
                        </b></font>
                    </div>
                    <div style="margin-top: 10px;" class="bonus">
                        <p><?php echo TXT_PAGE_TITLE ?></p>
                        <div style="margin-left: 8px;margin-top: 24px;padding-top: 10px;">
                            
                            <div style="float:left; padding-left: 35px;height: 48px;">
                                <a target="_blank" href="https://twitter.com/FecaBouffe" style="display:inline-block;width:100%;height: 100%;">
                                    <img style="float:left;" src="https://pbs.twimg.com/profile_images/2793816440/695cf0d1b553f8db18a8a9ea7fc77779_normal.png" alt="" />
                                    <h3 style="float:left;">@FecaBouffe</h3>
                                </a>
                            </div>
                            <div style="float:right;padding-right: 35px;height: 48px;">
                                <a target="_blank" href="https://twitter.com/Guerrier_Baptou" style="display:inline-block;width:100%;height: 100%;">
                                    <img style="float:right;" src="https://pbs.twimg.com/profile_images/484100957866057728/sf_ocq9S_normal.jpeg" alt="" />
                                    <h3 style="float:right;">@Guerrier_Baptou</h3>
                                </a>
                            </div>
                        </div>
                        
                        <div style="margin:0;padding:0;width:150px;height: 23px;margin:17px 0 0;float:right;">
                            <a target="_blank" href="https://almanax.zone-bouffe.com/" style="display:inline-block;width:100%;height: 100%;"></a>
                        </div>
                    </div>
                </div>                
            </li>
        </ul>
    </body>
</html>