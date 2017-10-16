
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
            
            html,body{
                padding:0;
                margin:0;
            }
            ul{
                list-style-type:none;
            }
            .offering {
                background-image:url('http://img15.hostingpics.net/pics/467526frbgicon.jpg');
                width: 150px;
                height: 150px;
            }
            .offering div {
                padding:8px;
            }

            #div1, #div2, #div3, #div4, #div5 {
                margin:0px;
                padding:0px;
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
            for ($i = 0; $i <= 7; $i++) {
                $offrande = (object)$offrandes[$current_date->format('m-d')];
                ?>
                <li class="offering">
                    <div>                       
                        <!-- Affichage de la ressource et de l'offrande -->
                        <div style="margin-left:70px;float:left;width: 205px" id="div4"> 
                            <table BORDER=0>
                                <tr>
                                    <td><span title="
										<?php 
										echo trim($offrande->offering)
										?>
										">
                                        <?php
                                        echo '<img src="./offering/' . $offrande->objectID . '.png" style="width:50px; height:50px;" />';
                                        ?>
                                    </span></td>
                                </tr>
                            </table>
                        </div>
						<!-- Affichage de la date -->
                        <div style="margin-right:25px;float:right;" id="div1">
                            <font color=black><b>
                                <?php if ($i != 0) { ?>
                                    <a class="carousel-prev" href="#" target="Contenu"><img src="ui/img/fleche_gauche.png" /></a>
                                <?php } else { ?>
                                    <span style="display:inline-block;width:10px;">&nbsp;</span>
                                <?php } ?>
                                <?php
                                echo $current_date->format('d-m-Y');
                                ?>
                                <?php if ($i != 7) { ?>
                                    <a class="carousel-next" href="#" target="Contenu"><img src="ui/img/fleche_droite.png" /></a>
                                <?php } else { ?>
                                    <span style="display:inline-block;width:10px;">&nbsp;</span>
                                <?php } ?>
                            </b></font>
                        </div> 
                    </div>                    
                </li>
            <?php
                $current_date->modify("+1 day");
             } ?>
        </ul>
    </body>
</html>