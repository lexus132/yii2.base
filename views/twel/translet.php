<?php

/* @var $this yii\web\View */

$script1 = <<<JS
    function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: "en"}, "google_translate_element");
    }
JS;
//$this->registerJs($script1, yii\web\View::POS_BEGIN);

$script2 = <<<JS
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
JS;
//$this->registerJs($script2);
//$this->registerJsFile('@web/js/nicEdit.js');
//$this->registerJsFile(
//    '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'													// dir - /web/js/axemple.js (url)
//);
//$this->registerJsFile(
//    '//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js'
//);


$this->registerJsFile('@web/js/trans/ionic.bundle.js');
$this->registerJsFile('@web/js/trans/script.js');

$this->title = 'My Yii Application';
?>
<div class="site-index" style="padding: 5px;">
<ion-nav-view></ion-nav-view>

<script style="display: none;" id="templates/menu.html" type="text/ng-template">
      <ion-side-menus enable-menu-with-back-views="false">

        <ion-side-menu-content>
          <ion-nav-bar class="bar-positive">
            <ion-nav-back-button>
            </ion-nav-back-button>

            <ion-nav-buttons side="left">
              <!-- <button class="button button-icon button-clear ion-navicon" menu-toggle="left">
              </button> -->
            </ion-nav-buttons>
          </ion-nav-bar>

          <ion-nav-view name="menuContent"></ion-nav-view>
        </ion-side-menu-content> 

        <ion-side-menu side="left">
          <ion-header-bar class="bar-assertive">
            <h1 class="title"></h1>
          </ion-header-bar>
          <ion-content>
            <ul class="list">
              <!-- Note each link has the 'menu-close' attribute so the menu auto closes when clicking on one of these links -->
            </ul>
          </ion-content>
        </ion-side-menu>

      </ion-side-menus>
    </script>

    <script id="templates/translate.html" type="text/ng-template">
      <ion-view view-title="">
        <ion-content class="padding">
	
	<div class="col-xs-12">
	    <div class="form-group">
		<label for="comment">RU</label>
		<label style="width:100%" class="item item-input">
		    <textarea style="width:100%" rows="5" id="comment" ng-model="$parent.source" placeholder="Source text">Тут могла бути ваша реклама!</textarea>
		</label>
	    </div>
	</div>
	<div class="col-xs-12">
            <button class="button button-balanced button-full" ng-click="translate()">
              Translate
            </button>
	</div>
    <div class="row col-xs-12">
	<div class="col-xs-4">
	    <h3>EN</h3>
	    <label style="width: 100%;" class="item item-input">
              <textarea style="width: 100%;" rows="7" ng-model="targeten" placeholder="..."></textarea>
            </label>
	</div>
	<div class="col-xs-4">
	    <h3>DE</h3>
	    <label style="width: 100%;" class="item item-input">
              <textarea style="width: 100%;" rows="7" ng-model="targetde" placeholder="..."></textarea>
            </label>
	</div>
	<div class="col-xs-4">
	    <h3>FR</h3>
	    <label style="width: 100%;" class="item item-input">
              <textarea style="width: 100%;" rows="7" ng-model="targetfr" placeholder="..."></textarea>
            </label>
	</div>
    </div>    
<!-- -->	    
          <!--<div class="list">-->

            
            
          </div>
        </ion-content>
      </ion-view>
    </script>

<?php /* ?>
<!--<div id="google_translate_element"></div>-->

<div class="site-index" ng-app="">
	<div class="col-xs-12">
	    <div class="form-group">
		<label for="comment">Text:</label>
		<textarea class="form-control" rows="5" id="comment" ng-model="data"></textarea>
	    </div>
	</div>
    <div class="row">
	<div class="col-xs-4">
	    <h3>EN</h3>
	    <p ng-bind="data"></p>
	    <input value="{{data}}">
	</div>
	<div class="col-xs-4">
	    <h3>DE</h3>
	    <p ng-bind="data"></p>
	</div>
	<div class="col-xs-4">
	    <h3>FR</h3>
	    <p ng-bind="data"></p>
	</div>
    </div>

<?php */ ?>
<!--    <div class="jumbotron">
        <h1>Congratulations! <br> You are in trouble ..</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
        <p><a class="btn btn-lg btn-success" href="<?= \Yii::$app->urlManager->createUrl(['gii'])?>">Get started with Gii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
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

    </div>-->
</div>