<?php

namespace hospital\modules\tenantadmin\controllers;

use common\models\RegUser;
use Yii;
use yii\web\Controller;
use common\models\Employee;
use common\models\auth\AuthAssignment;
use common\models\auth\AuthRole;
use common\models\Tenant;
use common\models\TenantApp;
use common\components\HspManager;
use common\models\User;
use yii\data\ActiveDataProvider;
use common\components\TenantManager;

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

        return $this->render('index');
    }

    public function actionGetEmployeeIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Employee::find()->where([
                'tenant_id' => TenantManager::getTenantId()])->with("regUser"),
        ]);

        return $this->render('get-employee-index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddEmployee(){
        
        $model = new RegUser();
        if ($this->request->isPost) {
            $user_id = Yii::$app->request->post('user_id');
            //return $this->redirect(['get-employee-index', 'user_id' => $user_id]);
            if($this->request->post('search')=='search'){
                $email = $this->request->post('txtemail');
                $mdl = User::findByUsername($email);
                if($mdl){
                    $x = Employee::find()->where(['tenant_id' => TenantManager::getTenantId(),
                                         'user_id' => $mdl->id])->count();
                    if($x>0){
                        return 'Already an employee';;                    
                    }                    
                    $model = $mdl->regUser;
                }
                
            }else{
                $tenant_id = TenantManager::getTenantId();
                $x = Employee::find()->where(['user_id' => $user_id, 'tenant_id' => $tenant_id])->count();
                if($x>0){
                    return 'Already an employee';
                }
                $reg_user = RegUser::findOne($user_id);
                $emp = new Employee();
                $emp->user_id = $reg_user->id;
                $emp->tenant_id = $tenant_id;
                $emp->status = 1;
                $dt = time();
                $emp->created_at = $dt;
                $emp->updated_at = $dt;
                if($emp->save(false)){
                    if(AuthAssignment::assignRole('Admin', $user_id, $tenant_id)){
                        return 'ok';
                    }
                }                               
                return 'Something went wrong';
            }
        }

        return $this->renderAjax('add-employee',[
            'reguserModel' => $model, 
        ]);
    }

    public function actionUserroles()
    {
        $iduser = Yii::$app->request->get('user_id');
        if ($this->request->isPost) {
            $iduser = $this->request->post('user_id');
            $authId = $this->request->post('id');
            AuthAssignment::revokeRole();

        } 
        $dataProvider = new ActiveDataProvider([
            'query' => AuthAssignment::find()->where(['user_id' => $iduser,
                        'tenant_id' =>  TenantManager::getTenantId()]),
        ]);

        return $this->render('userroles', [
            'dataProvider' => $dataProvider, 'regUser' => RegUser::findOne($iduser)
        ]);
    }

    public function actionDelUserRole($user_id)
    {        
        if ($this->request->isPost) {
            $user_id = $this->request->post('user_id');
            $id = $this->request->post('id');
            $model = AuthAssignment::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Role removed successfully.");
        } 
        $dataProvider = new ActiveDataProvider([
            'query' => AuthAssignment::find()->where(['user_id' => $user_id,
                        'tenant_id' =>  TenantManager::getTenantId()]),
        ]);

        return $this->render('userroles', [
            'dataProvider' => $dataProvider, 'regUser' => RegUser::findOne($user_id)
        ]);
    }

    public function actionAssignUserRole($user_id)
    {        
        if ($this->request->isPost) {
            $user_id = $this->request->post('user_id');
            $id = $this->request->post('id');
            if(AuthAssignment::assignRole($role->id, $user_id, 0)){
                Yii::$app->session->setFlash('success', "Role assigned successfully.");
            } 

        } 
        $t_id = TenantManager::getTenantId();
        $ids = AuthAssignment::find()->where(['user_id' => $user_id,
                        'tenant_id' =>  $t_id])->select(['role_id as id'])->all();
        $tenantapp = TenantApp::find()->where(['tenant_id' => $t_id, 'app_id' => Yii::$app->id ])
                        ->select(['app_id'])->all();
        $query = AuthRole::find()->where(['not in', 'id', $ids])
                            ->andWhere(['in', 'app_id', $tenantapp]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('userroles', [
            'dataProvider' => $dataProvider, 'regUser' => RegUser::findOne($user_id)
        ]);
    }

    public function actionGetRoles()
    {   
        $id = $this->request->get("id");
        $dataProvider = new ActiveDataProvider([
            'query' => AuthRole::find()->where(['app_id' => Yii::$app->id]),            
            'pagination' => [
                'pageSize' => 10
            ],            
        ]);
        // $authMnger = Yii::$app->authManager;
        // $provider = new ArrayDataProvider([
        // 'allModels' => $authMnger->getRoles(),
        // ]);

        return $this->render('get-roles', [
            'dataProvider' => $dataProvider,
        ]);
      return $this->render('get-roles');
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
            $staff->hsp_id = HspManager::GetHspId();
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
