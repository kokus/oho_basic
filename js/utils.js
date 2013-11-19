Drupal.cookies = {
  get: function(id) {
    var cookie = document.cookie.split(';');
    var return_val = {};
    $(cookie).each(function(index, value) {
      var cookie_id = value.substring(0, value.search('='));
      cookie_id = $.trim(cookie_id);
      if (cookie_id == id) {
        var cookie_value = value.substring(value.search('=') + 1);
        return_val = {id: cookie_id, value: cookie_value};
        return false;
      }
    });
    return return_val;
  },
  set: function(id, value) {
    // the cookie doesn't exist yet, create it and populate it
    document.cookie = id + '=' + value;
  }
};

$.extend({
  keys: function(obj) {
    var a = [];
    $.each(obj, function(k) {
      a.push(k);
    });
    return a;
  }
});