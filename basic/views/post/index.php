<?php
use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar nova postagem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => Post::find(),
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);

    ?>
    </div>

 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',
            'slug',
            'image',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
     ?>
