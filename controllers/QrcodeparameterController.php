<?php

namespace app\controllers;

use Yii;
use app\models\Qrcodeparameter;
use app\models\QrcodeparameterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * QrcodeparameterController implements the CRUD actions for Qrcodeparameter model.
 */
class QrcodeparameterController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Qrcodeparameter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QrcodeparameterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Qrcodeparameter model.
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
     * Creates a new Qrcodeparameter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Qrcodeparameter();
        $model->background = "#ffffff";
        $model->foreground = "#000000";
        $model->titre = 0;
        $model->logo = 0;
        $model->taille = 300;
        $model->police = 12;

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, "file");

            $this->saveFile($model);

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    private function saveFile(Qrcodeparameter $model)
    {
        if ($model->file != null) {
            $name = "parameter_logo";
            $pathname = "uploads/" . $name . "." . $model->file->extension;
            $model->file->saveAs($pathname);

            $model->logo_source = $pathname;
        }
    }

    /**
     * Updates an existing Qrcodeparameter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, "file");
            $this->saveFile($model);

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Qrcodeparameter model.
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
     * Finds the Qrcodeparameter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Qrcodeparameter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Qrcodeparameter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
