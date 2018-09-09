<?php

use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Criar Postagem';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-create">

    <h1><?= Html::encode($this->title) ?> </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
