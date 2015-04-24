<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DataList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Data Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-list-view">


    <p>
	    <?= Html::a(Yii::t('backend', 'Back to Lists'), ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'name',
            'position',
        ],
    ]) ?>

</div>
