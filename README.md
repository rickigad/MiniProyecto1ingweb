# MiniProyecto-1: Desarrollo Web con PHP

## Introducción

Este proyecto es un mini-proyecto de desarrollo web en PHP, diseñado para resolver una serie de problemas algorítmicos y demostrar la aplicación de buenas prácticas de programación y diseño web. Se enfoca en el uso de estructuras de control, funciones, clases y la separación de responsabilidades mediante un patrón arquitectónico.

## Tecnologías Utilizadas

Este proyecto ha sido desarrollado utilizando las siguientes tecnologías y estándares:

*   **PHP:** Lenguaje de programación principal para la lógica de backend y los controladores.
*   **HTML5, CSS3, JavaScript:** Tecnologías web estándar para la estructura, estilo y interactividad del frontend.
*   **Bootstrap 5:** Framework CSS para el diseño responsivo y componentes de interfaz de usuario.
*   **Chart.js:** Librería JavaScript utilizada para la visualización de datos mediante gráficos (en Problemas 5 y 6).
*   **Patrón MVC (Modelo-Vista-Controlador):** Arquitectura implementada para la organización del código, separando la lógica de negocio, la presentación y el control de flujo.
*   **PSR-1 (Basic Coding Standard):** Estándar de codificación seguido para mantener la consistencia y calidad del código PHP.
*   **Servidor web integrado de PHP:** Utilizado para el desarrollo y pruebas locales de la aplicación.

## Estructura del Proyecto

El proyecto sigue una estructura organizada para facilitar el desarrollo y mantenimiento:

```
MiniProyectoPHP/
├── public/         # Carpeta pública, accesible desde el navegador
│   ├── index.php   # Controlador frontal principal que gestiona las páginas y el enrutamiento
│   └── assets/     # Carpeta para CSS y JS estáticos
├── src/            # Lógica principal de PHP
│   ├── controllers/ # Controladores para cada problema, gestionan la lógica de la solicitud
│   │   └── problems/ # Controladores específicos para cada problema
│   └── utils/      # Clases de utilidad (ej. Utilities.php para sanitización)
└── views/          # Plantillas y vistas HTML
    ├── templates/  # Partes reutilizables (header.php, footer.php)
    ├── home_view.php # Vista del menú principal
    └── problems/   # Vistas específicas para cada problema
```

## Consideraciones de Implementación

*   **Funciones Matemáticas:** Se han utilizado funciones matemáticas de PHP (ej. `pow`, `sqrt`, `array_sum`, `min`, `max`) para resolver los problemas algorítmicos.
*   **Funciones de Validación y Sanitización:** Se ha implementado una clase `Utilities` con métodos estáticos (ej. `sanitize`) para limpiar y validar los datos de entrada, siguiendo buenas prácticas de seguridad.
*   **Métodos Estáticos:** Se hace uso de métodos estáticos en clases de utilidad para funcionalidades comunes.
*   **PSR-1:** El código PHP busca adherirse al estándar PSR-1 para mantener la consistencia en la codificación.

## Cómo Ejecutar el Proyecto

Para ejecutar este proyecto localmente, puedes usar el servidor web integrado de PHP:

1.  Abre tu terminal o línea de comandos.
2.  Navega hasta la carpeta `public` del proyecto:
    ```bash
    cd D:MiniProyecto#1\MiniProyectoPHP\public
    ```
3.  Ejecuta el servidor PHP:
    ```bash
    php -S localhost:8000
    ```
4.  Abre tu navegador web y visita: `http://localhost:8000`

## Problemas Implementados

Se han implementado los siguientes problemas, accesibles desde el menú principal:

*   **Problema 1:** Calculadora de Estadísticas (Media, Desviación Estándar, Mínimo, Máximo).
*   **Problema 2:** Suma de los números del 1 al 1,000.
*   **Problema 3:** N primeros múltiplos de 4.
*   **Problema 4:** Suma de Pares e Impares (1-200).
*   **Problema 5:** Clasificador de Edades (con estadísticas y gráfico).
*   **Problema 6:** Presupuesto Hospitalario (con distribución y gráfico).
*   **Problema 7:** Calculadora de Notas (con formulario de múltiples pasos).
*   **Problema 8:** Estación del Año.
*   **Problema 9:** Potencias de un Número.
*   **Problema 10:** Reporte de Ventas (con matriz bidimensional y persistencia de sesión).

## Fecha de Realización

Octubre de 2025

## Grupo / Estudiantes
Universidad Tecnológica de Panamá

Grupo:
1SF132

Integrantes:
Jamir Martínez,
Ricardo Solís

Curso: Ingeniería Web
