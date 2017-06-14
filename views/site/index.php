<?php

/* @var $this yii\web\View */

$script = <<<JS
    function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: "en"}, "google_translate_element");
    }
JS;
$this->registerJs($script, yii\web\View::POS_HEAD);

$script2 = <<<JS
	
	var shineline = new Shine(document.getElementById('headline'));
//	console.log(document.getElementById('headline'));

      function handleMouseMoveLine(event) {
        shineline.light.position.x = event.clientX;
        shineline.light.position.y = event.clientY;
        shineline.draw();
      }
      window.addEventListener('mousemove', handleMouseMoveLine, false);
	
    var shinebox = new Shine(document.getElementById('headbox'));
	
      function handleMouseMoveBox(event) {
	console.log();
        shinebox.light.position.x = event.clientX;
        shinebox.light.position.y = event.clientY;
        shinebox.draw();
      }
	

      window.addEventListener('mousemove', handleMouseMoveBox, false);
JS;
$this->registerJs($script2, yii\web\View::POS_READY);

$this->registerJsFile(
    '@web/js/shine.min.js'													// dir - /web/js/axemple.js (url)
);
$this->registerJsFile(
    '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'													// dir - /web/js/axemple.js (url)
);

$this->registerCssFile("http://fonts.googleapis.com/css?family=Open+Sans:800");

$this->title = 'My Yii Application';
?>
<style>
    .demo-text {
	margin: auto;
	position: absolute;
	top: 0; left: 0; bottom: 0; right: 0;
	width: 100%;

	display: table;
	height: auto;

	color: #fcfcfc;
	text-transform: uppercase;
	text-align: center;

	font-size: 8em;
	font-family: 'Open Sans', sans-serif;
	font-weight: 800;

	letter-spacing: -0.02em;
	line-height: 1.2em;
    }
    .btn-success {
	background-color: #42d242;
    }
</style>
        <!--<h1  class="demo-text" id="headline">Congratulations! You are in trouble ..</h1>-->
<div id="google_translate_element"></div>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="color:yellow;font-size: 6em; margin-top: 14%;"class="demo-text" id="headline">Congratulations!</h1>

        <!-- <p style="margin-bottom: 25%;" class="lead">You have successfully created your Yii-powered application.</p> -->

        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
	<div style="margin-top: 22%;" id="headbox" class="demo-text">
	    <a class="btn btn-lg btn-success" href="<?= \Yii::$app->urlManager->createUrl(['gii'])?>">Get started with Gii</a>
	</div>
    </div>

    <div  style="margin-top: 24%;" class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <div class="dropdown">
		    <a href="#" id="navbarDrop1" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
		    <ul class="dropdown-menu" role="menu" aria-labelledby="navbarDrop1">
		      <li><a href="#one" tabindex="-1">one</a></li>
		      <li><a href="#two" tabindex="-1">two</a></li>
		      <li class="divider"></li>
		      <li><a href="#three" tabindex="-1">three</a></li>
		    </ul>
		</div>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>