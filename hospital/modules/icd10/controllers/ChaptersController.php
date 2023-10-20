<?php

namespace utilities\modules\icd10\controllers;

use common\models\utilities\Chapters;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChaptersController implements the CRUD actions for Chapters model.
 */
class ChaptersController extends Controller
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
     * Lists all Chapters models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Chapters::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'ChapterId' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Chapters model.
     * @param string $ChapterId Chapter ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ChapterId)
    {
        return $this->render('view', [
            'model' => $this->findModel($ChapterId),
        ]);
    }

    /**
     * Creates a new Chapters model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Chapters();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ChapterId' => $model->ChapterId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Chapters model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ChapterId Chapter ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ChapterId)
    {
        $model = $this->findModel($ChapterId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ChapterId' => $model->ChapterId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Chapters model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ChapterId Chapter ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ChapterId)
    {
        $this->findModel($ChapterId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Chapters model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ChapterId Chapter ID
     * @return Chapters the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ChapterId)
    {
        if (($model = Chapters::findOne(['ChapterId' => $ChapterId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
