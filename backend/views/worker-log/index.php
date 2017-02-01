<?php

use common\grid\EnumColumn;
use common\models\WorkerLog;
use kartik\daterange\DateRangePicker;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\WorkerLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Worker Log');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            'id',
            [
                'attribute' => 'command',
                'class' => EnumColumn::className(),
                'enum' => WorkerLog::find()->allCommands(),
                'value' => function (WorkerLog $model) {
                    return Html::a($model->command, ['view', 'id' => $model->id]);
                },
                'format' => 'raw'
            ],
            [
                'class' => EnumColumn::className(),
                'attribute' => 'status',
                'enum' => WorkerLog::find()->allStatuses()
            ],
            'curveId',
            'avatarId',
            'generation_time',
            [
                'attribute' => 'created_at',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'datetime_range',
                    'convertFormat' => true,
                    'startAttribute' => 'datetime_min',
                    'endAttribute' => 'datetime_max',
                    'pluginOptions' => [
                        'opens' => 'right',
                        'locale' => [
                            'cancelLabel' => 'Clear',
                            'format' => 'Y-m-d',
                        ]
                    ]
                ])
            ]
            //'created_at:datetime',
        ]
    ]); ?>
</div>
