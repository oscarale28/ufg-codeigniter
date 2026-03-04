<?php
use Config\RoutesConstants;

// Cargar helpers necesarios
helper('url');

// Obtener la ruta actual para resaltar el elemento activo
$currentUri = uri_string() ?: '/';
?>

<!-- Overlay para móviles -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar bg-white border-right shadow-sm flex-shrink-0" style="width: 250px;" id="sidebar">
    <nav class="nav flex-column p-3">
        <div class="nav-header mb-3">
            <h5 class="text-dark font-weight-bold mb-0">MENÚ</h5>
            <hr class="my-2">
        </div>
        
        <!-- Alumnos -->
        <div class="nav-section mb-3">
            <h6 class="text-muted text-uppercase small font-weight-bold mb-2 px-2">Alumnos</h6>
            <a class="nav-link <?= (strpos($currentUri, 'alumnos') !== false && strpos($currentUri, 'carrera') === false && strpos($currentUri, 'create') === false && strpos($currentUri, 'edit') === false) ? 'active bg-primary text-white' : 'text-dark' ?>" 
               href="<?= RoutesConstants::url(RoutesConstants::ALUMNOS_INDEX) ?>">
                <i class="fas fa-list mr-2"></i>Lista de Alumnos
            </a>
            <a class="nav-link <?= strpos($currentUri, 'alumnos/create') !== false ? 'active bg-primary text-white' : 'text-dark' ?>" 
               href="<?= RoutesConstants::url(RoutesConstants::ALUMNOS_CREATE) ?>">
                <i class="fas fa-plus-circle mr-2"></i>Crear Alumno
            </a>
        </div>
        
        <!-- Alumnos por Carrera -->
        <div class="nav-section mb-3">
            <h6 class="text-muted text-uppercase small font-weight-bold mb-2 px-2">Reportes</h6>
            <a class="nav-link <?= strpos($currentUri, 'alumnos_carrera') !== false ? 'active bg-primary text-white' : 'text-dark' ?>" 
               href="<?= RoutesConstants::url(RoutesConstants::ALUMNOS_CARRERA_INDEX) ?>">
                <i class="fas fa-graduation-cap mr-2"></i>Alumnos por Carrera
            </a>
        </div>
    </nav>
</aside>

<script>
    // Toggle sidebar en móviles
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                if (sidebarOverlay) {
                    sidebarOverlay.classList.toggle('show');
                }
            });
            
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                });
            }
        }
    });
</script>

<style>
    .sidebar {
        z-index: 1000;
    }
    
    .sidebar .nav-link {
        border-radius: 5px;
        padding: 10px 15px;
        margin-bottom: 5px;
        transition: all 0.3s ease;
    }
    
    .sidebar .nav-link:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }
    
    .sidebar .nav-link.active {
        font-weight: 600;
    }
    
    .sidebar .nav-link.active:hover {
        background-color: #0056b3;
        transform: translateX(5px);
    }
    
    .sidebar .nav-section {
        margin-bottom: 1.5rem;
    }
    
    .sidebar .nav-header h5 {
        font-size: 1.1rem;
    }

    
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 1040;
            width: 250px !important;
            margin: 0;
            padding: 0;
            flex: 0 0 0 !important;
            flex-basis: 0 !important;
            flex-shrink: 0 !important;
            flex-grow: 0 !important;
        }
        
        .sidebar.show {
            transform: translateX(0);
        }
        
        .main-content {
            margin-left: 0 !important;
            width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        
        /* Overlay para móviles */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1035;
        }
        
        .sidebar-overlay.show {
            display: block;
        }
    }
</style>
