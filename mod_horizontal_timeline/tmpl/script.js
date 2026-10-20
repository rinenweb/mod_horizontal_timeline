/**
 * mod_horizontal_timeline
 * Handles selecting a timeline item and showing its description.
 * Uses event delegation so a single load works for any number of
 * module instances on the same page (no inline onclick handlers).
 * Items are focusable buttons: Enter or Space selects them too.
 */
(function () {
  'use strict';

  var ACTIVE_CLASS    = 'htl-active';
  var ACTIVE_SELECTOR = '.moa-roadmap-card-title, .moa-roadmap-card-year, .moa-roadmap-card-footer';

  function activate(container, wrapper, index) {
    // Reset, then mark the selected item's parts as active
    container.querySelectorAll(ACTIVE_SELECTOR).forEach(function (el) {
      el.classList.remove(ACTIVE_CLASS);
    });
    wrapper.querySelectorAll(ACTIVE_SELECTOR).forEach(function (el) {
      el.classList.add(ACTIVE_CLASS);
    });

    // Keep aria-expanded in step with the visible description
    container.querySelectorAll('.moa-roadmap-wrapper').forEach(function (el) {
      el.setAttribute('aria-expanded', el === wrapper ? 'true' : 'false');
    });

    // Show only the matching description block
    container.querySelectorAll('.moa-roadmap-details > [data-index]').forEach(function (el) {
      var match = el.getAttribute('data-index') === index;
      el.classList.toggle('moa-roadmap-details-content-visible', match);
      el.classList.toggle('moa-roadmap-details-content-hidden', !match);
    });
  }

  function handle(event) {
    var wrapper = event.target.closest('.moa-roadmap-wrapper');

    if (!wrapper) {
      return;
    }

    var container = wrapper.closest('.mod-horizontal-timeline');

    if (!container) {
      return;
    }

    activate(container, wrapper, wrapper.getAttribute('data-index'));
  }

  document.addEventListener('click', handle);

  document.addEventListener('keydown', function (event) {
    if (event.key !== 'Enter' && event.key !== ' ') {
      return;
    }

    // Only react when the item itself has focus, not a link inside it
    if (!event.target.matches || !event.target.matches('.moa-roadmap-wrapper')) {
      return;
    }

    event.preventDefault(); // stop Space from scrolling the page
    handle(event);
  });
})();
