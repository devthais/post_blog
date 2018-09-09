<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
   <h1 class="text-center"><?= Html::encode($model->title)?></h1>
    </div>

  <hr>
    <?=$model->text?>

    <hr>

      <div class="row">
      <div class="col-xs-6">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

      </div>
        <div class="col-xs-6">
          <p class="text-right">
          <time class="timeago badge" datetime="<?=$model->updated_at?>"></time>
          <span><?=\Yii::$app->formatter->asDatetime($model->updated_at)?></span>

        </p>

      </div>
       </div>
      </div>
      </div>


<div class="text-right">
  <p>
  <h4> MAIS INFORMAÇÕES  </h4>
</p>
      <?=  DetailView::widget([
          'model' => $model,
          'attributes' => [
              'id',
              'title',
              'text:ntext',
              'slug',
              [
                'attribute'=> 'image',
              ],
              'created_at',
              'updated_at',
          ],
      ]); ?>

</div>
