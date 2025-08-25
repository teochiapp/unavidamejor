<!-- Modal del Evento -->
<div class="custom-modal" id="eventoModal">
  <div class="custom-modal-content">
    <!-- Header del modal -->
    <div class="custom-modal-header">
      <button type="button" class="custom-modal-close" id="closeModal">
        <i class="fas fa-times"></i>
      </button>
    </div>
    
    <!-- Body del modal -->
    <div class="custom-modal-body">
      <div class="modal-row">
        <!-- Columna de imagen -->
        <div class="modal-col-image">
          <div class="evento-modal-img-container">
            <img id="modalEventoImagen" src="" alt="Imagen del evento">
          </div>
        </div>
        
        <!-- Columna de contenido -->
        <div class="modal-col-content">
          <div class="evento-modal-content">
            <!-- Título -->
            <h2 id="modalEventoTitulo" class="modal-title"></h2>
            
            <!-- Fecha -->
            <div class="evento-modal-fecha">
              <div class="fecha-item">
                <i class="fas fa-calendar-alt"></i>
                <span id="modalEventoFecha"></span>
              </div>
            </div>
            
            <!-- Ubicación -->
            <div class="evento-modal-ubicacion">
              <div class="ubicacion-item">
                <i class="fas fa-map-marker-alt"></i>
                <span id="modalEventoUbicacion">Por confirmar</span>
              </div>
            </div>
            
            <!-- Descripción -->
            <div class="evento-modal-descripcion">
              <p id="modalEventoDescripcion"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Footer del modal -->
    <div class="custom-modal-footer">
      <a href="https://wa.me/5491112345678?text=Hola! Me interesa saber más sobre este evento" 
         target="_blank" 
         class="btn btn-primary whatsapp-btn" 
         id="masInfoBtn">
        <i class="fab fa-whatsapp"></i>
        Consultar por WhatsApp
      </a>
    </div>
  </div>
</div>

<!-- Overlay con efecto blur -->
<div class="modal-backdrop-blur" id="modalBackdropBlur"></div>

<style>
/* Modal personalizado */
.custom-modal {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  width: 100vw !important;
  height: 100vh !important;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  z-index: 9999;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 20px;
  box-sizing: border-box;
  transform: none !important;
}

.custom-modal.show {
  display: flex !important;
}

/* Asegurar que el modal no herede posicionamiento de elementos padres */
.custom-modal,
.custom-modal *,
.modal-backdrop-blur {
  position: relative;
}

.custom-modal,
.modal-backdrop-blur {
  position: fixed !important;
}

/* Reset de posicionamiento para elementos internos del modal */
.custom-modal-content,
.custom-modal-header,
.custom-modal-body,
.custom-modal-footer {
  position: relative !important;
  transform: none !important;
}

.custom-modal-content {
  background: white;
  border-radius: 20px;
  max-width: 900px;
  width: 100%;
  max-height: 90vh;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
  animation: modalSlideIn 0.3s ease-out;
  position: relative;
  z-index: 10000;
}

@keyframes modalSlideIn {
  from {
    opacity: 0;
    transform: scale(0.8) translateY(-50px);
  }
  to {
    opacity: 1;
    transform: scale(1) translateY(0);
  }
}

.custom-modal-header {
  background: linear-gradient(135deg, var(--primary-color), #4d0013);
  color: white;
  padding: 1.5rem 1.5rem 0;
  position: relative;
  z-index: 10000;
}

.custom-modal-close {
  position: absolute;
  top: 15px;
  right: 20px;
  background: rgba(255, 255, 255, 0.8);
  border: none;
  border-radius: 50%;
  width: 32px;
  height: 32px;
  color: #333;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.custom-modal-close:hover {
  background: white;
  transform: scale(1.1);
}

.custom-modal-body {
  padding: 2rem 1.5rem;
}

.modal-row {
  display: flex;
  gap: 2rem;
}

.modal-col-image {
  flex: 0 0 45%;
}

.modal-col-content {
  flex: 1;
}

.evento-modal-img-container {
  height: 300px;
  background: #f8f9fa;
  border-radius: 15px;
  overflow: hidden;
}

.evento-modal-img-container img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.evento-modal-img-container img:not([src]), 
.evento-modal-img-container img[src=""] {
  display: none;
}

.evento-modal-img-container:has(img:not([src])), 
.evento-modal-img-container:has(img[src=""]) {
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
  display: flex;
  align-items: center;
  justify-content: center;
}

.evento-modal-img-container:has(img:not([src]))::after, 
.evento-modal-img-container:has(img[src=""])::after {
  content: "📷";
  font-size: 3rem;
  color: #adb5bd;
}

.evento-modal-content h2 {
  font-family: var(--font-heading);
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--primary-color);
  margin-bottom: 1.5rem;
  line-height: 1.3;
}

.fecha-item,
.ubicacion-item {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  font-size: 1.1rem;
}

.fecha-item i,
.ubicacion-item i {
  color: var(--primary-color);
  font-size: 1.2rem;
  width: 20px;
  text-align: center;
}

.evento-modal-descripcion h6 {
  font-weight: 700;
  color: var(--background-black);
  font-size: 1.1rem;
  margin-bottom: 0.75rem;
}

.evento-modal-descripcion p {
  color: var(--background-black);
  line-height: 1.6;
  margin: 0;
}

.custom-modal-footer {
  padding: 0 1.5rem 1.5rem;
  display: flex;
  justify-content: center;
}

.whatsapp-btn {
  padding: 0.75rem 1.5rem;
  border-radius: 10px;
  font-weight: 600;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 1rem;
  background: var(--primary-color);
  color: white;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.whatsapp-btn:hover {
  background: #4d0013;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(128, 0, 32, 0.3);
  color: white;
  text-decoration: none;
}

.whatsapp-btn i {
  font-size: 1.2rem;
}

/* Responsive */
@media (max-width: 768px) {
  .custom-modal {
    padding: 10px;
  }
  
  .modal-row {
    flex-direction: column;
    gap: 1.5rem;
  }
  
  .modal-col-image {
    flex: none;
  }
  
  .evento-modal-img-container {
    height: 250px;
  }
  
  .evento-modal-content h2 {
    font-size: 1.5rem;
  }
  
  .custom-modal-body {
    padding: 1.5rem 1rem;
  }
  
  .custom-modal-footer {
    padding: 0 1rem 1rem;
  }
  
  .whatsapp-btn {
    width: 100%;
    justify-content: center;
  }
}

/* Prevenir scroll cuando el modal está abierto */
body.modal-open {
  overflow: hidden !important;
  position: relative !important;
}

/* Asegurar que el modal esté siempre por encima de todo */
.custom-modal {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  right: 0 !important;
  bottom: 0 !important;
  width: 100vw !important;
  height: 100vh !important;
  z-index: 9999 !important;
  transform: none !important;
}

/* Asegurar que el contenido del modal esté centrado */
.custom-modal.show {
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
}

/* Asegurar que el modal se comporte correctamente en diferentes contextos */
.custom-modal {
  transform: none !important;
  will-change: auto !important;
}

/* Asegurar que el modal esté centrado independientemente del scroll */
.custom-modal.show .custom-modal-content {
  transform: none !important;
  margin: auto !important;
}

/* Overlay con blur (backup) */
.modal-backdrop-blur {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  width: 100vw !important;
  height: 100vh !important;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  z-index: 9998;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  transform: none !important;
}

.modal-backdrop-blur.show {
  opacity: 1;
  visibility: visible;
}
</style>
