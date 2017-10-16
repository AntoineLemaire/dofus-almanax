<?php
error_reporting(0);
if (isset($_GET['lang']) && !empty($_GET['lang']) && ($_GET['lang'] == 'fr' || $_GET['lang'] == 'en')) {
    $lang = $_GET['lang'];
} else {
    if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'en') {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    } else {
        $lang = '';
    }
}
switch ($lang) {
    case 'en':
        $language = 'en';
        include 'langs/en.php';
        break;
    case 'fr':
    default:
        $language = 'fr';
        include 'langs/fr.php';
        break;
}

if (strlen($lang) > 0) {
    $lang = 'lang='.$lang;
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./ui/css/index.css" />
        <title>
            <?php echo TXT_PAGE_TITLE; ?>
        </title>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-43771624-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </head>
    <body>

        <header>
            <div class="wrap">
                <div class="fleft">
                    <img src="ui/img/logo.png" />
                </div>
            </div>
        </header>

        <div id="wrapper" class="wrap">
            <h1 class="aligncenter">
                <?php echo TXT_H1_TITLE; ?><br/>
				<?php echo TXT_H2_TITLE; ?>
            </h1>
            <div class="clear"></div>
            <div id="createdBy" class="fright block blockright">
                <h2><?php echo TXT_CREATED_BY; ?></h2>
                <p><a href="https://twitter.com/Guerrier_Baptou"><img style="vertical-align:middle;" src="ui/img/icon-twitter-white.png"/>&nbsp;Guerrier_Baptou</a> : <?php echo TXT_INTEGRATION_GRAPH; ?></p>
                <p><a href="https://twitter.com/FecaBouffe"><img style="vertical-align:middle;" src="ui/img/icon-twitter-white.png"/>&nbsp;FecaBouffe</a> : <?php echo TXT_RECUP_DATA; ?></p>
				<p><a href="https://twitter.com/Ushii_"><img style="vertical-align:middle;" src="ui/img/icon-twitter-white.png"/>&nbsp;Ushisior</a> : <?php echo TXT_APP_ANDROID; ?></p>
            </div>
            <div id="desc" class="block blockright">
                
                <ul>
                    <li><?php echo TXT_DESC_LI_1; ?></li>
                    <li><?php echo TXT_DESC_LI_2; ?></li>
                    <li><?php echo TXT_DESC_LI_3; ?></li>
					<li><?php echo TXT_DESC_LI_4; ?></li>
                </ul>
            </div>
            <div class="clear"></div>
            <h2><?php echo TXT_FONCTIONNEMENT; ?></h2>
            <div id="plan" class="fright">
                <p style="padding-left: 170px;"><?php echo TXT_PLAN_1; ?></p><br/><br/><br/>
                <p style="padding-left: 163px;"><?php echo TXT_PLAN_2; ?></p><br/><br/>
                <p style="padding-left:20px;"><?php echo TXT_PLAN_3; ?></p>
            </div>
            <div class="iframe alignleft">
                <iframe src="./widget.php<?php echo (strlen($lang) > 0) ? '?'.$lang : ''?>" frameborder="0" scrolling="no" width="451" height="236"></iframe>
            </div>  
            <div class="clear"></div>
            <h2><?php echo TXT_H2_CODE_SOURCE; ?></h2>
            <pre class="aligncenter">&lt;iframe src="https://almanax.zone-bouffe.com/dofus/widget.php<?php echo (strlen($lang) > 0) ? '?'.$lang : ''?>"
                    frameborder="0" scrolling="no" width="451" height="236"&gt;&lt;/iframe&gt;</pre>

            <h2><br/><?php echo TXT_H2_SMALL_SIZE; ?></h2>
            <pre class="aligncenter fright" style="width: 425px;white-space:normal;margin:0;">&lt;iframe src="https://almanax.zone-bouffe.com/dofus/widget.php?<?php echo (strlen($lang) > 0) ? $lang.'&' : ''?>size=small"
                    frameborder="0" scrolling="no" width="433" height="73"&gt;&lt;/iframe&gt;</pre>
            <div class="iframe alignleft">
                <iframe src="./widget.php?<?php echo (strlen($lang) > 0) ? $lang.'&' : ''?>size=small" frameborder="0" scrolling="no" width="433" height="73"></iframe>
            </div>
			
            <h2><br/><?php echo TXT_H2_ANDROID; ?></h2>
            <pre class="aligncenter fright" style="width: 425px;white-space:normal;margin:0;"><?php echo TXT_VERS_APP; ?><a href="https://play.google.com/store/apps/details?id=com.zonebouffe.almanax" target="_blank">https://play.google.com/store/apps/details?id=com.zonebouffe.almanax</a></pre>
            <div class="iframe alignleft">
                <img src="ui/img/logo_android.png" />
            </div>
            
            <br/>
            <h2><?php echo TXT_H2_SHARE; ?></h2>
            <p class="aligncenter"><a href="https://twitter.com/share" class="twitter-share-button" data-counturl="https://almanax.zone-bouffe.com/" data-url="https://almanax.zone-bouffe.com/" data-text="<?php echo TXT_SHARE_TWITTER; ?>" data-via="FecaBouffe, @Guerrier_Baptou, @Ushii_" data-lang="fr" data-size="large" data-hashtags="Dofus">Tweeter</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </p>
            <p class="aligncenter" style="color:#EEE; font-size:10px;"><?php echo TXT_COPYRIGHT; ?></p>
        </div>
    </body>
</html>