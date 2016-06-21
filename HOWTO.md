# Data Widgets
## GridView
http://www.yiiframework.com/doc-2.0/guide-output-data-widgets.html#gridview
```php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'birthday',
            'format' => ['date', 'php:Y-m-d'] // or 
        ],
        'description:html',
        // More complex one.
        [
            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
            'value' => function ($data) {
                return $data->name; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
        ],
        ['class' => 'yii\grid\ActionColumn', 'template'=>'{update} {delete}'],
    ],
]);
```


## List view
http://www.yiiframework.com/doc-2.0/guide-output-data-widgets.html#listview
```php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_post',
    'viewParams' => [
        'fullView' => true,
        'context' => 'main-page',
        // ...
    ],
]);
```


## Detail view
http://www.yiiframework.com/doc-2.0/guide-output-data-widgets.html#detailview
```php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',               // title attribute (in plain text)
        'description:html',    // description attribute formatted as HTML
        [                      // the owner name of the model
            'label' => 'Owner',
            'value' => $model->owner->name,
        ],
        'created_at:datetime', // creation date formatted as datetime
    ],
]);
```

# Widgets
http://www.yiiframework.com/doc-2.0/ext-jui-index.html

## Datepicker widget
http://www.yiiframework.com/doc-2.0/yii-jui-datepicker.html
```php
$form->field($model, 'from_date')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
])
```

## Masked input widget
http://www.yiiframework.com/doc-2.0/yii-widgets-maskedinput.html
```php
$form->field($model, 'from_date')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999-999-9999',
])
```

# Testing
## Load fixtures
`console/yii fixture/load "*" --namespace='tests\codeception\common\fixtures'`

## Run unit tests
`vendor/bin/codecept run unit --no-colors --coverage --coverage-html --coverage-xml -c tests/codeception/common/ tests/codeception/common/unit/TestName:MethodName`


# Forms
## Controller workflow
```php
$model = new EntryForm();
if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    return $this->render('entry-confirm', ['model' => $model]);
} else {
    // either the page is initially displayed or there is some validation error
    return $this->render('entry', ['model' => $model]);
}
```

## View
http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html

http://www.yiiframework.com/doc-2.0/yii-bootstrap-activefield.html
```php
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(
[
 'action' => ['site/index'],
 'method' => 'post',
 'options' => ['class' => 'col-xs-1'],
]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
```

# Data Formatting
http://www.yiiframework.com/doc-2.0/guide-output-formatting.html#date-and-time
```php
Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
Yii::$app->formatter->asTime(1412599260);
```

Format options
- raw: the value is outputted as is, this is a pseudo-formatter that has no effect except that null values will be formatted using nullDisplay.
- text: the value is HTML-encoded. This is the default format used by the GridView DataColumn.
- ntext: the value is formatted as an HTML-encoded plain text with newlines converted into line breaks.
- paragraphs: the value is formatted as HTML-encoded text paragraphs wrapped into <p> tags.
- html: the value is purified using HtmlPurifier to avoid XSS attacks. You can pass additional options such as ['html', ['Attr.AllowedFrameTargets' => ['_blank']]].
- email: the value is formatted as a mailto-link.
- image: the value is formatted as an image tag.
- url: the value is formatted as a hyperlink.
- boolean: the value is formatted as a boolean. By default true is rendered as Yes and false as No, translated to the current application language. You can adjust this by configuring the yii\i18n\Formatter::$booleanFormat property.


Formatter confuguration
```php
return [
    'components' => [
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
       ],
    ],
];
```

# Views and Layouts
## Asset Class Example
```php
<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/style.css',
    ];

    public $js = [
        'js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'common\assets\Html5shiv',
    ];

}
```


# Database
## Working with dates
// timestamp to date
```sql
SELECT FROM_UNIXTIME(1447430881); // mysql
SELECT DATE_FORMAT(FROM_UNIXTIME(1447430881), '%d-%m-%Y'); // mysql
SELECT to_char(current_timestamp, 'Day, DD  HH12:MI:SS') FROM TABLE1; // postgres
SELECT to_char(to_timestamp(created_at), 'DD.mm.YYYY  HH24:MI:SS')FROM table1; // postgres
```

# Import from CSV files
```php
$files=\yii\helpers\FileHelper::findFiles(Yii::getAlias('@common'). '/data');
        foreach ($files as $file) {

            $importer = new CSVImporter;

            $importer->setData(new CSVReader([
                'filename' => $file,
                'fgetcsvOptions' => [
                    'delimiter' => '\n'
                ],
                'startFromLine' => 0
            ]));

            $codes = [];
            foreach ($importer->getData() as $item) {
                $codes[] = [$item[0]];
                if (count($codes) == 500) {
                    try{
                        $this->batchInsert('{{%table}}', ['id'], $codes);
                    }
                    catch(Exception $e){
                        echo $e->getMessage(). "\n";
                    }
                    $codes = [];
                }
            }
        }
```

# TODOS
- Glide + Upload Behavior
- Search guide 
- Yii layouts
- Yii views
- Yii2 query builder examples 
