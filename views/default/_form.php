<?php

use yeesoft\helpers\Html;
use yeesoft\helpers\LanguageHelper;
use yeesoft\widgets\ActiveForm;
use yeesoft\widgets\LanguagePills;
use yeesoft\Yee;

/* @var $this yii\web\View */
/* @var $model yeesoft\models\Menu */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'menu-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if (LanguageHelper::isMultilingual($model)): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?php if ($model->isNewRecord): ?>
                        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                </div>
            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">

                        <?php if (!$model->isNewRecord): ?>
                            <div class="form-group">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['id'] ?> :
                                </label>
                                <span><?= $model->id ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>

                                <?= Html::submitButton(Yee::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yee::t('yee', 'Cancel'), ['/menu/default/index'], ['class' => 'btn btn-default']) ?>

                            <?php else: ?>

                                <?= Html::submitButton(Yee::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yee::t('yee', 'Delete'), ['/menu/default/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
