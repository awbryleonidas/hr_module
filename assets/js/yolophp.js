$(document).ready(function() {
    
    // $('.sidebar-menu li:first-child').addClass('active');
    // $('#message').hide();
    
    // disable caching of ajax content
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

    $('#sap_status').load($('#sap_status').attr('ajax-url'));
});

// scrollbar modal fix
window.jQuery(function() {
  // detect browser scroll bar width
  var scrollDiv = $('<div class="scrollbar-measure"></div>')
        .appendTo(document.body)[0],
      scrollBarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
      
      scrollBarWidth = scrollBarWidth - 2;
      // console.log(scrollBarWidth);
  $(document)
    .on('hidden.bs.modal', '.modal', function(evt) {
      // use margin-right 0 for IE8
      $(document.body).css('margin-right', '');
    })
    .on('show.bs.modal', '.modal', function() {
      // When modal is shown, scrollbar on body disappears.  In order not
      // to experience a "shifting" effect, replace the scrollbar width
      // with a right-margin on the body.
      if ($(window).height() < $(document).height()) {
        $(document.body).css('margin-right', -scrollBarWidth + 'px');
      }
    });
});