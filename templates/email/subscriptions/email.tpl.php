<a href="<?=$vars['owner']->getURL()?>"><img src="<?=$vars['owner']->getIcon()?>" style="width: 100px; margin-left: 10px; margin-bottom: 10px" align="right"></a>Hi! We wanted to let you know that <strong><a href="<?=$vars['owner']->getURL()?>"><?=$vars['owner']->getTitle()?></a></strong> posted to <?=\Idno\Core\site()->config()->title?>.<br>
<br>
Here's what they said:<br>
<br>
<blockquote>
    <?php

        echo $vars['object']->draw();

    ?>
</blockquote>
<br clear="all"><br>
<?php

    if (!empty($vars['object'])) {

        ?>
        <div class="center">
            <a href="<?=$vars['object']->getURL()?>" style="background-color:#73B2E3;border:1px solid #73B2E3;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:normal;line-height:40px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">View post</a>
        </div>
    <?php

    }

?>