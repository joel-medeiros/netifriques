window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

$(document).ready(function() {
  $('button.advanced-search').on("click", function(){
      $('div.advanced-search-filters').toggleClass('hidden');
  })
});
