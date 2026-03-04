<?php

namespace Config;

/**
 * Constantes de rutas de la aplicación
 * 
 * Este archivo centraliza todas las rutas de la aplicación
 * para facilitar su mantenimiento y uso en las vistas.
 */
class RoutesConstants
{
    // Rutas principales
    const ALUMNOS_INDEX = 'alumnos';
    const ALUMNOS_CREATE = 'alumnos/create';
    const ALUMNOS_EDIT = 'alumnos/edit';
    const ALUMNOS_DELETE = 'alumnos/delete';
    
    // Rutas de alumnos por carrera
    const ALUMNOS_CARRERA_INDEX = 'alumnos_carrera';
    const ALUMNOS_CARRERA_FILTRAR = 'alumnos_carrera/filtrar';
    
    /**
     * Obtiene la URL completa de una ruta
     * 
     * @param string $route Nombre de la ruta
     * @param mixed $params Parámetros adicionales para la ruta
     * @return string URL completa
     */
    public static function url(string $route, $params = null): string
    {
        helper('url');
        
        if ($params !== null) {
            if (is_array($params)) {
                $route .= '/' . implode('/', $params);
            } else {
                $route .= '/' . $params;
            }
        }
        
        return base_url($route);
    }
    
    /**
     * Verifica si la ruta actual coincide con la ruta proporcionada
     * 
     * @param string $route Ruta a verificar
     * @return bool True si coincide, False en caso contrario
     */
    public static function isActive(string $route): bool
    {
        helper('url');
        
        $currentUri = uri_string();
        $routeUrl = $route;
        
        return strpos($currentUri, $routeUrl) !== false;
    }
}
