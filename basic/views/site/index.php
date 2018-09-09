<?php

use yii\helpers\Url;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $dt_posts yii\data\ActiveDataProvider */

$this->title = 'My Blog';
?>

<div class="container">
  <?=\yii\widgets\ListView::widget([
     'dataProvider' => $dt_posts,
     'itemView' => '_post',
     'layout' => '<div class="row">{items}</div><div class="text-center">{pager}</div>',

   ])?>
</div>
