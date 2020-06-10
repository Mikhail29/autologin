<div id="fastlogin_widget">
    <a href = "/autologin/index/<?php echo $lvuser['id'] ?>"><?php echo LANG_WD_AUTOLOGIN_FASTLOGIN_LOGIN.$lvuser['nickname'] ?></a>      
    <br><br>
    <?php if($is_add): ?>
        <a class="delete_user" href="#deleteuser" onclick="delete_user(<?php echo $user_rec['id'] ?>); return false;"><?php echo LANG_WD_AUTOLOGIN_FASTLOGIN_DELETE_USER.$lvuser['nickname'] ?></a>
    <?php else: ?>
        <a class = "add-user" href = "#adduser" onclick= "add_user('<?php echo $lvuser['id'] ?>'); return false;"><?php echo LANG_WD_AUTOLOGIN_FASTLOGIN_ADD_USER.$lvuser['nickname'] ?></a>
    <?php endif; ?>
    <br><br>
    <a href = "/users/<?php echo cmsUser::get('id') ?>/user_list"><?php echo LANG_WD_AUTOLOGIN_FASTLOGIN_HREF_TO_LIST ?></a>
</div>
<script type="text/javascript">
    function add_user(id)
    {
        $.ajax({
            type: 'POST',
            url: '/autologin/add_user',
            data: 'user_id=' + id,
            success: function(request){
                request = jQuery.parseJSON(request);
                if(request.result == 'success')
                {
                    $('#fastlogin_widget>a.add-user').text('<?php echo LANG_WD_AUTOLOGIN_FASTLOGIN_DELETE_USER.$lvuser['nickname'] ?>');
                    $('#fastlogin_widget>a.add-user').attr('onclick', 'delete_user("' + request.id + '"); return false;');
                    $('#fastlogin_widget>a.add-user').attr('href', '#deleteuser');
                    $('#fastlogin_widget>a.add-user').attr('class', 'delete_user');
                }
            }
          });
    }
    function delete_user(id)
    {
        $.ajax({
            type: 'POST',
            url: '/autologin/delete_user',
            data: 'record_id=' + id,
            success: function(request){
                request = jQuery.parseJSON(request);
                if(request.result == 'success')
                {
                    $('#fastlogin_widget>a.delete_user').text('<?php echo LANG_WD_AUTOLOGIN_FASTLOGIN_ADD_USER.$lvuser['nickname'] ?>');
                    $('#fastlogin_widget>a.delete_user').attr('onclick', 'add_user(<?php echo $lvuser['id'] ?>); return false;');
                    $('#fastlogin_widget>a.delete_user').attr('href', '#adduser');
                    $('#fastlogin_widget>a.delete_user').attr('class', 'add-user');
                }
            }
          });
    }
</script>