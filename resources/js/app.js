import './bootstrap';
import Choices from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

document.addEventListener('DOMContentLoaded', function () {
    const fromSelect = document.getElementById('fromPlace');
    const toSelect = document.getElementById('toPlace');
    if (fromSelect) new Choices(fromSelect, { searchEnabled: false, shouldSort: false });
    if (toSelect) new Choices(toSelect, { searchEnabled: false, shouldSort: false });
});
