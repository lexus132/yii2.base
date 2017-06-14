<?php

namespace app\modules\jobcenter\widgets;
//namespace Yii\modules\jobcenter\widgets;

use humhub\components\Widget;
//use humhub\modules\content\components\ContentContainerActiveRecord;
use Yii;
use app\modules\jobcenter\models\JobVacansy;
use app\modules\jobcenter\models\JobCategory;
use app\modules\jobcenter\models\JobCities;

class JobcenterMenu extends Widget
{
//    public $contentContainer;
    public $search = '';

    public function run()
    {
	
	$script = <<<JS
	    $('#getting-started-panel select').on('change', function(e){
		
		if(($('#search-in-vacancy input').first().val()).lengtn > 0){
		    $('#search-in-vacancy button').trigger('click');
		}
		
		var cat = parseInt($('#categorys').val(),10) || 0;
		var cit = parseInt($('#cities').val(),10) || 0;
		var line = '';
		if(cat > 0){
		    line += 'category_id='+cat+'&';
		}
		if(cit > 0){
		    line += 'city_id='+cit;
		}
		if(line.length >= 0){
		    $.ajax({
			url:'/JOBCENTER/default/ajaxdat?'+line,
			dataType: 'json',
			beforeSend: function(){
			    $('#load-div').html(''+
				'<div class="modal-body">'+
				    '<div class="loader">'+
					'<div class="sk-spinner sk-spinner-three-bounce">'+
					    '<div class="sk-bounce1"></div>'+
					    '<div class="sk-bounce2"></div>'+
					    '<div class="sk-bounce3"></div>'+
					'</div>'+
				    '</div>'+
				'</div>'+
			    '');
			    initPlugins();
			},
			success: function(response){
			    $('#load-div').html('');
			    if(response.saccess !== ''){
				$('#main_content').html(response.saccess.view);
			    } else {
				var errRez = '<ul style="color:red;">';
				for(var item in response.errors){
//				    console.log(response.errors['item']);
				    errRez += '<li>'+response.errors[item]+'</li>';
				}
				    errRez += '</ul>';
				$('#load-div').html(errRez);
			    }
			},
			error: function(response) {
			    $('#load-div').html('');
			}
		    });
		}else{
		    return false;
		}
	    });
	
	$("#search-in-vacancy button").on('click', function (e) {
	    var line = '';
	    var cat = parseInt($('#categorys').val(),10) || 0;
	    var cit = parseInt($('#cities').val(),10) || 0;
	    if(cat > 0){
		line += 'category_id='+cat+'&';
	    }
	    if(cit > 0){
		line += 'city_id='+cit+'&';
	    }
	    var url = '/JOBCENTER/default/search?';
	    var value = $('#search-in-vacancy input').first().val();
	    if (value.length > 0) {
		line += 'search=' + encodeURIComponent(value);
		url += line;
		location.href = url;
	    }
	});
	$('#search-in-vacancy input').on('keydown', function (e) {
	    if (e.keyCode == 13) {
		$('#search-in-vacancy button').trigger('click');
	    }
	});
JS;
	$view = $this->getView();
	$view->registerJs($script, yii\web\View::POS_READY);
//	$view->registerJsFile(
//	    '@web/js/example.js',
//	    ['depends' => [\yii\web\JqueryAsset::className()]]
//	);
	
	$activVacancys = JobVacansy::find()->select('category_id, city_id')->where(['status' => 1])->asArray()->all();
	$categoryMod = new JobCategory();
	$cityMod = new JobCities();
	$category = JobCategory::find()->asArray()->all();
	$cities = JobCities::find()->asArray()->all();
	
	$tempCats = array();
	foreach ($category as $value) {
	    $tempCats[$value['id']] = $value['category_item'];
	}
	$tempCity = array();
	foreach ($cities as $value) {
	    $tempCity[$value['id']] = $value['city'];
	}
	$catenabl = array();
	$citenabl = array();
	foreach ($activVacancys as $value) {
	    $catenabl[$value['category_id']] = $tempCats[$value['category_id']];
	    $citenabl[$value['city_id']] = $tempCity[$value['city_id']];
	}
	$rezult = '';
	$rezult .= '<div class="panel panel-default panel-tour" id="getting-started-panel">'.
		    '<div class="panel-heading">'.
			'<strong>Vacansy </strong>options'.
		    '</div>'.
		    '<div class="panel-body">';
	$rezult .= '<div id="search-in-vacancy" class="form-group form-group-search">';
	$rezult .= \yii\helpers\Html::textInput('keyword', $this->search, array('placeholder' => '', 'class' => 'form-control form-search'));
	$rezult .= \yii\helpers\Html::submitButton(Yii::t('base', 'Search'), array('class' => 'btn btn-default btn-sm form-button-search'));
	$rezult .= '</div>';
	$rezult .= '<br>';
	if(!empty($catenabl)){
	    $rezult .= '<div class="form-horizontal">';
	    $rezult .= '<div class="form-group">';
	    $rezult .= '<label for="categorys" class="col-xs-3 control-label">'.$categoryMod->attributeLabels()['category_item'].'</label>';
	    $rezult .= '<div class="col-xs-9">';
	    $rezult .= '<select class="form-control" id="categorys">';
	    $rezult .= '<option change>&nbsp;</option>';
	    foreach($catenabl as $key => $value){
		if((!empty(\yii::$app->request->get('category_id'))) and ((int)\yii::$app->request->get('category_id') === $key)){
		    $rezult .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
		} else {
		    $rezult .= '<option value="'.$key.'">'.$value.'</option>';
		}
	    }
	    $rezult .= '</select>'
		    . '</div>'
		    . '</div>'
		    . '</div>';
	}
	
	if(!empty($citenabl)){
	    $rezult .= '<div class="form-horizontal">';
	    $rezult .= '<div class="form-group">';
	    $rezult .= '<label for="categorys" class="col-xs-3 control-label">'.$cityMod->attributeLabels()['city'].'</label>';
	    $rezult .= '<div class="col-xs-9">';
	    $rezult .= '<select class="form-control" id="cities">';
	    $rezult .= '<option change>&nbsp;</option>';
	    foreach($citenabl as $key => $value){
		if((!empty(\yii::$app->request->get('city_id'))) and ((int)\yii::$app->request->get('city_id') === $key)){
		    $rezult .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
		} else {
		    $rezult .= '<option value="'.$key.'">'.$value.'</option>';
		}
	    }
	    $rezult .= '</select>'
		    . '</div>'
		    . '</div>'
		    . '</div>';
	}
	
	$rezult .= '<div id="load-div"></div>'
		. '</div>'
		. '</div>';
	
	return $rezult;
//        if ($this->showProfilePostForm) {
//            echo \humhub\modules\post\widgets\Form::widget(['contentContainer' => $this->contentContainer]);
//        }

//        if ($this->contentContainer === null) {
//            $messageStreamEmpty = Yii::t('DashboardModule.views_dashboard_index_guest', '<b>No public contents to display found!</b>');
//        } else {
//            $messageStreamEmpty = Yii::t('DashboardModule.views_dashboard_index', '<b>Your dashboard is empty!</b><br>Post something on your profile or join some spaces!');
//        }

//        echo \humhub\modules\content\widgets\Stream::widget([
//            'streamAction' => '//dashboard/dashboard/stream',
//            'showFilters' => false,
//            'messageStreamEmpty' => $messageStreamEmpty
//        ]);
	
	
    }
}
