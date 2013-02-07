if (window.rcmail) {
  rcmail.addEventListener('init', function(evt) {
    var tab = $('<span>').attr('id', 'settingstabpluginforward').addClass('tablink filter');
    var button = $('<a>').attr('href', rcmail.env.comm_path+'&_action=plugin.forward').html(rcmail.gettext('forward')).appendTo(tab);
    rcmail.add_element(tab, 'tabs');
    rcmail.register_command('plugin.forward-save', function() { 
      var input_new_forward = rcube_find_object('_new_forward');
      if (input_new_forward && input_new_forward.value=='') {
          alert(rcmail.gettext('noaddressfilled', 'forward'));
          input_new_forward.focus();
      } else {
          rcmail.gui_objects.forwardform.submit();
      }
    }, true);
  })
}
