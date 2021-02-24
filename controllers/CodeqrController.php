<?php

namespace app\controllers;

use app\models\Diffuseur;
use app\models\Qrcodeparameter;
use Da\QrCode\Contracts\ErrorCorrectionLevelInterface;
use Da\QrCode\Label;
use Da\QrCode\QrCode;
use phpDocumentor\Reflection\Types\Boolean;
use Yii;
use app\models\Codeqr;
use app\models\CodeqrSearch;
use yii\base\ErrorException;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CodeqrController implements the CRUD actions for Codeqr model.
 */
class CodeqrController extends Controller
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
     * Lists all Codeqr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CodeqrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Codeqr model.
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
     * Creates a new Codeqr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Codeqr();

        if ($model->load(Yii::$app->request->post())) {
            $parameter = Qrcodeparameter::find()->one();

            $generated = $this->generateCode($model,$parameter);
            if ($generated){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                throw new ErrorException("Une erreur s'est produite lors de la génération du code QR. Veuillez réessayer ou contacter l'administrateur");
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionScentbox(){
        $model = new Codeqr();

        return $this->render('scentbox');
    }

    private function generateCode(Codeqr $model, Qrcodeparameter $parameter){

        $value = false;

        $diffuser = Diffuseur::find()->where(['id'=>$model->diffuser])->one();

        $qrCode = (new Qrcode($diffuser->info_unique_id));
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevelInterface::HIGH);
        $qrCode->setMargin(3);

        $pathname = "/codes/" . $diffuser->info_unique_id . ".png";

        if ($parameter != null){
            $qrCode->setSize($parameter->taille);

            if ($parameter->titre >0){
                $label = (new Label($diffuser->info_unique_id))->setFontSize($parameter->police);
                $qrCode->setLabel($label);
            }
            if ($parameter->logo >0){
                $qrCode->setLogo(Yii::$app->basePath. "/web/".$parameter->logo_source);
                $qrCode->setLogoWidth($qrCode->getSize()/5);
            }


            $hexBack = $parameter->background;
            $hexFore = $parameter->foreground;
            list($rb, $gb, $bb) = sscanf($hexBack, "#%02x%02x%02x");
            list($rf, $gf, $bf) = sscanf($hexFore, "#%02x%02x%02x");

            $qrCode->setForegroundColor($rf,$gf,$bf);
            $qrCode->setBackgroundColor($rb,$gb,$bb);


            $model->source = $pathname;
            if ($model->save() && $qrCode->writeFile(Yii::$app->basePath. "/web".$pathname)){
                $value =  true;
            }else{
                $value = false;
            }
        }else{
            $qrCode->setForegroundColor(255,255,255);
            $qrCode->setBackgroundColor(0,0,0);
            $qrCode->setSize(150);

            $model->source = $pathname;
            if ($model->save() && $qrCode->writeFile(Yii::$app->basePath. "/web".$pathname)){
                $value =  true;
            }else{
                $value = false;
            }
        }

        return $value;
    }

    /**
     * Updates an existing Codeqr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $parameter = Qrcodeparameter::find()->one();

            //$this->generateCode($model,$parameter);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Codeqr model.
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
     * Finds the Codeqr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Codeqr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Codeqr::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
