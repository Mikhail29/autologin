<div id="fastlogin_widget">
    <a href = "/autologin/index/<?php echo $lvuser['id'] ?>"><?php echo LANG_WD_AUTOLOGIN_FAST_LOGIN.$lvuser['nickname'] ?></a>      
</div>
<script type="text/javascript">
var href = $('div#user_profile_header>h1#user_profile_title div.name>a').attr('href');
var user_name = $('div#user_profile_header>h1#user_profile_title div.name>a').text();
if(href != '' && user_name != '')
{
   href = href.replace('user', 'autologin/index');
   $('div#fastlogin_widget>a').attr('href', href);
   $('div#fastlogin_widget>a').text('<?php echo LANG_WD_AUTOLOGIN_FAST_LOGIN; ?>' + user_name);
}
</script>