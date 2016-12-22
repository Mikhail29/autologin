<?php

    $this->setPageTitle($tab['title'], $profile['nickname']);

    $this->addBreadcrumb(LANG_USERS, href_to('users'));
    $this->addBreadcrumb($profile['nickname'], href_to('users', $profile['id']));
    $this->addBreadcrumb($tab['title']);

?>

<?php echo $html; ?>
<script type="text/javascript">
$('#user_profile_tab_content>div.user>a.delete-user').click(function()
{
    var parentel = $(this).parent();
    var conteiner = $(parentel).parent();
    $.ajax({
            type: 'POST',
            url: '/autologin/delete_user',
            data: 'record_id=' + $(this).attr('href'),
            success: function(request){
                request = jQuery.parseJSON(request);
                if(request.result == 'success')
                {
                    $(parentel).remove();
                    if(!$('div').is('#user_profile_tab_content>div.user'))
                    {
                        $(conteiner).html('<b>Не найдено ни одного пользователя.</b>');
                    }
                }
            }
          });
          return false;
});
</script>