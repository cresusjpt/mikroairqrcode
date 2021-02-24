<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qrcodeparameter".
 *
 * @property int $id
 * @property int|null $logo
 * @property int|null $titre
 * @property string|null $taille
 * @property string|null $logo_source
 * @property int|null $police
 * @property string|null $background
 * @property string|null $foreground
 */
class Qrcodeparameter extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qrcodeparameter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logo', 'titre', 'police'], 'integer'],
            [['taille'], 'string'],
            [['file'], 'file'],
            [['logo_source'], 'string', 'max' => 255],
            [['background', 'foreground'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logo' => Yii::t('app', 'Logo'),
            'file' => Yii::t('app', 'Fichier du Logo'),
            'titre' => Yii::t('app', 'Titre'),
            'taille' => Yii::t('app', 'Taille Image'),
            'logo_source' => Yii::t('app', 'Logo Source'),
            'police' => Yii::t('app', 'Police'),
            'background' => Yii::t('app', 'Couleur de fond'),
            'foreground' => Yii::t('app', 'Couleur'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return QrcodeparameterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QrcodeparameterQuery(get_called_class());
    }
}
