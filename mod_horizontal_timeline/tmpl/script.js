/**
 * mod_horizontal_timeline
 * Handles selecting a timeline item and showing its description.
 * Uses event delegation so a single load works for any number of
 * module instances on the same page (no inline onclick handlers).
 */
(function () {
  'use strict';

  var ACTIVE_SELECTOR = '.moa-roadmap-card-title, .moa-roadmap-card-year, .moa-roadmap-card-footer';

  function activate(container, wrapper, index) {
    // Reset, then mark the clicked item's parts as active
    container.querySelectorAll(ACTIVE_SELECTOR).forEach(function (el) {
      el.classList.remove('active');
    });
    wrapper.querySelectorAll(ACTIVE_SELECTOR).forEach(function (el) {
      el.classList.add('active');
    });

    // Show only the matching description block
    container.querySelectorAll('.moa-roadmap-details > [data-index]').forEach(function (el) {
      var match = el.getAttribute('data-index') === index;
      el.classList.toggle('moa-roadmap-details-content-visible', match);
      el.classList.toggle('moa-roadmap-details-content-hidden', !match);
    });
  }

  document.addEventListener('click', function (event) {
    var wrapper = event.target.closest('.moa-roadmap-wrapper');

    if (!wrapper) {
      return;
    }

    var container = wrapper.closest('.mod-horizontal-timeline');

    if (!container) {
      return;
    }

    activate(container, wrapper, wrapper.getAttribute('data-index'));
  });
})();
