<?php

namespace app\controllers;

use Yii;
use app\models\Blogs;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UploadForm;
use app\models\BlogsSearch;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * BlogsController implements the CRUD actions for Blogs model.
 */
class BlogsController extends Controller
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
     * Lists all Blogs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blogs model.
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
     * Creates a new Blogs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blogs();

        if ($model->load(Yii::$app->request->post())) {
            $m = new UploadForm();
            $m->file = UploadedFile::getInstance($model, 'image');
            $file_name = '';
            if ($m->file && $m->validate()) {     
               // var_dump($m->file->tempName);die();           
                $file_name = 'uploads/' . $m->file->baseName . '.' . $m->file->extension;
               // move_uploaded_file($m->file->tempName, $file_name);
                
                $m->file->saveAs($file_name);

                $model->image = $file_name;
            }

            if($model->validate() && $model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blogs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);  
        $m = new UploadForm();
        $m->file = UploadedFile::getInstance($model, 'image');
        $file_name = '';
        if ($m->file && $m->validate()) {     
           // var_dump($m->file->tempName);die();           
            $file_name = 'uploads/' . $m->file->baseName . '.' . $m->file->extension;
           // move_uploaded_file($m->file->tempName, $file_name);
            
            $m->file->saveAs($file_name);

            $model->image = $file_name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blogs model.
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
     * Finds the Blogs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blogs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blogs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
