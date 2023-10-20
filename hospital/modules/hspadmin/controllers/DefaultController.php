<?php

namespace hospital\modules\hspadmin\controllers;

use common\models\RegUser;
use Yii;
use yii\web\Controller;
use common\models\Staff;
use yii\web\UploadedFile;
use common\models\UploadLogo;
use yii\data\ActiveDataProvider;

/**
 * Default controller for the `modules` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Staff::find()->where(['hsp_id' => "6520f22a72606"])->with("regUser"),
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

    public function actionCreateEmployee(){
        
        if ($this->request->isPost) {
            $user_id = Yii::$app->request->post('user_id');
            return $this->redirect(['employee-details', 'user_id' => $user_id]);
        }

        return $this->render('create-employee');
    }

    public function actionEmployeeDetails(){
        $user_id = Yii::$app->request->get('user_id');
        $reg_user = RegUser::findOne(['id' => $user_id]);
        if($reg_user == null){
            $reg_user = new RegUser();
        }

        if ($this->request->isPost) {
            $reg_model = new RegUser();
            $reg_model->load(Yii::$app->request->post());
            $user_id = Yii::$app->request->post('id');
            $reg_user = RegUser::findOne(['id' => $user_id]);
            $staff = new Staff();
            $staff->user_id = $reg_model->id;
            $staff->hsp_id = "6520f22a72606";
            $staff->status = 1;
            $dt = time();
            $staff->created_at = $dt;
            $staff->updated_at = $dt;
            $staff->save(false);
            return $this->redirect(['index']);
        }
        
        return $this->render('employee-details',['model' => $reg_user]);
    }
	
	// public function actionUploadlogo()
    // {
    //     $model = new UploadLogo();

    //     if (Yii::$app->request->isPost) {
    //         $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
    //         if ($model->upload('logo_'. Yii::$app->session->get('idinstn',0))) {
    //             Yii::$app->session->setFlash('success', "Logo uploaded successfully.");
    //             return $this->redirect(['index']);
    //         }
    //     }
		
    //     return $this->render('uploadlogo', ['model' => $model]);
    // }
	
}
