<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "codeqr".
 *
 * @property int $id
 * @property string $source
 * @property int $partenaire
 * @property int $diffuser
 *
 * @property Diffuseur $diffuser0
 * @property Partenaire $partenaire0
 */
class Codeqr extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'codeqr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partenaire', 'diffuser'], 'required'],
            [['id', 'partenaire', 'diffuser'], 'integer'],
            [['source'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['diffuser'], 'exist', 'skipOnError' => true, 'targetClass' => Diffuseur::class, 'targetAttribute' => ['diffuser' => 'id']],
            [['partenaire'], 'exist', 'skipOnError' => true, 'targetClass' => Partenaire::class, 'targetAttribute' => ['partenaire' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'source' => Yii::t('app', 'Source'),
            'partenaire' => Yii::t('app', 'Partenaire'),
            'diffuser' => Yii::t('app', 'Diffuser'),
        ];
    }

    /**
     * Gets query for [[Diffuser0]].
     *
     * @return \yii\db\ActiveQuery|DiffuseurQuery
     */
    public function getDiffuser0()
    {
        return $this->hasOne(Diffuseur::class, ['id' => 'diffuser']);
    }

    /**
     * Gets query for [[Partenaire0]].
     *
     * @return \yii\db\ActiveQuery|PartenaireQuery
     */
    public function getPartenaire0()
    {
        return $this->hasOne(Partenaire::class, ['id' => 'partenaire']);
    }

    /**
     * {@inheritdoc}
     * @return CodeqrQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CodeqrQuery(get_called_class());
    }
}
