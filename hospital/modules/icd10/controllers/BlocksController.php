<?php

namespace hospital\modules\icd10\controllers;

use common\models\utilities\Blocks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlocksController implements the CRUD actions for Blocks model.
 */
class BlocksController extends Controller
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
     * Lists all Blocks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Blocks::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'BlockId' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blocks model.
     * @param string $BlockId Block ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($BlockId)
    {
        return $this->render('view', [
            'model' => $this->findModel($BlockId),
        ]);
    }

    /**
     * Creates a new Blocks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Blocks();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'BlockId' => $model->BlockId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blocks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $BlockId Block ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($BlockId)
    {
        $model = $this->findModel($BlockId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'BlockId' => $model->BlockId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blocks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $BlockId Block ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($BlockId)
    {
        $this->findModel($BlockId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blocks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $BlockId Block ID
     * @return Blocks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($BlockId)
    {
        if (($model = Blocks::findOne(['BlockId' => $BlockId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
