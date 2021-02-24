<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partenaire".
 *
 * @property int $id
 * @property int|null $distributeur_id
 * @property string|null $type
 * @property string $numero
 * @property string|null $raison_sociale
 * @property string|null $adresse_1
 * @property string|null $adresse_2
 * @property string|null $code_postal
 * @property string|null $ville
 * @property string|null $telephone
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $logo
 * @property string|null $template
 *
 * @property Diffuseur[] $diffuseurs
 * @property Document[] $documents
 * @property Partenaire $distributeur
 * @property Partenaire[] $partenaires
 * @property Utilisateur[] $utilisateurs
 */
class Partenaire extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partenaire';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['distributeur_id'], 'integer'],
            [['type'], 'string'],
            [['numero'], 'required'],
            [['numero', 'raison_sociale', 'adresse_1', 'adresse_2', 'ville', 'telephone', 'mobile', 'email', 'logo', 'template'], 'string', 'max' => 255],
            [['code_postal'], 'string', 'max' => 5],
            [['numero'], 'unique'],
            [['distributeur_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partenaire::className(), 'targetAttribute' => ['distributeur_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'distributeur_id' => Yii::t('app', 'Distributeur ID'),
            'type' => Yii::t('app', 'Type'),
            'numero' => Yii::t('app', 'Numero'),
            'raison_sociale' => Yii::t('app', 'Raison Sociale'),
            'adresse_1' => Yii::t('app', 'Adresse 1'),
            'adresse_2' => Yii::t('app', 'Adresse 2'),
            'code_postal' => Yii::t('app', 'Code Postal'),
            'ville' => Yii::t('app', 'Ville'),
            'telephone' => Yii::t('app', 'Telephone'),
            'mobile' => Yii::t('app', 'Mobile'),
            'email' => Yii::t('app', 'Email'),
            'logo' => Yii::t('app', 'Logo'),
            'template' => Yii::t('app', 'Template'),
        ];
    }

    /**
     * Gets query for [[Diffuseurs]].
     *
     * @return \yii\db\ActiveQuery|DiffuseurQuery
     */
    public function getDiffuseurs()
    {
        return $this->hasMany(Diffuseur::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Documents]].
     *
     * @return \yii\db\ActiveQuery|DocumentQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['partenaire_id' => 'id']);
    }

    /**
     * Gets query for [[Distributeur]].
     *
     * @return \yii\db\ActiveQuery|PartenaireQuery
     */
    public function getDistributeur()
    {
        return $this->hasOne(Partenaire::className(), ['id' => 'distributeur_id']);
    }

    /**
     * Gets query for [[Partenaires]].
     *
     * @return \yii\db\ActiveQuery|PartenaireQuery
     */
    public function getPartenaires()
    {
        return $this->hasMany(Partenaire::className(), ['distributeur_id' => 'id']);
    }

    /**
     * Gets query for [[Utilisateurs]].
     *
     * @return \yii\db\ActiveQuery|UtilisateurQuery
     */
    public function getUtilisateurs()
    {
        return $this->hasMany(Utilisateur::className(), ['partenaire_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PartenaireQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartenaireQuery(get_called_class());
    }
}
