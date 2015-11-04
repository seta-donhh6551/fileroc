<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= $this->render('//layouts/left-page',['listCate' => $subCategory]);?>
<div id="mid-page" style="min-height:300px">
	<form method="post">
		<table class="login" style="margin:30px 0px 0px 30px">
			<tr>
				<td>Username</td>
				<td><?= Html::activeTextInput($model, 'username', ['class' => 'input_form', 'id' => 'login_id', 'size' => 25]); ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?= Html::activePasswordInput($model, 'password', ['class' => 'input_form', 'id' => 'member_pw', 'size' => 25]); ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit" /></td>
			</tr>
		</table>
	</form>
</div>
<div id="right-page">
    <?= $this->render('//layouts/popular-download',[
        'subCategory' => $subCategory,
        'listPost' => $listAllPost
    ]);
    ?>
</div>