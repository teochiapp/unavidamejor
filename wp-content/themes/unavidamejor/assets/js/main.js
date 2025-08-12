// JS base del tema Unavida Mejor
document.addEventListener('DOMContentLoaded', () => {

  // Inicializa AOS si está disponible
  if (window.AOS && typeof window.AOS.init === 'function') {
    window.AOS.init({
      once: true,
      offset: 60,
      duration: 700,
      easing: 'ease-out-cubic'
    });
  }

  // Función para ajustar video hero a contenedor sin bordes negros
  const coverIframeToContainer = () => {
    const container = document.querySelector('.hero-container');
    const frame = document.querySelector('.hero-container .hero-video iframe');
    if (!container || !frame) return;

    const { width: cw, height: ch } = container.getBoundingClientRect();
    const videoAspect = 16 / 9;

    let w = cw;
    let h = w / videoAspect;
    if (h < ch) {
      h = ch;
      w = h * videoAspect;
    }

    frame.style.width = `${w}px`;
    frame.style.height = `${h}px`;
    frame.style.position = 'absolute';
    frame.style.top = '50%';
    frame.style.right = '50%';
    frame.style.transform = 'translate(-50%, -50%)';
  };

  coverIframeToContainer();
  window.addEventListener('resize', coverIframeToContainer);

  // 📱 JS para toggle del menú mobile
  const toggle = document.querySelector(".menu-toggle");
  const menu = document.querySelector(".mobile-menu");
  const closeBtn = document.querySelector(".close-menu");

if (toggle && menu && closeBtn) {
  toggle.addEventListener("click", () => {
    menu.classList.add("open");
  });

  closeBtn.addEventListener("click", () => {
    menu.classList.remove("open");
  });
}

  // Smooth scroll para enlaces internos con data-scroll
  const scrollLinks = document.querySelectorAll('a[data-scroll]');
  const isFront = document.body.classList.contains('home') || document.body.classList.contains('front-page');
  const goTo = (hash) => {
    const el = document.querySelector(hash);
    if (!el) return;
    const y = el.getBoundingClientRect().top + window.pageYOffset - 80; // offset header
    window.scrollTo({ top: y, behavior: 'smooth' });
  };
  scrollLinks.forEach((a) => {
    a.addEventListener('click', (e) => {
      const href = a.getAttribute('href') || '';
      if (!href.startsWith('#')) return;
      e.preventDefault();
      if (isFront) {
        goTo(href);
      } else {
        // si no estamos en home, redirigir a home + hash
        const home = document.querySelector('link[rel="home"]')?.getAttribute('href') || '/';
        window.location.href = home.replace(/\/$/, '') + '/' + href.replace(/^#/, '');
      }
    });
  });
});
