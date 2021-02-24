<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diffuseur".
 *
 * @property int $id
 * @property int $client_id
 * @property string $info_unique_id Info provenant de la carte electronique
 * @property string $info_numero_serie Info provenant de l etiquette (Exemple : MKA1XXX
 * @property string $info_date_installation
 * @property string|null $info_date_derniere_connexion
 * @property string|null $info_emplacement
 * @property int $info_etat
 * @property int $param_duree_cycle_on
 * @property int $param_duree_cycle_off
 * @property string|null $param_programmation
 * @property int $param_frequence_connexion
 * @property int $param_vitesse_ventilo
 * @property int $param_compresseur
 *
 * @property Cartouche $cartouche
 * @property Partenaire $client
 * @property DiffuseurManualSwitch[] $diffuseurManualSwitches
 * @property DiffuseurPlageHoraire[] $diffuseurPlageHoraires
 * @property MinuteurScheduler[] $minuteurSchedulers
 */
class Diffuseur extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diffuseur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'info_unique_id', 'info_numero_serie', 'info_date_installation', 'info_etat', 'param_duree_cycle_on', 'param_duree_cycle_off', 'param_frequence_connexion', 'param_vitesse_ventilo', 'param_compresseur'], 'required'],
            [['client_id', 'info_etat', 'param_duree_cycle_on', 'param_duree_cycle_off', 'param_frequence_connexion', 'param_vitesse_ventilo', 'param_compresseur'], 'integer'],
            [['info_date_installation', 'info_date_derniere_connexion'], 'safe'],
            [['info_unique_id', 'info_emplacement'], 'string', 'max' => 255],
            [['info_numero_serie'], 'string', 'max' => 7],
            [['param_programmation'], 'string', 'max' => 42],
            [['info_unique_id'], 'unique'],
            [['info_numero_serie'], 'unique'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partenaire::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_id' => Yii::t('app', 'Client ID'),
            'info_unique_id' => Yii::t('app', 'Info provenant de la carte electronique'),
            'info_numero_serie' => Yii::t('app', 'Info provenant de l etiquette (Exemple : MKA1XXX'),
            'info_date_installation' => Yii::t('app', 'Info Date Installation'),
            'info_date_derniere_connexion' => Yii::t('app', 'Info Date Derniere Connexion'),
            'info_emplacement' => Yii::t('app', 'Info Emplacement'),
            'info_etat' => Yii::t('app', 'Info Etat'),
            'param_duree_cycle_on' => Yii::t('app', 'Param Duree Cycle On'),
            'param_duree_cycle_off' => Yii::t('app', 'Param Duree Cycle Off'),
            'param_programmation' => Yii::t('app', 'Param Programmation'),
            'param_frequence_connexion' => Yii::t('app', 'Param Frequence Connexion'),
            'param_vitesse_ventilo' => Yii::t('app', 'Param Vitesse Ventilo'),
            'param_compresseur' => Yii::t('app', 'Param Compresseur'),
        ];
    }

    /**
     * Gets query for [[Cartouche]].
     *
     * @return \yii\db\ActiveQuery|CartoucheQuery
     */
    public function getCartouche()
    {
        return $this->hasOne(Cartouche::className(), ['diffuseur_id' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|PartenaireQuery
     */
    public function getClient()
    {
        return $this->hasOne(Partenaire::class, ['id' => 'client_id']);
    }

    public function getDiffuseurinfo()
    {
        return $this->info_date_derniere_connexion." | ".$this->info_unique_id . " | ".$this->client->raison_sociale;
    }

    /**
     * Gets query for [[DiffuseurManualSwitches]].
     *
     * @return \yii\db\ActiveQuery|DiffuseurManualSwitchQuery
     */
    public function getDiffuseurManualSwitches()
    {
        return $this->hasMany(DiffuseurManualSwitch::className(), ['diffuseur_id' => 'id']);
    }

    /**
     * Gets query for [[DiffuseurPlageHoraires]].
     *
     * @return \yii\db\ActiveQuery|DiffuseurPlageHoraireQuery
     */
    public function getDiffuseurPlageHoraires()
    {
        return $this->hasMany(DiffuseurPlageHoraire::className(), ['diffuseur_id' => 'id']);
    }

    /**
     * Gets query for [[MinuteurSchedulers]].
     *
     * @return \yii\db\ActiveQuery|MinuteurSchedulerQuery
     */
    public function getMinuteurSchedulers()
    {
        return $this->hasMany(MinuteurScheduler::className(), ['diffuseur_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DiffuseurQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DiffuseurQuery(get_called_class());
    }
}
