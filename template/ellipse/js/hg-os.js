(function () {
  'use strict';

  function onReady(fn) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn);
    } else {
      fn();
    }
  }

  function initCanvas(canvas) {
    var nodes = Array.prototype.slice.call(
      canvas.querySelectorAll('.os-node[data-step]')
    );
    if (!nodes.length) return;

    // The ecosystem is a readable overview, independent of scroll position.
    canvas.setAttribute('data-os-step', String(nodes.length));
    nodes.forEach(function (node) {
      node.classList.add('is-on');
    });
  }

  function initSegments(root) {
    var tabs = Array.prototype.slice.call(root.querySelectorAll('[data-os-tab]'));
    var panels = Array.prototype.slice.call(root.querySelectorAll('[data-os-panel]'));
    if (!tabs.length || !panels.length) return;

    function activate(id, focusTab) {
      tabs.forEach(function (tab) {
        var on = tab.getAttribute('data-os-tab') === id;
        tab.setAttribute('aria-selected', on ? 'true' : 'false');
        tab.setAttribute('tabindex', on ? '0' : '-1');
        tab.classList.toggle('is-on', on);
        if (on && focusTab) tab.focus();
      });
      panels.forEach(function (panel) {
        var on = panel.getAttribute('data-os-panel') === id;
        panel.classList.toggle('is-on', on);
        panel.setAttribute('aria-hidden', on ? 'false' : 'true');
      });
    }

    tabs.forEach(function (tab, index) {
      tab.addEventListener('click', function () {
        var id = tab.getAttribute('data-os-tab');
        if (id) activate(id, false);
      });
      tab.addEventListener('keydown', function (event) {
        var nextIndex = null;
        if (event.key === 'ArrowRight' || event.key === 'ArrowDown') nextIndex = (index + 1) % tabs.length;
        if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') nextIndex = (index - 1 + tabs.length) % tabs.length;
        if (event.key === 'Home') nextIndex = 0;
        if (event.key === 'End') nextIndex = tabs.length - 1;
        if (nextIndex === null) return;
        event.preventDefault();
        var nextId = tabs[nextIndex].getAttribute('data-os-tab');
        if (nextId) activate(nextId, true);
      });
    });

    var current = tabs.filter(function (t) {
      return t.getAttribute('aria-selected') === 'true';
    })[0];
    if (!current) {
      current = tabs[0];
    }
    activate(current.getAttribute('data-os-tab'));
  }

  onReady(function () {
    Array.prototype.forEach.call(
      document.querySelectorAll('section.os-canvas'),
      initCanvas
    );
    Array.prototype.forEach.call(
      document.querySelectorAll('.os-segments'),
      initSegments
    );
  });
})();
