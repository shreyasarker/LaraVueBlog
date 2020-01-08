import Vue from 'vue';
import moment from 'moment';

Vue.filter('time_format', (arg) => {
    return moment(arg).format('Do MMM, YYYY');
});

Vue.filter('shorttext',(arg, length) => {
    return arg.substring(0, length) + '...'
});
