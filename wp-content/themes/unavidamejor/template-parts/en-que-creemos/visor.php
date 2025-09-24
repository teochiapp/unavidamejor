<div class="visor">
  <?php 
  // Array de páginas del libro
  $pages = [
    [
      "title" => "La Palabra de Dios",
      "text" => 'Creemos que la Biblia es la Palabra de Dios. Toda la Escritura, tanto el Antiguo como el Nuevo Testamento, son la Palabra inspirada de Dios <span class="biblical-citation">(2 Timoteo 3:16-17)</span>. Contienen la revelación completa de Dios para la Salvación del Ser humano. Reconocemos a la Biblia como autoridad final para el ejercicio de la fe y la conducta cristiana.'
    ],
    [
      "title" => "El Dios Trino",
      "text" => 'Creemos en un solo Dios <span class="biblical-citation">(Deuteronomio 6:4)</span>, creador de todas las cosas. Quien es Uno y Trino <span class="biblical-citation">(Tito 3:4-6)</span>. El cual existe eternamente en tres personas: Dios Padre, Dios Hijo Jesucristo y Dios Espíritu Santo. Creemos que Jesucristo es el Hijo de Dios, Mesías prometido al mundo que fue concebido por el poder del Espíritu Santo en el vientre virgen de María <span class="biblical-citation">(Gálatas 4:4; Mateo 1:18-25)</span>. Creemos que murió en una cruz, en sacrificio perfecto por nuestros pecados de acuerdo con las Escrituras <span class="biblical-citation">(1 Pedro 3:18; Filipenses 2:5-11)</span>. Que resucitó de entre los muertos y ascendió al cielo donde fue entronizado a la diestra del Padre en majestad, ejerciendo dominio y autoridad sobre toda la existencia <span class="biblical-citation">(Efesios 1:17-22)</span>.'
    ],
    [
      "title" => "El Espíritu Santo",
      "text" => 'Creemos que el Espíritu Santo es Dios. Su ministerio es el glorificar al Señor Jesucristo y hacer consciente de pecado y regenerar al pecador, llevándole a creer en Cristo. Bautizando al creyente dentro del cuerpo único que es la Iglesia <span class="biblical-citation">(Efesios 4:4-5)</span>, de quien Cristo es la cabeza <span class="biblical-citation">(Efesios 1:22-23)</span>. El Espíritu Santo mora, guía, instruye, llena y da poder al creyente para que lleve una vida consagrada y piadosa <span class="biblical-citation">(Juan 14:16)</span>.'
    ],
    [
      "title" => "La Dignidad Humana",
      "text" => 'Creemos que el ser humano, varón y mujer, fueron creados por Dios a su propia imagen, ambos sexos poseen la misma dignidad intrínseca que los constituye como imago Dei <span class="biblical-citation">(Génesis 1:27)</span>. Creemos en la dignidad de la vida de todos los seres humanos desde la concepción <span class="biblical-citation">(Salmos 139:13-16)</span> y hasta su muerte natural <span class="biblical-citation">(Éxodo 21:22-24)</span>.'
    ],
    [
      "title" => "La Caída y la Redención",
      "text" => 'Creemos que el ser humano cayó en pecado, transmitiéndolo a su descendencia <span class="biblical-citation">(Génesis 3)</span>. Toda la raza humana, por ello, está perdida <span class="biblical-citation">(Romanos 3:23)</span>, y sólo mediante el arrepentimiento, la fe en Jesucristo, y la regeneración del Espíritu Santo, puede obtenerse la salvación y vida eterna <span class="biblical-citation">(Romanos 3:23-26; 2 Timoteo 1:9-10)</span>.'
    ],
    [
      "title" => "La Salvación por Gracia",
      "text" => 'Creemos que la muerte expiatoria de Jesucristo y su resurrección, sientan las únicas bases para la justificación y la salvación de todos los que creen, y que sólo aquellos que reciben a Jesucristo por fe, son nacidos del Espíritu Santo y sellados por Él hasta el día de la redención <span class="biblical-citation">(Juan 1:12-13; Efesios 4:30; 1 Pedro 1:20-23)</span>.'
    ],
    [
      "title" => "El Regreso de Cristo",
      "text" => 'Creemos que Jesucristo regresará <span class="biblical-citation">(Hechos 1:10-11; Apocalipsis 22:20)</span>, y que la esperanza en Su retorno tiene una influencia vital en la vida personal y el servicio del creyente <span class="biblical-citation">(Hebreos 10:24-25)</span>.'
    ],
    [
      "title" => "Resurrección y Juicio",
      "text" => 'Creemos en la resurrección física de todos los muertos <span class="biblical-citation">(Hebreos 9:27)</span>, del creyente en Jesucristo a la bendición eterna y gozo con el Señor <span class="biblical-citation">(1 Corintios 15:12-20)</span>, y del no creyente al juicio y castigo consciente eterno <span class="biblical-citation">(Mateo 25:46)</span>.'
    ],
    [
      "title" => "La Iglesia",
      "text" => 'Creemos que la Iglesia es el Cuerpo de Cristo <span class="biblical-citation">(Colosenses 1:18-19)</span>. Constituida por todas las personas que, mediante la fe en Jesucristo, han sido regeneradas por el Espíritu Santo y se unen en el Cuerpo de Cristo, del que Él es la cabeza <span class="biblical-citation">(Efesios 1:22; 4:4)</span>. La Iglesia se hace visible en expresiones comunitarias locales, constituyéndose cada una de ellas en agencias del Reino de Dios en la tierra, que trabajan cooperativamente en el desarrollo de su misión en el mundo <span class="biblical-citation">(Efesios 3:7-12; 1 Corintios 12:12-20)</span>.'
    ],
    [
      "title" => "Ordenanzas de la Iglesia",
      "text" => 'Creemos que el bautismo en agua y la Cena del Señor, son ordenanzas a ser observadas por la Iglesia permanentemente, como un símbolo de gratitud y adoración, no como un medio de salvación <span class="biblical-citation">(Mateo 28:18-20; Mateo 26:17-30; Hechos 2:41-42)</span>.'
    ],
    [
      "title" => "El Mundo Espiritual",
      "text" => 'Creemos en la existencia de Satanás, los demonios y los ángeles como seres creados por Dios, pertenecientes al mundo espiritual que ejercen su influencia en el terrenal <span class="biblical-citation">(Efesios 6:10-12)</span>. Todos ellos seres creados por Dios y sujetos a su soberanía <span class="biblical-citation">(Job 2:1-17)</span>. Creemos que el rol de los ángeles es servir a los herederos de la salvación <span class="biblical-citation">(Hebreos 1:14)</span>.'
    ],
    [
      "title" => "Victoria sobre Satanás",
      "text" => 'Creemos que el rol del diablo en esta era es oponerse a los ungidos (todos los creyentes en Cristo) <span class="biblical-citation">(2 Corintios 2:11; 1 Juan 3:7-10)</span>. Creemos que la iglesia tiene garantizada la victoria final sobre el diablo y sus ángeles en el presente a través de la oración, el testimonio y la Palabra <span class="biblical-citation">(Apocalipsis 12:10)</span>.'
    ],
    [
      "title" => "Dones Espirituales",
      "text" => 'Creemos en la vigencia de todos los dones espirituales <span class="biblical-citation">(Romanos 12:6-9; 1 Corintios 12:4-11)</span> y de todas las funciones delegadas por Cristo a la iglesia <span class="biblical-citation">(Efesios 4:11)</span> como herramientas eficaces para llevar adelante la misión de la iglesia en el mundo.'
    ],
    [
      "title" => "El Diseño Divino de la Familia",
      "text" => 'Creemos en la familia de acuerdo con el diseño de Dios. Constituida por un hombre y una mujer unidos en matrimonio heterosexual, monógamo <span class="biblical-citation">(Génesis 2:24)</span>. Creemos que la familia es el código de ética social por excelencia y núcleo fundamental sobre el cual se debe articular la sociedad.'
    ]
  ];

  // Generar visor
  foreach($pages as $index => $page): ?>
    <div class="visor-page" data-index="<?php echo $index+1; ?>">
      <!-- Título -->
      <h2 class="visor-title"><?php echo $page['title']; ?></h2>
      <!-- Contenido -->
      <div class="visor-content">
        <p class="belief-text"><?php echo $page['text']; ?></p>
      </div>
      <!-- Número de página -->
      <!-- Navegación -->
      <div class="visor-navigation">
        <button class="nav-prev">← Anterior</button>
        <button class="nav-next">Siguiente →</button>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const pages = document.querySelectorAll(".visor-page");
  const totalPages = pages.length;
  let currentPage = 0;

  // Función para mostrar la página actual y ocultar las demás
  function showPage(index) {
    pages.forEach((page, i) => {
      if (i === index) {
        page.classList.add('active');
        page.style.display = 'block';
      } else {
        page.classList.remove('active');
        page.style.display = 'none';
      }
    });

    // Actualizar botones de navegación en todas las páginas
    pages.forEach((page, i) => {
      const prevButton = page.querySelector(".nav-prev");
      const nextButton = page.querySelector(".nav-next");

      if (prevButton) {
        prevButton.disabled = index === 0;
        prevButton.style.opacity = index === 0 ? '0.5' : '1';
      }
      if (nextButton) {
        nextButton.disabled = index === totalPages - 1;
        nextButton.style.opacity = index === totalPages - 1 ? '0.5' : '1';
      }
    });
  }

  // Función para navegar a página anterior
  function goToPrevious() {
    if (currentPage > 0) {
      currentPage--;
      showPage(currentPage);
    }
  }

  // Función para navegar a página siguiente
  function goToNext() {
    if (currentPage < totalPages - 1) {
      currentPage++;
      showPage(currentPage);
    }
  }

  // Inicializar visor mostrando la primera página
  showPage(currentPage);

  // Event listeners para navegación - usar delegación de eventos
  document.addEventListener("click", (e) => {
    if (e.target.classList.contains("nav-prev")) {
      e.preventDefault();
      e.stopPropagation();
      goToPrevious();
    } else if (e.target.classList.contains("nav-next")) {
      e.preventDefault();
      e.stopPropagation();
      goToNext();
    }
  });

  // Prevenir eventos de touch en botones deshabilitados
  document.addEventListener("touchstart", (e) => {
    if (e.target.disabled) {
      e.preventDefault();
      e.stopPropagation();
    }
  }, { passive: false });

  // Agregar indicadores visuales para mejor UX
  const visor = document.querySelector('.visor');
  if (visor) {
    // Crear indicador de página actual
    const pageIndicator = document.createElement('div');
    pageIndicator.className = 'visor-page-indicator';
    pageIndicator.style.cssText = `
      text-align: center;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: var(--primary-color);
      font-weight: 500;
    `;
    visor.appendChild(pageIndicator);

    // Función para actualizar indicador
    function updatePageIndicator() {
      pageIndicator.textContent = `Página ${currentPage + 1} de ${totalPages}`;
    }

    // Actualizar indicador cuando cambie la página
    const originalShowPage = showPage;
    showPage = function(index) {
      originalShowPage(index);
      updatePageIndicator();
    };

    updatePageIndicator();
  }
});
</script>

