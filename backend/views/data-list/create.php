<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DataList */

$this->title = Yii::t('backend', 'Create Data List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Data Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-list-create">

	<p><?= Html::a(Yii::t('backend', 'Back to Lists'), ['index'], ['class' => 'btn btn-default']) ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
