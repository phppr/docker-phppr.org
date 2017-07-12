//=include bootstrap-sass/assets/javascripts/bootstrap.min.js
//=include fancybox/dist/js/jquery.fancybox.js

(function($) {
  $(document).ready(function() {
    var $jobs = $('#phpprJobs');
    $.ajax({
      url: "https://api.github.com/repos/phppr/vagas/issues",
      success: function(result) {
        var _item = '';
        $.each(result, function(i, issue) {
          _item += '<li class="jobs__item">';
          _item += '<a class="jobs__title" href="' + issue.html_url + '" target="_blank" title="' + issue.title + '" data-jobid="' + issue.id + '">';
          _item += '<strong>' + issue.title + '</strong>';
          _item += '</a>';
          _item += '<span class="jobs__meta">';
          _item += '<span class="jobs__author">Criado por: <a href="' + issue.user.html_url + '" target="_blank">' + issue.user.login + '</a></span>';
          _item += '<span class="jobs__labels">Labels: ';

          var _labels = issue.labels;
          $.each(_labels, function(index, label) {
            _item += '<span class="jobs__label"><span class="jobs__color" style="background-color:#' + label.color + '"></span><span>' + label.name + '</span></span>';
          });

          _item += '</span>';
          _item += '</span>';
          _item += '</li>';
        });
        $jobs.html(_item);
      }
    });
  });

  var _fancyOptions = {
    loop: false,
    thumbs: {
      autoStart: true
    }
  };

  $('.entry-content img').parent().fancybox(_fancyOptions);
  $('.entry-content .gallery-item a').fancybox(_fancyOptions);
})(jQuery);
