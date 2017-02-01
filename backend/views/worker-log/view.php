<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SystemLog */

$this->title = Yii::t('backend', 'Worker Log #{id}', ['id'=>$model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Worker Log'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-log-view">
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'command',
            'params',
            'response',
            'status',
            'generation_time',
            'error_details'
        ],
    ]) ?>

</div>
