document.addEventListener('DOMContentLoaded', function () {
  const pages = document.querySelectorAll('.page');
  let currentPageIndex = 0; // índice actual
  let pageStates = Array(pages.length).fill(false);

  updateZIndex();

  function updateZIndex() {
    pages.forEach((page, i) => {
      page.style.zIndex = pageStates[i] ? i : (pages.length - i);
    });
  }

  function goNext() {
    if (currentPageIndex < pages.length - 1) {
      currentPageIndex++;
      pageStates[currentPageIndex] = true;
      pages[currentPageIndex].classList.add('flipped');
      updateZIndex();
    }
  }

  function goPrev() {
    if (currentPageIndex > 0) {
      pageStates[currentPageIndex] = false;
      pages[currentPageIndex].classList.remove('flipped');
      currentPageIndex--;
      updateZIndex();
    }
  }

  pages.forEach(page => {
    page.addEventListener('click', (e) => {
      const rect = page.getBoundingClientRect();
      const clickX = e.clientX - rect.left;
      if (clickX > rect.width / 2) {
        goNext();
      } else {
        goPrev();
      }
    });
  });
});
