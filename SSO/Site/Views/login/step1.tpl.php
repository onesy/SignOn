<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head >
        <title>
            cosji.com 单点登录系统
        </title>
        <?php include 'Base.tpl.php';?>
        <?php $store = View_Base::GetStore();?>
    </head>
    <body>
        <h1>
            Cosji.com Single Sign On System
        </h1>
        <form method="post" action="/login/step2">
            user name:<input type="text" name="username" /><br/>
            password :<input type="password" name="passwd" /><br/>
            <input type="submit" value="提交" />
        </form>
    </body>
</html>
