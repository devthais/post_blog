<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\helpers\StringHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $slug
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
  /**
  * @var UploadedFile
  */

  public $imageFile;

  public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                 'value' => new Expression ('NOW()'),
            ],
            [
            'class' => SluggableBehavior::className(),
            'attribute' => 'title',
            // 'slugAttribute' => 'slug',
        ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'image'], 'string', 'max' => 99],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Título',
            'text' => 'Texto',
            'slug' => 'Slug',
            'image' => 'Imagem',
            'created_at' => 'Criado em:',
            'updated_at' => 'Atualizado em:',
        ];
    }

  /*  public function uploadAndSave()
    {
        if ($this->validate()) {
          if (isset($this->imageFile)) {
           $uploadPath = Yii::getAlias('@webroot/uploads');
            $this->imageFile->saveAs($uploadPath .'/'. $this->imageFile->name);
          }
           return $this->save(false);
        }
        return false;
    } */

    /**
     * {@inheritdoc}
     * @return PostQuery the active query used by this AR class.
     */

     public function getPreview()
     {
       $words = 60;

       if (StringHelper::countWords($this->text) > $words) {
        return StringHelper::truncateWords($this->text, $words);
   } else {
        return $this->text;
    }
  }

   public static function find()
   {
       return new PostQuery(get_called_class());
   }

}
