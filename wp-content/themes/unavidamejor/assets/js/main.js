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


});
