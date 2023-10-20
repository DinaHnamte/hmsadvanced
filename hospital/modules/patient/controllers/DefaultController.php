<?php

namespace hospital\modules\patient\controllers;

use common\models\Encounter;
use Yii;
use yii\helpers\Json;
use common\models\OpdReg;
use common\models\RegUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Hsp;
/**
 * PatientController implements the CRUD actions for OpdReg model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all OpdReg models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $x = Hsp::find()->where(['type' => 'Hospital'])->count();
        if($x==1){
            $mdl = Hsp::find()->where(['type' => 'Hospital'])->one();
            return $this->redirect(['create', 'hsp_id' => $mdl->id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Hsp::find()->where(['type' => 'Hospital']),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OpdReg model.
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
     * Creates a new OpdReg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Encounter();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->registered_at = time();
                $model->save();
                return "done";
            }
        } else {
            $model->loadDefaultValues();
        }

        $dataProvider = new ActiveDataProvider([
                'query' => Encounter::find()->where(['pat_id' => Yii::$app->user->identity->id, 
                'hsp_id' => $this->request->get('hsp_id')])->orderBy(['registered_at' => SORT_DESC])
                ->with('hsp')
        ]);

        $model->hsp_id = $this->request->get('hsp_id');
        $model->encounter_type = 'OPD';
        $model->pat_id = Yii::$app->user->identity->id;
        return $this->render('create', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Updates an existing OpdReg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OpdReg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $id = $this->request->post("id");
        $delete_res = $this->findModel($id)->delete();
        if($delete_res){
            return true;
        }else{
            return false;
        }  
    }

    /**
     * Finds the OpdReg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return OpdReg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Encounter::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
