@if(Session::has('success'))

    $(window).bind('load' , function(){
        color = 'success';
        from = 'top';
        align = 'right';
    
        $.notify({
          icon: "now-ui-icons ui-1_bell-53",
          message: "{{ Session::get('success') }}"
    
        }, {
          type: color,
          timer: 8000,
          placement: {
            from: from,
            align: align
          }
        });
      });
@elseif(Session::has('warning'))
    $(window).bind('load' , function(){
        color = 'warning';
        from = 'top';
        align = 'right';

        $.notify({
        icon: "now-ui-icons ui-1_bell-53",
        message: "{{ Session::get('warning') }}"

        }, {
        type: color,
        timer: 8000,
        placement: {
            from: from,
            align: align
        }
        });
    });
@elseif(Session::has('error'))
    $(window).bind('load' , function(){
        color = 'danger';
        from = 'top';
        align = 'right';

        $.notify({
        icon: "now-ui-icons ui-1_bell-53",
        message: "{{ Session::get('danger') }}"

        }, {
        type: color,
        timer: 8000,
        placement: {
            from: from,
            align: align
        }
        });
    });
@elseif(Session::has('info'))
    $(window).bind('load' , function(){
        color = 'info';
        from = 'top';
        align = 'right';

        $.notify({
        icon: "now-ui-icons ui-1_bell-53",
        message: "{{ Session::get('info') }}"

        }, {
        type: color,
        timer: 8000,
        placement: {
            from: from,
            align: align
        }
        });
    });

@endif