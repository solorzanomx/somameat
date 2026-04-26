# Contexto Técnico — Soma Meat

## Proyecto
Sitio web y plataforma B2B para Soma Meat.

Objetivo:
- Sitio público institucional
- Catálogo de productos
- Solicitudes de cotización B2B
- Panel administrativo
- Futuras integraciones con n8n, WhatsApp, CRM y automatizaciones

## Stack del servidor

Servidor VPS con aaPanel.

Versiones instaladas:

- PHP: 8.3.30
- Composer: 2.9.7
- Node.js: v22.22.2
- npm: 10.9.7
- Google Chrome: 147.0.7727.101
- Puppeteer: 24.42.0
- Base de datos: MySQL/MariaDB
- Web server: Nginx
- SSL: Let's Encrypt
- Deploy: GitHub + git pull manual en servidor

## Proyecto Laravel

- Framework: Laravel
- Ruta del proyecto:
  /www/wwwroot/somameat.com

- Document root:
  /www/wwwroot/somameat.com/public

- Dominio staging:
  https://somameat.hod3v4.com

- Dominio final:
  https://somameat.com

## Reglas técnicas

1. El proyecto debe mantenerse como monolito Laravel modular.
2. No usar WordPress.
3. No usar Shopify.
4. No usar plataformas cerradas.
5. El ecommerce debe estar orientado a B2B y cotizaciones, no solo carrito tradicional.
6. Todo debe ser compatible con PHP 8.3.
7. Todo debe funcionar en Nginx + aaPanel.
8. El frontend puede usar Blade, Vite, Tailwind y Alpine.
9. Los PDFs o imágenes futuras pueden generarse con Chrome/Puppeteer.
10. El deploy debe funcionar con:
   git pull origin main
   composer install --no-dev --optimize-autoloader
   php artisan migrate --force
   php artisan optimize:clear

## Módulos planeados

- Sitio público
- Productos
- Categorías
- Clientes B2B
- Solicitudes de cotización
- Pedidos
- Panel administrativo
- Formularios de contacto
- Integración futura con n8n
- Generación futura de PDFs comerciales

## Convenciones

- Código limpio y mantenible.
- Estructura modular.
- Evitar dependencias innecesarias.
- Priorizar escalabilidad y control.
- Diseñar pensando en integración futura con automatizaciones.