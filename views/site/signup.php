<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'enableAjaxValidation' => true,]); ?>
            <?php
            $wizard_config = [
                'id' => 'stepwizard',
                'steps' => [
                    1 => [
                        'title' => 'Step 1',
                        'icon' => 'glyphicon glyphicon-cloud-download',
                        'content' => '<div class="row">
            <div class="col-lg-12">' . $form->field($model, 'email') . '
            </div></div>',
                        'buttons' => [
                            'next' => [
                                'title' => 'Next',
                                'options' => [
                                    'class' => 'btn btn-primary',
                                    // 'disabled' => true
                                ],
                            ],
                        ],
                    ],
                    2 => [
                        'title' => 'Step 2',
                        'icon' => 'glyphicon glyphicon-ok',
                        'content' => '<div class="row">
            <div class="col-lg-12">' . $form->field($model, 'password')->passwordInput() . '</div>
            <div class="col-lg-12">' . $form->field($model, 'confirm_password')->passwordInput() . '</div>
            </div>',
                        'buttons' => [
                            'save' => [
                                'title' => 'Register',
                                'options' => [
                                    'class' => 'btn btn-primary',
                                    'name' => "signup-button",
                                    'type' => 'submit'
                                ],
                            ],
                            'prev' => [
                                'title' => 'Previous',
                                'options' => [
                                    'class' => 'disabled btn btn-primary',
                                    'name' => "signup-button",
                                    'type' => 'submit'
                                ],
                            ],
                        ],
                    ],
                    // 3 => [
                    // 	'title' => 'Step 3',
                    // 	'icon' => 'glyphicon glyphicon-transfer',
                    // 	'content' => '<h3>Step 3</h3>This is step 3',
                    // ],
                ],
                //	'complete_content' => "You are done!", // Optional final screen
                'start_step' => 1, // Optional, start with a specific step
            ];
            ?>

            <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

            <script>
                
                $(document).ready(function() {
                    $('#stepwizard_step1_next').click(function(e) {

                        e.preventDefault();

                        if ($('#signupform-email').closest('.form-group').hasClass('has-success')) {
                            $('#stepwizard_step1_next').trigger('click');
                        } else {
                            return false;
                           
                        }
                    });
                });
            </script>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>