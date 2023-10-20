<?php

namespace hospital\modules\tenantadmin\controllers;


use Yii;
use common\models\RegUser;
use common\models\User;
use common\models\AuthAssignment;
use yii\web\Controller;
use common\models\Employee;
use yii\data\ActiveDataProvider;
use common\components\TenantManager;

/**
 * Default controller for the `modules` module
 */
class EmployeeController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Employee::find()->where(['hsp_id' => TenantManager::getTenantId()])->with("regUser"),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddEmployee(){
        
        if ($this->request->isPost) {
            $user_id = Yii::$app->request->post('user_id');
            return $this->redirect(['employee-details', 'user_id' => $user_id]);
        }

        return $this->render('create-employee');
    }

    public function actionCreateEmployee(){
        $reg_user = RegUser::findOne(['id' => $user_id]);
        if ($this->request->isPost) {
            if($this->request->post('txtSearch'))
            $user_id = Yii::$app->request->post('user_id');
            return $this->redirect(['employee-details', 'user_id' => $user_id]);
        }

        return $this->render('create-employee',['reguserModel' => ]);
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
            $staff = new Employee();
            $staff->user_id = $reg_model->id;
            $staff->hsp_id = TenantManager::getTenantId();
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
