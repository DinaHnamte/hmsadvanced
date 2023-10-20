<?php

namespace hospital\modules\tenantadmin\controllers;

use Yii;
use common\models\Employee;
use common\models\User;
use common\models\auth\AuthAssignment;
use common\models\auth\AuthRole;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\TenantManager;
use common\components\HspManager;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class RolesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        
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

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    // public function actionUserRoles()
    // {
    //     $iduser = Yii::$app->request->get('iduser');
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => AuthAssignment::find()->where(['user_id' => $iduser,
    //                     'tenant_id' =>  HspManager::GetHspId()]),
    //     ]);

    //     return $this->render('index', [
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionUserroles()
    {
        $iduser = Yii::$app->request->get('iduser');
        $dataProvider = new ActiveDataProvider([
            'query' => AuthAssignment::find()->where(['user_id' => $iduser,
                        'tenant_id' =>  HspManager::GetHspId()]),
        ]);

        return $this->render('userroles', [
            'dataProvider' => $dataProvider, 'user' => User::findOne($iduser)
        ]);
    }	
		
	public function actionUsersroles()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Employee::find()->where(['idinstitution' => Yii::$app->session->get('idinstn')]),
        ]);

        return $this->render('usersroles', [
            'dataProvider' => $dataProvider,
        ]);
    }
	
	
	
		
	public function actionAssignroles($iduser)
    {		
		$user = User::findOne($iduser);
		$auth = Yii::$app->authManager;
		if (Yii::$app->request->isPost) {
			$iduser = Yii::$app->request->post('iduser');
			$r = Yii::$app->request->post('role');
				
				$b = $auth->getAssignment($r,$iduser );
				if($b==null){								
					$role = $auth->getRole($r);
					$auth->assign($role, $iduser);
				}else{
					Yii::$app->session->setFlash('success', ' User is already in role.');
				}
        }
		$notin = ['appAdmin','courseAdmin','applicant','instituteAdmin','student','gurdian'];
		
		$userroles = AuthAssignment::find()->where(['user_id' => $user->id])->all();
		//$not = yii\helpers\ArrayHelper::merge($notin, $x);
		foreach($userroles as $u){	
			$notin[]=$u->item_name;
		}
		
		$dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find()->where(['not in' ,'name',$notin]),
        ]);

        return $this->render('assignroles', [
            'dataProvider' => $dataProvider, 'user' => $user,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	/**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($user->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();
    }
}
