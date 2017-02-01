<?php

namespace backend\controllers;

use backend\models\search\WorkerLogSearch;
use common\models\WorkerLog;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


/**
 * Class WorkerLogController
 *
 * @author Petr Marochkin <petun911@gmail.com>
 */
class WorkerLogController extends Controller
{


    public function actionIndex()
    {
        $searchModel = new WorkerLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = WorkerLog::findOne($id);
        return $this->render('view', ['model' => $model]);
    }


}