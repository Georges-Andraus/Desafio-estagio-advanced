<?php


namespace backend\controllers;

use backend\models\ProfissionaisClinicas;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProfissionaisClinicasController extends Controller
{
    /**
     * Deletes an existing ProfissionaisClinicas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id Profissional ID
     * @param integer $clinica_id Clínica ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $clinica_id)
    {
        $model = ProfissionaisClinicas::findOne(['profissional_id' => $id, 'clinica_id' => $clinica_id]);

        if ($model !== null) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Associação deletada com sucesso.');
        } else {
            Yii::$app->session->setFlash('error', 'Associação não pôde ser encontrada para deletar.');
        }

        return $this->redirect(['profissionais/view', 'id' => $id]);
    }
}
