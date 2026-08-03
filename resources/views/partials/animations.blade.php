
<script>
(function () {
  var _trig = [];

  function revealEl(el) {
    gsap.fromTo(el,
      { opacity: 0, y: 24 },
      { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out', clearProps: 'transform' }
    );
  }

  function revealCards(cards) {
    gsap.fromTo(cards,
      { opacity: 0, y: 24 },
      {
        opacity: 1, y: 0,
        duration: 0.6, stagger: 0.08, ease: 'power2.out',
        clearProps: 'transform',
        onComplete: function () {
          cards.forEach(function (c) {
            c.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease';
          });
        },
      }
    );
  }

  function teiAnimate() {
    _trig.forEach(function (t) { try { t.kill(); } catch (_) {} });
    _trig = [];

    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

    gsap.utils.toArray('.scroll-reveal').forEach(function (el) {
      if (el.closest('[id^="panel-"]')) return;
      var st = ScrollTrigger.create({
        trigger: el,
        start: 'top 88%',
        once: true,
        onEnter: function () { revealEl(el); },
      });
      _trig.push(st);
    });

    gsap.utils.toArray('.stagger-cards').forEach(function (container) {
      if (container.closest('[id^="panel-"]')) return;
      var cards = Array.from(container.querySelectorAll('.card'));
      if (!cards.length) return;
      var st = ScrollTrigger.create({
        trigger: container,
        start: 'top 88%',
        once: true,
        onEnter: function () { revealCards(cards); },
      });
      _trig.push(st);
    });
  }


  var _fallback = setTimeout(function () {
    document.documentElement.classList.remove('js-anim');
  }, 4000);

  function init() {
    teiAnimate();
    clearTimeout(_fallback);

    document.addEventListener('livewire:navigated', function () {
      requestAnimationFrame(function () {
        teiAnimate();
        clearTimeout(_fallback);
      });
    });
  }

  if (document.readyState === 'complete') {
    init();
  } else {
    window.addEventListener('load', init);
  }
})();
</script>
