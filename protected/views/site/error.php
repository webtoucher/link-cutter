<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Ошибка';
?>

<h2>Error <?=$code?></h2>

<div class="error">
<?=CHtml::encode($message)?>
<br /><a href="/">вернуться на главную</a>
</div>