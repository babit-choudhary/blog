<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blogs */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blogs-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!-- Blog Post -->
    <div class="card mb-4">
          <img class="card-img-top" src="<?= Url::base(true)."/".$model->image ?>" width="750" height="300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?= Html::encode($this->title) ?></h2>
            <p class="card-text"><?= $model->description ?></p>
          </div>
          <div class="card-footer text-muted">
          Posted by
            <a href="#"><?= $model->user->email ?></a>
            on <?= $model->created_at ?>
          </div>
        </div>



</div>

