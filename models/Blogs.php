<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blogs".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $user_id
 * @property string|null $image
 */
class Blogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogs';
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string','min'=>"300", 'max' => 1000],
        ];
    }

    public function behaviors()

    {

        return [

            'timestamp' => [

                'class' => 'yii\behaviors\TimestampBehavior',

                'attributes' => [

                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],

                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],

                ],

                'value' => new Expression('NOW()'),

            ],           

        ];

     }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'image' => 'Image',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
