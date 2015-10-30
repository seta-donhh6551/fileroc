<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="apple-mobile-web-app-capable" content="no" />

        <title>Login System</title>

        <!-- stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/login.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/login-dark.css" />
        <!-- jQuery -->
        <script src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>

    </head>

    <body>
        <!--[if !IE]>start wrapper<![endif]-->
        <div id="wrapper">
            <div id="wrapper2">
                <div id="wrapper3">
                    <div id="wrapper4">
                        <span id="login_wrapper_bg"></span>

                        <div id="stripes">	
                            <!--[if !IE]>start login wrapper<![endif]-->
                            <div id="login_wrapper">
                                <div class="error">
                                    <div class="error_inner">
                                        <strong>Access Denied</strong> | <span>user/password combination wrong</span>
                                    </div>
                                </div>	
                                <!--[if !IE]>start login<![endif]-->
                                <?php $err = $model->getErrors(); ?>
                                <?php if ($err): ?>
                                    <div class="errorBox">
                                        <ul>
                                            <?php foreach ($err as $key => $value): ?>
                                            <li style="color:red"><?php echo $value[0] ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div><!-- /.erroBox -->
                                <?php endif; ?>
                                <?php $form = ActiveForm::begin(['id' => 'login-form', 'method' => 'post']); ?>
                                <fieldset>		
                                    <h1>Please log in</h1>
                                    <div class="formular">
                                        <span class="formular_top"></span>

                                        <div class="formular_inner">

                                            <label>
                                                <strong>Username:</strong>
                                                <span class="input_wrapper">
                                                    <?= Html::activeTextInput($model, 'username', ['class' => 'input_form', 'id' => 'login_id', 'size' => 20]); ?>
                                                </span>
                                            </label>
                                            <label>
                                                <strong>Password:</strong>
                                                <span class="input_wrapper">
                                                    <?= Html::activePasswordInput($model, 'password', ['class' => 'input_form', 'id' => 'member_pw', 'size' => 20]); ?>
                                                </span>
                                            </label>
                                            <label class="inline">
                                                <input class="checkbox" name="" type="checkbox" value="" />
                                                remember me on this computer
                                            </label>	
                                            <ul class="form_menu">
                                                <li><span class="button"><span><span><em>Đồng ý</em></span></span><input type="submit" name="ok"/></span></li>
                                                <li><span class="button"><span><span><a href="#">Quay lại</a></span></span></span></li>
                                            </ul>

                                        </div>

                                        <span class="formular_bottom"></span>

                                    </div>
                                </fieldset>
                                    
                                <?php ActiveForm::end(); ?>

                                <span class="reflect"></span>
                                <span class="lock"></span>
                            </div>

                            <!--[if !IE]>end login wrapper<![endif]-->
                        </div>
                    </div>
                </div>
            </div>	
        </div>
        <!--[if !IE]>end wrapper<![endif]-->

        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/login.js"></script>
    </body>
</html>