/**
 * Event Modal Functionality
 * Maneja la apertura y cierre del modal de eventos usando ACF
 * Con sistema de precarga de datos para mejor UX
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Event Modal JS cargado correctamente');
    
    // Elementos del modal
    const modal = document.getElementById('eventoModal');
    const backdropBlur = document.getElementById('modalBackdropBlur');
    
    // Botones del modal
    const closeModalBtn = document.getElementById('closeModal');
    const masInfoBtn = document.getElementById('masInfoBtn');
    
    // Elementos del contenido del modal
    const modalImagen = document.getElementById('modalEventoImagen');
    const modalTitulo = document.getElementById('modalEventoTitulo');
    const modalFecha = document.getElementById('modalEventoFecha');
    const modalUbicacion = document.getElementById('modalEventoUbicacion');
    const modalDescripcion = document.getElementById('modalEventoDescripcion');
    
    // Elementos clickeables de eventos
    const eventoClickables = document.querySelectorAll('.evento-clickable');
    
    // Footer events link
    const footerEventsLink = document.querySelector('.footer-events-link');
    
    // Footer event items (enlaces individuales de eventos)
    const footerEventItems = document.querySelectorAll('.footer-event-item');
    
    // Cache para almacenar datos precargados
    const eventDataCache = new Map();
    
    console.log('Elementos encontrados:', {
        modal: !!modal,
        backdropBlur: !!backdropBlur,
        closeModalBtn: !!closeModalBtn,
        modalImagen: !!modalImagen,
        modalTitulo: !!modalTitulo,
        modalFecha: !!modalFecha,
        modalUbicacion: !!modalUbicacion,
        modalDescripcion: !!modalDescripcion,
        eventoClickables: eventoClickables.length,
        footerEventsLink: !!footerEventsLink,
        footerEventItems: footerEventItems.length
    });
    
    // Verificar que todos los elementos necesarios existan
    if (!modal || !backdropBlur || !closeModalBtn || !modalImagen || !modalTitulo || !modalFecha || !modalUbicacion || !modalDescripcion) {
        console.error('Modal elements not found');
        return;
    }
    
    // Función para precargar todos los datos de eventos
    function preloadAllEventData() {
        console.log('Iniciando precarga de datos de eventos...');
        
        const eventIds = Array.from(eventoClickables).map(el => el.dataset.eventId);
        const uniqueEventIds = [...new Set(eventIds)]; // Eliminar duplicados
        
        console.log('IDs de eventos únicos a precargar:', uniqueEventIds);
        
        // Precargar datos de cada evento único
        uniqueEventIds.forEach(eventId => {
            if (eventId && !eventDataCache.has(eventId)) {
                preloadEventData(eventId);
            }
        });
    }
    
    // Función para precargar datos de un evento específico
    function preloadEventData(eventId) {
        const formData = new FormData();
        formData.append('action', 'get_evento_data');
        formData.append('evento_id', eventId);
        formData.append('nonce', unavidamejor_ajax.nonce);
        
        fetch(unavidamejor_ajax.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                eventDataCache.set(eventId, data.data);
                console.log(`Datos precargados para evento ${eventId}:`, data.data.title);
            } else {
                console.error(`Error al precargar evento ${eventId}:`, data.data);
            }
        })
        .catch(error => {
            console.error(`Error al precargar evento ${eventId}:`, error);
        });
    }
    
    // Función para abrir el modal
    function openEventModal(eventId) {
        console.log('Abriendo modal para evento:', eventId);
        
        // Prevenir scroll del body
        document.body.classList.add('modal-open');
        document.body.style.overflow = 'hidden';
        
        // Mostrar overlay con blur
        backdropBlur.classList.add('show');
        
        // Mostrar el modal
        modal.classList.add('show');
        
        // Poblar el modal con datos (precargados o en tiempo real)
        populateModalWithData(eventId);
    }
    
    // Hacer la función disponible globalmente para uso desde HTML
    window.openEventModal = openEventModal;
    
    // Función para abrir el modal desde el footer (sin evento específico)
    function openFooterEventsModal() {
        console.log('Abriendo modal de eventos desde footer');
        
        // Prevenir scroll del body
        document.body.classList.add('modal-open');
        document.body.style.overflow = 'hidden';
        
        // Mostrar overlay con blur
        backdropBlur.classList.add('show');
        
        // Mostrar el modal
        modal.classList.add('show');
        
        // Mostrar mensaje general de eventos
        showGeneralEventsMessage();
    }
    
    // Función para mostrar mensaje general de eventos
    function showGeneralEventsMessage() {
        modalTitulo.textContent = '🎉 Nuestros Eventos';
        modalFecha.textContent = 'Próximamente';
        modalUbicacion.textContent = 'Diferentes ubicaciones';
        
        // Mostrar lista de eventos disponibles si hay datos en cache
        let eventsList = '';
        if (eventDataCache.size > 0) {
            eventsList = '<div class="events-list mt-4"><h6 class="text-primary mb-3">📅 Eventos disponibles:</h6><div class="row g-3">';
            eventDataCache.forEach((eventData, eventId) => {
                const eventCard = `
                    <div class="col-12 col-md-6">
                        <div class="card border-0 shadow-sm h-100" style="cursor: pointer;" onclick="openEventModal('${eventId}')">
                            <div class="card-body p-3">
                                <h6 class="card-title text-primary mb-2">${eventData.title}</h6>
                                ${eventData.fecha ? `<p class="card-text small mb-1"><i class="fas fa-calendar-alt text-muted me-2"></i>${eventData.fecha}</p>` : ''}
                                ${eventData.ubicacion ? `<p class="card-text small mb-0"><i class="fas fa-map-marker-alt text-muted me-2"></i>${eventData.ubicacion}</p>` : ''}
                            </div>
                        </div>
                    </div>
                `;
                eventsList += eventCard;
            });
            eventsList += '</div></div>';
        }
        
        modalDescripcion.innerHTML = `
            <div class="text-center mb-4">
                <p class="lead">Descubre todos nuestros eventos y actividades especiales.</p>
                <p class="text-muted">Haz clic en cualquier evento para ver más detalles o consulta directamente por WhatsApp.</p>
            </div>
            ${eventsList}
        `;
        
        // Ocultar la imagen del modal
        modalImagen.style.display = 'none';
        
        // Actualizar el enlace de WhatsApp con mensaje general
        if (masInfoBtn) {
            const whatsappText = 'Hola! Me interesa conocer más sobre los eventos y actividades. ¿Podrías enviarme información?';
            const whatsappUrl = `https://wa.me/5491112345678?text=${encodeURIComponent(whatsappText)}`;
            masInfoBtn.href = whatsappUrl;
            masInfoBtn.innerHTML = '<i class="fab fa-whatsapp"></i> Consultar por WhatsApp';
        }
        
        // Agregar estilos CSS para las tarjetas de eventos
        if (!document.getElementById('footer-events-styles')) {
            const style = document.createElement('style');
            style.id = 'footer-events-styles';
            style.textContent = `
                .events-list .card {
                    transition: all 0.3s ease;
                    border: 1px solid #e9ecef;
                }
                .events-list .card:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
                    border-color: var(--primary-color);
                }
                .events-list .card-title {
                    color: var(--primary-color) !important;
                    font-weight: 600;
                }
                .events-list .card-text {
                    color: #6c757d;
                }
                .events-list .fas {
                    color: var(--primary-color);
                }
            `;
            document.head.appendChild(style);
        }
    }
    
    // Función para poblar el modal con datos (desde cache o AJAX)
    function populateModalWithData(eventId) {
        // Verificar si los datos ya están en cache
        if (eventDataCache.has(eventId)) {
            console.log('Usando datos precargados para evento:', eventId);
            const eventoData = eventDataCache.get(eventId);
            populateModalFields(eventoData);
        } else {
            console.log('Datos no encontrados en cache, cargando en tiempo real...');
            // Mostrar loading state
            modalTitulo.textContent = 'Cargando...';
            modalFecha.textContent = '';
            modalUbicacion.textContent = '';
            modalDescripcion.textContent = '';
            modalImagen.src = '';
            
            // Cargar datos en tiempo real
            populateModalWithACF(eventId);
        }
    }
    
    // Función para poblar los campos del modal
    function populateModalFields(eventoData) {
        modalTitulo.textContent = eventoData.title || 'Sin título';
        modalFecha.textContent = eventoData.fecha || 'Fecha por confirmar';
        modalDescripcion.innerHTML = eventoData.desc || 'Descripción no disponible';
        
        // Manejar la imagen
        if (eventoData.imagen) {
            modalImagen.src = eventoData.imagen;
            modalImagen.alt = eventoData.title || 'Imagen del evento';
            modalImagen.style.display = 'block';
        } else {
            modalImagen.style.display = 'none';
        }
        
        modalUbicacion.textContent = eventoData.ubicacion || 'Ubicación por confirmar';
        
        // Actualizar el enlace de WhatsApp con información del evento
        if (masInfoBtn) {
            const whatsappText = `Hola! Me interesa saber más sobre el evento: ${eventoData.title}`;
            const whatsappUrl = `https://wa.me/5491112345678?text=${encodeURIComponent(whatsappText)}`;
            masInfoBtn.href = whatsappUrl;
        }
    }
    
    // Función para poblar el modal con datos de ACF (fallback)
    function populateModalWithACF(eventId) {
        console.log('Poblando modal con evento ID:', eventId);
        console.log('AJAX URL:', unavidamejor_ajax.ajax_url);
        console.log('Nonce:', unavidamejor_ajax.nonce);
        
        // Crear un objeto FormData para enviar el ID del evento
        const formData = new FormData();
        formData.append('action', 'get_evento_data');
        formData.append('evento_id', eventId);
        formData.append('nonce', unavidamejor_ajax.nonce);
        
        console.log('Enviando petición AJAX...');
        
        // Hacer la petición AJAX
        fetch(unavidamejor_ajax.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const eventoData = data.data;
                
                // Guardar en cache para futuros usos
                eventDataCache.set(eventId, eventoData);
                
                // Poblar los campos del modal
                populateModalFields(eventoData);
            } else {
                console.error('Error al obtener datos del evento:', data.data);
                modalTitulo.textContent = 'Error al cargar el evento';
            }
        })
        .catch(error => {
            console.error('Error en la petición AJAX:', error);
            modalTitulo.textContent = 'Error al cargar el evento';
        });
    }
    
    // Función para cerrar el modal
    function closeEventModal() {
        // Remover clase de scroll del body
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        
        // Ocultar overlay con blur
        backdropBlur.classList.remove('show');
        
        // Ocultar el modal
        modal.classList.remove('show');
        
        // Limpiar contenido del modal
        modalTitulo.textContent = '';
        modalFecha.textContent = '';
        modalUbicacion.textContent = '';
        modalDescripcion.textContent = '';
        modalImagen.src = '';
    }
    
    // Event listeners para elementos clickeables
    eventoClickables.forEach(element => {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Obtener el ID del evento desde los data attributes
            const eventId = this.dataset.eventId;
            
            if (!eventId) {
                console.error('No event ID found');
                return;
            }
            
            // Abrir el modal con el ID del evento
            openEventModal(eventId);
        });
    });
    
    // Event listeners para enlaces individuales de eventos del footer
    footerEventItems.forEach(element => {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Obtener el ID del evento desde los data attributes
            const eventId = this.dataset.eventId;
            
            if (!eventId) {
                console.error('No event ID found in footer event item');
                return;
            }
            
            console.log('Footer event item clickeado, abriendo modal para evento:', eventId);
            // Abrir el modal con el evento específico
            openEventModal(eventId);
        });
    });
    
    // Event listener para el link de eventos del footer
    if (footerEventsLink) {
        console.log('Footer events link encontrado, agregando event listener');
        footerEventsLink.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('Footer events link clickeado, abriendo modal');
            // Abrir el modal con el primer evento disponible o mostrar mensaje
            openFooterEventsModal();
        });
    } else {
        console.warn('Footer events link no encontrado');
    }
    
    // Cerrar modal con el botón de cerrar
    closeModalBtn.addEventListener('click', closeEventModal);
    
    // Cerrar modal haciendo clic en el backdrop
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeEventModal();
        }
    });
    
    // Cerrar modal con la tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeEventModal();
        }
    });
    
    // Cerrar modal al hacer clic en el backdrop
    backdropBlur.addEventListener('click', function(e) {
        if (e.target === backdropBlur) {
            closeEventModal();
        }
    });
    
    // Iniciar precarga de datos cuando la página esté lista
    // Usar un pequeño delay para no bloquear la carga inicial
    setTimeout(() => {
        preloadAllEventData();
    }, 1000);
    
    // Log final de inicialización
    console.log('Event Modal inicializado completamente');
    console.log('Footer events link:', footerEventsLink);
    console.log('Modal:', modal);
    console.log('Evento clickables encontrados:', eventoClickables.length);
});
