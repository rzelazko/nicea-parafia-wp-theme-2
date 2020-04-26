import Cookies from 'js-cookie';

export default {
  init() {
    $('#np-theme-holiday-warning').on('closed.bs.alert', function () {
      Cookies.set('np-theme-holiday-warning', 'hide');
    });

    if (Cookies.get('np-theme-holiday-warning') === 'hide') {
      $('#np-theme-holiday-warning').addClass('d-none');
    }

    $('#np-brand-footer').dblclick(function (event) {
      event.preventDefault();
      window.location.href = '/wp-admin';
    });
  },

  finalize() {
  },
};
