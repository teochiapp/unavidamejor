# Sistema de Eventos del Footer - Unavida Mejor

## Descripción
El sistema permite que el enlace "EVENTOS" en el footer del sitio abra un modal interactivo que muestra información sobre los eventos disponibles, similar al comportamiento de los eventos en la página principal.

## Componentes

### 1. Footer (footer.php)
- **Ubicación**: `wp-content/themes/unavidamejor/footer.php`
- **Enlace del menú**: El enlace "EVENTOS" del menú tiene la clase `footer-events-link` y el atributo `data-modal="events"`
- **Columna de eventos**: Los enlaces individuales de eventos tienen la clase `footer-event-item` y abren el modal con detalles específicos
- **Estilos**: Incluye estilos CSS para mejorar la apariencia de todos los enlaces

### 2. Modal de Eventos (event-modal.php)
- **Ubicación**: `wp-content/themes/unavidamejor/template-parts/home/event-modal.php`
- **Inclusión**: Se incluye automáticamente en el footer para estar disponible en todas las páginas
- **Funcionalidad**: Modal responsive con imagen, título, fecha, ubicación y descripción del evento

### 3. JavaScript (event-modal.js)
- **Ubicación**: `wp-content/themes/unavidamejor/assets/js/event-modal.js`
- **Funcionalidades**:
  - Apertura del modal desde el footer
  - Precarga de datos de eventos para mejor UX
  - Cache de datos para evitar llamadas AJAX repetidas
  - Manejo de eventos clickeables
  - Cierre del modal con botón, backdrop o tecla Escape

### 4. Funciones PHP (functions.php)
- **Función AJAX**: `get_evento_data_ajax()` para obtener datos de eventos
- **Campos ACF**: Descripción, imagen, fecha, icono, ubicación

## Cómo Funciona

### 1. Carga de la Página
- Se cargan los scripts JavaScript necesarios
- Se inicializa el modal de eventos
- Se buscan los enlaces del footer:
  - Enlace del menú con clase `footer-events-link`
  - Enlaces individuales de eventos con clase `footer-event-item`

### 2. Click en el Footer
- **Menú de navegación**: Usuario hace clic en "EVENTOS" del menú del footer
- **Columna de eventos**: Usuario hace clic en cualquier evento individual de la lista
- Se previene el comportamiento por defecto
- Se abre el modal con información específica del evento seleccionado

### 3. Modal del Footer
- **Desde menú**: Muestra título "🎉 Nuestros Eventos" con vista general
- **Desde evento individual**: Muestra detalles completos del evento específico
- **Vista general**: Lista los eventos disponibles en tarjetas clickeables
- **Cada tarjeta**: Muestra título, fecha y ubicación
- **Interacción**: Al hacer clic en una tarjeta, se abre el modal con detalles completos

### 4. Interacción
- Las tarjetas de eventos son clickeables
- Se puede cerrar el modal con el botón X, backdrop o Escape
- Botón de WhatsApp para consultas generales

### 5. Columna de Eventos del Footer
- **Ubicación**: Columna derecha del footer
- **Funcionalidad**: Cada evento individual abre el modal con sus detalles
- **Estilos**: Icono de calendario (📅) y efectos hover
- **Comportamiento**: Al hacer clic, se abre el modal con información completa del evento
- **Ventaja**: Acceso directo a detalles sin navegar a la página del evento

## Personalización

### Cambiar Mensaje de WhatsApp
Editar en `event-modal.js` la función `showGeneralEventsMessage()`:
```javascript
const whatsappText = 'Tu mensaje personalizado aquí';
```

### Modificar Estilos
Los estilos CSS se agregan dinámicamente en la función `showGeneralEventsMessage()`.

### Agregar Más Campos
Para mostrar más información en las tarjetas, editar la función `showGeneralEventsMessage()` y agregar los campos ACF correspondientes.

## Troubleshooting

### El Modal No Se Abre
1. Verificar que la clase `footer-events-link` esté presente en el enlace
2. Revisar la consola del navegador para errores JavaScript
3. Confirmar que el archivo `event-modal.js` se esté cargando

### Los Eventos No Se Muestran
1. Verificar que existan posts del tipo "evento"
2. Confirmar que los campos ACF estén configurados
3. Revisar la función AJAX en `functions.php`

### Problemas de Estilos
1. Verificar que Bootstrap y Font Awesome estén cargados
2. Revisar que las variables CSS estén definidas
3. Confirmar que no haya conflictos con otros estilos

## Archivos Relacionados
- `footer.php` - Enlace del footer
- `event-modal.php` - Estructura del modal
- `event-modal.js` - Funcionalidad JavaScript
- `functions.php` - Función AJAX
- `enqueue.php` - Carga de scripts y estilos
