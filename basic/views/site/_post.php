<?php
/* @var $model \app\models\Post */


use yii\helpers\Html;
use yii\helpers\Url;


?>

<div  class="col-md-4">
  <div class="panel panel-default">
    <div class="panel-body ">
      <h2 class="truncate text-center"><?=Html::a($model->title, ['post/view', 'id' => $model-> id])?></h2>
      <hr>
      <p><?=$model->preview?></p>
      
      <hr>
      <div class="text-right">

        <time class="timeago badge" datetime="<?=$model->updated_at?>"></time>
        <span><?=\Yii::$app->formatter->asDatetime($model->updated_at)?></span>
      </div>
    </div>
  </div>
</div>
