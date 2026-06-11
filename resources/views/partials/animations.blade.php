{{--
  Global GSAP scroll animations.
  Included once in guest.blade.php.

  Strategy:
    • guest.blade.php injects `.js-anim` on <html> and CSS `opacity:0` for .scroll-reveal
      and .stagger-cards .card BEFORE first paint — no flash from visible→hidden.
    • Here we animate hidden→visible using ScrollTrigger.create() + onEnter callback.
      The fromTo only fires the moment the element enters the viewport.
    • clearProps: 'transform' (only) — clears GSAP's translateY inline style after animation.
      We intentionally keep the inline opacity:1 so it overrides the CSS opacity:0 rule.
    • Fallback: if GSAP/ScrollTrigger didn't load in 4 s, remove js-anim class so content
      becomes visible regardless.
    • Re-runs on every wire:navigate via livewire:navigated.
    • Tab panel elements ([id^="panel-"] *) are excluded — handled by how-to-read-bill @script.
--}}
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

  // Fallback: if GSAP didn't animate elements within 4 s, show them anyway
  var _fallback = setTimeout(function () {
    document.documentElement.classList.remove('js-anim');
  }, 4000);

  function init() {
    teiAnimate();
    clearTimeout(_fallback); // GSAP loaded fine — cancel the fallback
    // Re-schedule fallback after each navigation in case GSAP takes time
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
