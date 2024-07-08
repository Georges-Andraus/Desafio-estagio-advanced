<?php

use backend\models\Profissionais;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;



/** @var yii\web\View $this */
/** @var backend\models\ProfissionaisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profissionais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissionais-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profissionais', ['create'], ['class' => 'btn btn-custom']) ?>
        
        <!-- Botão para abrir a modal -->
        <?= Html::button('Criar clínica', ['value' => Url::to('index.php?r=clinicas/create'), 'class' => 'btn btn-custom', 'id' => 'modalButton']) ?>
    </p>

    <?php 
    // Configuração da Modal
    Modal::begin([
        'title' => '<h4>Clínicas</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
        // Configuração para carregar o conteúdo da modal via AJAX
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
        'footer' => '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>'
    ]);

    // Conteúdo da modal carregado via AJAX
    echo "<div id='modalContent'></div>";

    Modal::end(); 
    ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'conselho',
            'headerOptions' => ['style' => 'font-family: Gill Sans, sans-serif; font-weight: bold; text-align: center;'],
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'conselho',
                'data' => ArrayHelper::map(Profissionais::find()->select('conselho')->distinct()->all(), 'conselho', 'conselho'),
                'options' => ['placeholder' => 'Selecione o conselho ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'tags' => true,
                ],
            ]),
        ],
        [
            'attribute' => 'nome',
            'headerOptions' => ['style' => 'font-family: Gill Sans, sans-serif; font-weight: bold; text-align: center;'],
        ],
        [
            'attribute' => 'numero_conselho',
            'headerOptions' => ['style' => 'font-family: Gill Sans, sans-serif; font-weight: bold; text-align: center;'],
        ],
        [
            'attribute' => 'ativo',
            'headerOptions' => ['style' => 'font-family: Gill Sans, sans-serif; font-weight: bold; text-align: center;'],
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'ativo',
                'data' => ArrayHelper::map(Profissionais::find()->select('ativo')->distinct()->all(), 'ativo', 'ativo'),
                'options' => ['placeholder' => 'Selecione o status ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'tags' => true,
                ],
            ]),
        ],
        [
            'attribute' => 'nascimento',
            'headerOptions' => ['style' => 'font-family: Gill Sans, sans-serif; font-weight: bold; text-align: center;'],
            'value' => function ($model) {
                return Yii::$app->formatter->asDate($model->nascimento, 'dd-MM-yyyy'); // Formatando a data
            }
        ],
        [
            'attribute' => 'Clinicas',
            'headerOptions' => ['style' => 'font-family: Gill Sans, sans-serif; font-weight: bold; text-align: center;'],
            'value' => function ($model) {
                $clinicas = [];
                foreach ($model->clinicas as $clinica) {
                    $clinicas[] = Html::encode($clinica->nome); // Encode para segurança
                }
                return implode('<br>', $clinicas); // Use <br> para quebra de linha
            },
            'filter' => Html::activeTextInput($searchModel, 'clinicaNome', ['class' => 'form-control']),
            'format' => 'html', // Necessário para renderizar HTML
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                        'title' => Yii::t('app', 'Update'),
                    ]);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => Yii::t('app', 'Delete'),
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
        ],
    ],
]); ?>

    <?php Pjax::end(); ?>

</div>

<?php
// Script para abrir a modal e carregar o conteúdo via AJAX
$script = <<< JS
    $('#modalButton').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
JS;
$this->registerJs($script);
?>
<style>

.btn-custom {
    background-color: #009186;
    color: white;
    /* Outros estilos conforme necessário */
    
}
.btn-custom:hover {
    background-color: #00524b;
    color: white;
    /* Outros estilos conforme necessário */
    
}
</style>