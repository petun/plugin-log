<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DataList */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Data List',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Data Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="data-list-update">

<p><?= Html::a(Yii::t('backend', 'Back to Lists'), ['index'], ['class' => 'btn btn-default']) ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
