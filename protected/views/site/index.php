<?php
/**
 * @var SiteController $this
 * @var Link $model
 */
?>
<div class="form">
<?php
/** @var CActiveForm $form */
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'link-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
));
?>
<div class="row">
    <?=$form->labelEx($model, 'full_link')?>
    <?=$form->textField($model, 'full_link')?>
    <div class="errorMessage">
        <?=implode('. ', $model->getErrors('full_link'))?>
    </div>
</div>
<?=CHtml::ajaxSubmitButton('Укоротить', '', array(
        'dataType' => 'json',
        'type' => 'POST',
        'success' => 'js:function(data) {
            $("#result").empty();
            if (data.errors) {
                $("div.errorMessage").html(data.errors);
            } else if (data.shortLink) {
                $("div.errorMessage").empty();
                var url = "' . Yii::app()->request->hostInfo . '/" + data.shortLink;
                var link = $("<a>");
                link.attr("href", url).attr("target", "_blank").text(url);
                $("#result").html("Ваша короткая ссылка - ").append(link);
            }
        }',
    ),
    array(
        'type' => 'submit'
    ))?>
<br /><br />
<div id="result">
    <?php if ($model->short_link): ?>
        <?php $link = Yii::app()->request->hostInfo . '/' . $model->short_link; ?>
        Ваша короткая ссылка - <a target="_blank" href="<?=$link?>"><?=$link?></a>
    <?php endif; ?>
</div>
<?php $this->endWidget(); ?>
</div>
