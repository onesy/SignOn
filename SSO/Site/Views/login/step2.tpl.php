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
        <?php if ($store['is_allow']) { ?>
            username : <?php echo 'welcome  !' . $store['username'] ; ?> <br/>
                <?php ; ?> 
        <?php }?>
    </body>
</html>
