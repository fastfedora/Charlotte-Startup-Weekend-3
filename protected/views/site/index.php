<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<a href="index.php?r=client&portal_id=1">Check out client portal</a>

<p>
<form action="index.php?r=client&portal_id=1" method="post">

<p>Username: <input type="text" name="username" value="" />
<p>Redirect URL: <input type="text" name="redirurl" value="" length="160" style="width: 400px;" />
<p><input type="submit" name="Test" value="Test" />



</form>