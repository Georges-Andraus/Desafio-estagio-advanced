<?php

namespace backend\controllers;

use backend\models\Profissionais;
use backend\models\ProfissionaisSearch;
use backend\models\ProfissionaisClinicas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProfissionaisController implements the CRUD actions for Profissionais model.
 */
class ProfissionaisController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
               'acess' => [
                    'class' => AccessControl::className(),
                    'only' => ['create', 'update', 'delete','view'],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ], 
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Profissionais models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfissionaisSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profissionais model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profissionais model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profissionais();

        $post = $this->request->post();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                if (!empty($post['Profissionais']['clinicas'])) {
                    foreach ($post['Profissionais']['clinicas'] as $clinica) {
                        $modelClinicas = new ProfissionaisClinicas();
                        $modelClinicas->profissional_id = $model->id;
                        $modelClinicas->clinica_id = $clinica;
                        $modelClinicas->save();
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profissionais model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = $this->request->post();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if (!empty($post['Profissionais']['clinicas'])) {
                ProfissionaisClinicas::deleteAll(['profissional_id' => $model->id]);
                foreach ($post['Profissionais']['clinicas'] as $clinica) {
                    $modelClinicas = new ProfissionaisClinicas();
                    $modelClinicas->profissional_id = $model->id;
                    $modelClinicas->clinica_id = $clinica;
                    $modelClinicas->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profissionais model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    { 
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profissionais model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Profissionais the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profissionais::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
