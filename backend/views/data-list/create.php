<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DataList */

$this->title = Yii::t('backend', 'Create Data List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Data Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
