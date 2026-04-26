# Soma Meat Co. — Guía del proyecto (CLAUDE.md)

> **Para Claude (y cualquier dev que entre al repo):** este archivo es la fuente de verdad. Léelo completo antes de tocar código. Si algo no está aquí, pregunta antes de improvisar. Si una decisión que tomes contradice este documento, debe documentarse explícitamente y justificarse.

---

## 1. Contexto del proyecto

**Cliente:** Soma Meat Co. — industria cárnica certificada (TIF 422, HACCP/USDA, Kosher, Halal) con sede en México y proyección de exportación.

**Audiencias:**
1. Compradores de **food service / HORECA** (restaurantes, hoteles, cadenas).
2. **Industria** que requiere maquila, corte y empaque bajo marca propia o de cliente.
3. Compradores de **exportación** (mercados internacionales, distribuidores extranjeros).
4. **Retail / autoservicio** (cadenas de supermercados).

**Objetivos del sitio:**
- Comunicar autoridad industrial y certificaciones de forma inmediata.
- Generar leads B2B segmentados por canal.
- Ofrecer un **portal de cliente** para descargar fichas técnicas, certificados sanitarios, hacer pedidos y dar seguimiento.
- Permitir al equipo Soma administrar contenido, productos, leads y clientes desde un **panel de administración** sin tocar código.

**Principios de diseño** (no negociables):
1. Premium sin gritar. Lujo discreto, mucho aire.
2. Evidencia sobre adjetivos: cada afirmación se respalda con sello, dato o foto.
3. Trazabilidad visible en lo visual y en el sistema (logs, historial).
4. Bilingüe ES/EN nativo desde el primer commit.
5. Accesibilidad WCAG AA mínimo.

---

## 2. Stack técnico

Decisiones tomadas. No cambiar sin justificación documentada.

| Capa | Tecnología | Versión | Razón |
|---|---|---|---|
| Backend | **Laravel** | 11.x | Madurez, ecosistema, opinionado pero flexible |
| Frontend (sitio público) | **Blade + Livewire 3 + Alpine.js** | últimas | Server-driven, SEO-friendly, sin overhead de SPA |
| CSS | **Tailwind CSS 4** | 4.x | Tokens vía `@theme`, JIT, integración nativa con design system |
| Build | **Vite** | 5.x | Estándar de Laravel 11 |
| Admin panel | **Filament 3** | 3.x | Panel CRUD profesional, customizable, perfecto para B2B |
| Portal de cliente | **Filament 3 (multi-panel)** | 3.x | Reutiliza la infraestructura, theme distinto |
| Auth | **Filament Auth + Laravel Fortify** | — | Para clientes B2B con magic link opcional |
| DB | **MySQL 8** o **PostgreSQL 16** | — | PostgreSQL preferido si hay reportes complejos |
| Cache | **Redis** | 7.x | Sessions, queues, cache |
| Queue | **Laravel Horizon + Redis** | — | Procesamiento asíncrono (PDFs, emails, exports) |
| Storage | **Spatie Media Library** + S3 | — | Uploads de fotos, PDFs de fichas técnicas |
| i18n | **Spatie Laravel Translatable** | — | Campos traducibles en modelos |
| SEO | Custom + **Spatie Schema-org** | — | JSON-LD para Organization, LocalBusiness, Product |
| Forms anti-spam | **Spatie Laravel Honeypot** | — | Sin captcha visible |
| Email | **Resend** o **Postmark** | — | Transaccional confiable, no Mailgun |
| Análisis | **Plausible** (preferido) o GA4 | — | Privacy-friendly por default |
| Testing | **Pest 3** | — | DX superior a PHPUnit |
| Linter | **Pint** + **Larastan (level 8)** | — | Calidad de código no negociable |
| CI | **GitHub Actions** | — | Pint + Pest + build assets |

**Paquetes Composer principales:**

```bash
composer require livewire/livewire filament/filament \
  spatie/laravel-translatable spatie/laravel-medialibrary \
  spatie/laravel-honeypot spatie/schema-org \
  resend/resend-laravel \
  laravel/horizon
composer require --dev pestphp/pest larastan/larastan laravel/pint
```

---

## 3. Estructura de directorios

Convención Laravel estándar con extensiones. **Respetar exactamente.**

```
app/
├── Console/
├── Exceptions/
├── Filament/                    # Panel de administración
│   ├── Admin/
│   │   ├── Pages/
│   │   ├── Resources/           # CRUDs (Servicios, Productos, Casos, Leads...)
│   │   └── Widgets/             # Dashboard widgets (KPIs)
│   └── Client/                  # Portal de cliente B2B
│       ├── Pages/
│       ├── Resources/           # Pedidos, Fichas, Certificados
│       └── Widgets/
├── Http/
│   ├── Controllers/
│   │   └── Web/                 # Controllers del sitio público
│   ├── Middleware/
│   └── Requests/
├── Livewire/                    # Componentes Livewire del sitio público
│   ├── ContactForm.php
│   ├── QuoteForm.php
│   └── ServiceList.php
├── Models/
│   ├── User.php
│   ├── Client.php               # Cliente B2B (empresa)
│   ├── Service.php
│   ├── Product.php              # Cortes / SKUs
│   ├── Certification.php
│   ├── CaseStudy.php
│   ├── Lead.php
│   ├── Order.php
│   ├── TechnicalSheet.php       # Fichas técnicas (PDFs)
│   └── Page.php                 # Páginas estáticas editables
├── Notifications/
├── Policies/
├── Providers/
└── View/
    └── Components/              # Blade components (Anonymous + Class-based)

resources/
├── css/
│   ├── app.css                  # Tailwind + custom utilities
│   └── filament/
│       ├── admin/theme.css      # Theme admin
│       └── client/theme.css     # Theme portal cliente
├── js/
│   ├── app.js                   # Alpine, custom JS mínimo
│   └── filament/
├── views/
│   ├── components/              # Blade components
│   │   ├── layouts/
│   │   │   ├── app.blade.php           # Layout sitio público
│   │   │   └── empty.blade.php
│   │   ├── ui/                  # Primitivos del sistema de diseño
│   │   │   ├── button.blade.php
│   │   │   ├── badge.blade.php
│   │   │   ├── card.blade.php
│   │   │   ├── pill.blade.php
│   │   │   └── stamp.blade.php  # Sello tipo TIF
│   │   ├── sections/            # Bloques compuestos reutilizables
│   │   │   ├── hero.blade.php
│   │   │   ├── cert-strip.blade.php
│   │   │   ├── stats.blade.php
│   │   │   ├── services-grid.blade.php
│   │   │   └── cta.blade.php
│   │   ├── header.blade.php
│   │   └── footer.blade.php
│   ├── pages/                   # Páginas del sitio
│   │   ├── home.blade.php
│   │   ├── services/
│   │   ├── maquila.blade.php
│   │   ├── quality.blade.php
│   │   ├── sectors/
│   │   ├── about.blade.php
│   │   └── contact.blade.php
│   └── livewire/

routes/
├── web.php                      # Sitio público
├── auth.php                     # Login/registro de clientes
└── console.php

config/
├── soma.php                     # Configuración específica del proyecto
└── ...

database/
├── migrations/
├── seeders/
└── factories/

tests/
├── Feature/
└── Unit/
```

---

## 4. Sistema de diseño — referencia obligatoria

El **sistema completo está documentado** en `soma-meat-design-system.md` (en la raíz del repo o `/docs`). Léelo antes de implementar UI. Resumen de tokens:

### 4.1 Colores (frontend público)

```css
/* Marca y acción */
--color-primary: #A0252A;        /* Rojo Soma — CTAs, énfasis */
--color-primary-dark: #6B1F2A;   /* Borgoña — hover, footer */
--color-brown: #3A1E18;          /* Café wordmark */
--color-ink: #1C1A18;            /* Texto principal, secciones autoridad */

/* Fondos (alternancia limpieza → calidez → autoridad) */
--color-bg: #FAFAF8;             /* Blanco hueso — base dominante */
--color-bg-warm: #F4EFE6;        /* Crema cálida — secciones puntuales */
--color-bg-cool: #F2F2EE;        /* Gris perla — soporte */

/* Acentos */
--color-accent-warm: #B8743A;    /* Cobre Maillard */
--color-accent-cool: #2E5147;    /* Verde Empaque */

/* Texto */
--color-ink-soft: #6B6863;
--color-cream: #F4EFE6;

/* Líneas */
--color-line: #E8E5DD;
--color-line-soft: #EFECE5;
```

### 4.2 Colores (admin Filament)

Modo oscuro por default para admins:

```php
// app/Providers/Filament/AdminPanelProvider.php
->colors([
    'primary' => '#A0252A',
    'gray' => Color::Stone,
    'success' => '#2E5147',
    'warning' => '#C8902F',
    'danger'  => '#A33327',
    'info'    => '#3F6B7F',
])
```

### 4.3 Colores (portal cliente)

Modo claro por default:

```php
// app/Providers/Filament/ClientPanelProvider.php
->colors([
    'primary' => '#A0252A',
    'gray' => Color::Stone,
    'success' => '#2E5147',
])
->brandLogo(asset('img/logo-soma.svg'))
```

### 4.4 Tipografía

- **Display (titulares):** `Cormorant Garamond` (Google Fonts) — fallback `Georgia, serif`. En producción evaluar licencia para `GT Sectra` o `Tobias`.
- **UI / Cuerpo:** `Inter` (Google Fonts).
- **Mono (datos técnicos, lotes, SKUs):** `JetBrains Mono`.

Cargar vía `<link>` en `app.blade.php` o self-hosted con Vite. Preferir self-hosted en producción para performance.

### 4.5 Espaciado y radios

Tailwind defaults son adecuados. No redefinir salvo añadir:

```js
// tailwind.config.js — extend
borderRadius: { 'pill': '9999px' }
```

---

## 5. Configuración de Tailwind 4

Archivo `resources/css/app.css`:

```css
@import "tailwindcss";

@theme {
  /* Colores marca */
  --color-primary: #A0252A;
  --color-primary-dark: #6B1F2A;
  --color-brown: #3A1E18;
  --color-ink: #1C1A18;
  --color-ink-soft: #6B6863;

  /* Fondos */
  --color-bone: #FAFAF8;
  --color-cream: #F4EFE6;
  --color-pearl: #F2F2EE;

  /* Acentos */
  --color-copper: #B8743A;
  --color-evergreen: #2E5147;

  /* Líneas */
  --color-line: #E8E5DD;
  --color-line-soft: #EFECE5;

  /* Tipografía */
  --font-display: 'Cormorant Garamond', Georgia, serif;
  --font-sans: 'Inter', system-ui, sans-serif;
  --font-mono: 'JetBrains Mono', monospace;

  /* Sombras */
  --shadow-md: 0 4px 16px rgba(28,26,24,0.08);
  --shadow-lg: 0 16px 40px rgba(28,26,24,0.18);
  --shadow-focus: 0 0 0 3px rgba(160,37,42,0.25);
}

/* Utilidades custom */
@layer base {
  body {
    @apply bg-bone text-ink font-sans antialiased;
  }
  h1, h2, h3 {
    @apply font-display tracking-tight;
  }
}

@layer components {
  .container-soma {
    @apply max-w-[1320px] mx-auto px-6 md:px-10;
  }
}
```

---

## 6. Componentes Blade — convenciones

### 6.1 Reglas

- **Anonymous components** para primitivos sin lógica (button, badge, pill).
- **Class-based components** cuando se necesita lógica PHP o métodos.
- **Livewire components** solo cuando hay interacción server-driven (formularios, filtros).
- Nunca mezclar lógica de negocio en Blade. Blade solo presenta.
- Atributos pasados con `merge()` para extensibilidad.
- Slots tipados con `@props`.

### 6.2 Ejemplo: Button

`resources/views/components/ui/button.blade.php`:

```blade
@props([
    'variant' => 'primary',     // primary | secondary | ghost | copper
    'size' => 'md',             // sm | md | lg
    'as' => 'button',           // button | a
    'href' => null,
    'icon' => null,             // Componente o nombre de ícono
])

@php
    $base = 'inline-flex items-center gap-2.5 font-semibold rounded-lg transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30';

    $variants = [
        'primary'   => 'bg-primary text-cream hover:bg-primary-dark',
        'secondary' => 'bg-transparent text-ink border border-ink hover:bg-ink hover:text-cream',
        'ghost'     => 'bg-transparent text-primary hover:bg-primary/10',
        'copper'    => 'bg-copper text-cream hover:bg-copper/90',
    ];

    $sizes = [
        'sm' => 'px-3.5 py-2 text-sm',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-7 py-4 text-base',
    ];

    $classes = "$base {$variants[$variant]} {$sizes[$size]}";
    $tag = $as === 'a' ? 'a' : 'button';
@endphp

<{{ $tag }} {{ $href ? "href=\"$href\"" : '' }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    @if($icon)
        <x-dynamic-component :component="$icon" class="w-4 h-4 transition-transform group-hover:translate-x-0.5" />
    @endif
</{{ $tag }}>
```

Uso:

```blade
<x-ui.button variant="primary" size="lg" as="a" href="/cotizar" icon="ui.icons.arrow-right">
    Solicitar cotización
</x-ui.button>
```

### 6.3 Inventario mínimo de componentes UI

Crear todos antes de empezar páginas:

- `ui.button` (primary, secondary, ghost, copper)
- `ui.badge` (default, success, warning, danger)
- `ui.pill` (especies, categorías)
- `ui.cert-badge` (sello de certificación con dot cobre)
- `ui.stamp` (sello tipo TIF, decorativo)
- `ui.card` (base con padding y border)
- `ui.eyebrow` (overline + línea cobre)
- `ui.section-title` (display serif con `<em>` borgoña)
- `ui.input`, `ui.textarea`, `ui.select`, `ui.checkbox`
- `ui.icon` (wrapper SVG)

### 6.4 Inventario de secciones reutilizables

- `sections.hero` (con slots para eyebrow, title, subtitle, CTAs, visual)
- `sections.cert-strip` (4 sellos sobre carbón)
- `sections.stats` (4 stats con números cobre)
- `sections.services-grid` (3 cards)
- `sections.cta` (CTA final pre-footer)
- `sections.case-study` (testimonial / caso)

---

## 7. Sitio público — rutas y páginas

```php
// routes/web.php
Route::get('/', HomeController::class)->name('home');
Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');
Route::get('/servicios/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/maquila', MaquilaController::class)->name('maquila');
Route::get('/calidad', QualityController::class)->name('quality');
Route::get('/sectores/{slug}', SectorController::class)->name('sectors.show');
Route::get('/casos/{slug}', CaseStudyController::class)->name('cases.show');
Route::get('/nosotros', AboutController::class)->name('about');
Route::get('/contacto', [ContactController::class, 'show'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');
Route::get('/cotizar', QuoteController::class)->name('quote');

// Localización
Route::middleware('setlocale')->group(function () {
    // ...rutas anteriores
});
```

### 7.1 Mapa del sitio (sitemap esperado)

- **Home** — hero, cert strip, stats, servicios, casos destacados, CTA exportación
- **Servicios** — listado + detalle (Maquila, Cortes premium, Procesados, Empaque)
- **Maquila** (página dedicada) — capacidades, calculadora de cotización, casos
- **Calidad y Trazabilidad** — certificaciones, recorrido visual planta, documentación
- **Sectores** — Food Service, Industria, Exportación, Retail (página por sector)
- **Casos de éxito** — listado + detalle con métricas reales
- **Nosotros** — historia, equipo, planta, certificaciones
- **Contacto** — formulario segmentado por canal
- **Portal de cliente** — `/portal` (Filament panel)
- **Admin** — `/admin` (Filament panel)

---

## 8. Filament Admin — recursos a construir

Carpeta: `app/Filament/Admin/Resources/`

| Resource | Responsabilidad |
|---|---|
| `PageResource` | Páginas editables (Home, Nosotros, etc.) con bloques |
| `ServiceResource` | CRUD de servicios |
| `ProductResource` | Catálogo de cortes / SKUs con foto, ficha técnica PDF |
| `CertificationResource` | Sellos vigentes con vencimiento, archivo PDF |
| `CaseStudyResource` | Casos de éxito con cliente, métricas, imágenes |
| `LeadResource` | Leads del formulario de contacto, segmentados por canal, asignables |
| `ClientResource` | Empresas cliente B2B (con usuarios asociados) |
| `OrderResource` | Pedidos del portal de cliente |
| `TechnicalSheetResource` | Fichas técnicas asociables a productos |
| `MediaLibraryResource` | Wrap de Spatie Media Library |

### 8.1 Convenciones Filament

- **Resources** en español (labels, navigation labels). Code en inglés.
- Navigation groups: `Contenido`, `Catálogo`, `Comercial`, `Calidad`, `Sistema`.
- Cada Resource con `getNavigationBadge()` cuando aplique (ej: leads sin atender).
- Forms con `Section` y `Tabs` para organizar campos largos.
- Tables con filtros, búsqueda, exportación a CSV/XLSX cuando aplique.
- `BulkActions` deshabilitadas salvo justificación.
- Soft deletes en todos los modelos de negocio.

### 8.2 Roles y permisos (Spatie Permission)

```php
Role::create(['name' => 'super-admin']);   // Todo
Role::create(['name' => 'editor']);         // Contenido, sin clientes ni leads
Role::create(['name' => 'comercial']);      // Leads, clientes, pedidos
Role::create(['name' => 'calidad']);        // Productos, fichas, certificaciones
Role::create(['name' => 'cliente']);        // Solo accede al portal
```

---

## 9. Portal de cliente — Filament Client Panel

Carpeta: `app/Filament/Client/Resources/`

| Resource / Page | Funcionalidad |
|---|---|
| `Dashboard` | Resumen: pedidos en curso, próximos vencimientos de certificados, novedades |
| `OrderResource` | Historial y creación de pedidos (catálogo + carrito + cotización) |
| `ProductCatalog` (page) | Catálogo con precios negociados por cliente |
| `TechnicalSheets` | Descarga de fichas técnicas |
| `Documents` | Certificados sanitarios por embarque, facturas, COAs |
| `ProfileSettings` | Datos de la empresa, usuarios asociados, contactos |

### 9.1 Acceso

- Login con email + password o magic link (Filament puede integrar).
- Sin registro público — los clientes los crea el equipo comercial desde el admin.
- Multi-tenancy a nivel de `Client` (cada usuario pertenece a un Client).

---

## 10. Internacionalización (ES / EN)

### 10.1 Strings estáticos

`lang/es/*.php` y `lang/en/*.php` con archivos por contexto: `nav.php`, `forms.php`, `cta.php`, `legal.php`.

### 10.2 Contenido dinámico

Modelos traducibles con `Spatie\Translatable\HasTranslations`:

```php
class Service extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'slug', 'description', 'long_description'];
}
```

### 10.3 Routing

Middleware `SetLocale` que detecta de:
1. Subdomain (`en.somameat.com` opcional fase 2).
2. Path prefix (`/en/services`).
3. Cookie / sesión.
4. Header `Accept-Language`.
5. Default ES.

### 10.4 Filament

Plugin `filament/spatie-laravel-translatable-plugin` para CRUD multilingüe.

---

## 11. SEO técnico

Obligatorio desde el primer commit.

- **Meta tags dinámicos** vía `<x-seo>` blade component que recibe title, description, og-image, canonical.
- **Schema.org JSON-LD:**
  - `Organization` en todas las páginas (footer del head).
  - `LocalBusiness` con datos de planta.
  - `Product` en cada SKU.
  - `BreadcrumbList` en internas.
- **Sitemap.xml** generado dinámicamente.
- **Robots.txt** con disallow de `/admin`, `/portal`, `/livewire`.
- **Open Graph + Twitter Cards** completos.
- **Hreflang** para versión ES/EN.
- Slugs limpios, kebab-case, sin caracteres especiales.
- Imágenes con `<picture>`, lazy loading nativo, `width` y `height` siempre.

---

## 12. Performance — objetivos

| Métrica | Target |
|---|---|
| Lighthouse Performance | ≥ 95 mobile, ≥ 98 desktop |
| LCP | < 2.0s |
| CLS | < 0.05 |
| INP | < 150ms |
| Bundle JS inicial | < 100KB gzip |
| Bundle CSS | < 60KB gzip |

Reglas:

- Imágenes en **WebP/AVIF** con fallback. Spatie Media Library + responsive variants.
- Fuentes self-hosted, `font-display: swap`, preload de fuente display.
- Sin librerías JS pesadas. Alpine y Livewire son suficientes.
- HTML cacheado para páginas estáticas (`Cache::remember`).
- Queries optimizadas, eager loading siempre, N+1 prohibido.

---

## 13. Accesibilidad

- WCAG **AA mínimo**, AAA en datos críticos del backend.
- Foco visible en todo elemento interactivo.
- `prefers-reduced-motion` respetado.
- Labels en todo input, errores con `aria-describedby`.
- Tablas semánticas con `<th scope>`.
- Navegación 100% por teclado.
- Contraste validado con tooling (axe DevTools en CI ideal).
- Alt text en toda imagen no decorativa.

---

## 14. Seguridad

- HTTPS obligatorio, HSTS habilitado.
- CSP estricto (`script-src 'self'` + nonce, sin `unsafe-inline`).
- Rate limiting en formularios y login.
- Validación server-side siempre, FormRequests dedicadas.
- Honeypot + cooldown en formularios públicos.
- Logs de acceso al admin en tabla `activity_log` (Spatie Activitylog).
- Backups automatizados de DB y storage (Spatie Backup) a S3.
- Variables sensibles solo en `.env`, nunca commiteadas.
- Dependabot / Renovate activado.

---

## 15. Convenciones de código

### 15.1 PHP

- **PSR-12** + **Pint** (config Laravel preset).
- Tipado estricto siempre: `declare(strict_types=1)`.
- Return types y param types obligatorios.
- Arrays asociativos → DTOs cuando se cruzan capas (`spatie/laravel-data`).
- Modelos Eloquent: relaciones con return types `HasMany`, `BelongsTo`, etc.
- Nunca usar `$model->update($request->all())`. Siempre validar y mapear.

### 15.2 Naming

- **Modelos:** singular PascalCase (`Service`, `Order`, `TechnicalSheet`).
- **Tablas:** plural snake_case (`services`, `technical_sheets`).
- **Controllers:** PascalCase + `Controller` (`ServiceController`, single-action `MaquilaController`).
- **Livewire:** PascalCase (`ContactForm`).
- **Rutas:** kebab-case (`/casos-de-exito`).
- **Variables/métodos:** camelCase.
- **Constantes:** UPPER_SNAKE_CASE.

### 15.3 Blade

- Componentes en kebab-case (`x-ui.button`, `x-sections.hero`).
- Props con `@props()` y defaults.
- Sin lógica de negocio. Si necesitas más de 3 líneas de PHP, mover a class-based component.
- Indentación 4 espacios.

### 15.4 Git

- **Conventional Commits:** `feat:`, `fix:`, `chore:`, `refactor:`, `docs:`, `test:`.
- Branches: `feat/short-description`, `fix/short-description`.
- PR description con screenshot/video si toca UI.
- Squash merge a `main`.
- `main` siempre desplegable.

### 15.5 Tests

- **Pest 3** preferido sobre PHPUnit.
- Cobertura mínima:
  - Feature tests para todos los formularios y flujos críticos (login, contacto, cotización, creación de pedido).
  - Unit tests para servicios de dominio y cálculos.
- CI corre Pint + Larastan + Pest en cada PR.

---

## 16. Flujo de trabajo para nuevas features

1. Lee este `CLAUDE.md` completo si no lo has hecho en la sesión.
2. Lee el `soma-meat-design-system.md` si la feature toca UI.
3. Identifica si es **sitio público**, **admin**, o **portal cliente**. Cada uno tiene reglas distintas.
4. Si es UI nueva: revisa si ya existe el componente. Reutiliza antes de crear.
5. Si es modelo nuevo: migración + factory + seeder + Resource Filament + tests.
6. Si toca i18n: agrega claves ES y EN en el mismo commit.
7. Corre `vendor/bin/pint` y `vendor/bin/pest` antes de commitear.
8. PR con descripción + screenshot.

---

## 17. Reglas específicas para Claude

**Hacer siempre:**

- Antes de implementar, **buscar componentes existentes** con grep / glob (`x-ui.*`, `x-sections.*`).
- Usar **tokens de Tailwind** definidos en `app.css`. Nunca hardcodear hex en Blade.
- Respetar el **inventario de componentes** del punto 6.3 — si necesitas algo nuevo, primero proponer su API en un comentario.
- **Validar accesibilidad** del componente antes de marcarlo terminado: foco, contraste, semántica.
- **Bilingüe desde el commit** — toda string visible al usuario va por `__()` o desde modelo traducible.
- **FormRequests dedicadas** para validación, nunca inline en controller.
- **Eager loading** explícito en cualquier query con relaciones.
- **Comentarios en español** para lógica de negocio. Code en inglés.

**No hacer nunca:**

- ❌ Hardcodear colores hex fuera de `app.css` o `tailwind.config`.
- ❌ Crear nuevas familias tipográficas. Solo las 3 del sistema.
- ❌ Usar fotos de stock genérico para producto o proceso.
- ❌ Usar emojis en UI productiva.
- ❌ Mezclar lógica de negocio en Blade.
- ❌ `$request->all()` en `Model::create()` o `update()`.
- ❌ Push directo a `main`.
- ❌ Commit con tests fallando o linter en rojo.
- ❌ Componentes Livewire para cosas que pueden ser Alpine.
- ❌ Bibliotecas JS adicionales sin justificación documentada.
- ❌ Dependencias de Composer no listadas en este documento sin discusión previa.

**Cuando dudes:**

- Pregunta antes de improvisar. Es preferible una pregunta extra que reescribir después.
- Si la respuesta no está clara en este `CLAUDE.md` ni en el design system, abre un issue con la pregunta y propuesta de respuesta.

---

## 18. Setup inicial (primer commit)

Orden recomendado de ejecución:

1. `composer create-project laravel/laravel soma-meat`
2. Instalar dependencias del punto 2.
3. Configurar Tailwind 4 (`app.css` con tokens, `vite.config.js`).
4. Crear layout base + componentes UI primitivos (button, badge, pill, card, eyebrow).
5. Crear sections reutilizables (hero, cert-strip, stats, services-grid).
6. Implementar Home con datos hardcoded (no DB todavía).
7. Migrations + Models + Factories de los recursos del punto 8.
8. Filament Admin Panel con primeros Resources (Service, Certification, CaseStudy).
9. Sistema de páginas dinámicas + integración a Filament.
10. Resto de páginas del sitio.
11. Filament Client Panel.
12. i18n EN.
13. SEO técnico, sitemap, schema.
14. QA accesibilidad y performance.
15. Lanzamiento.

---

## 19. Recursos de referencia

- Sistema de diseño completo: `/docs/soma-meat-design-system.md`
- Mockup HTML del hero: `/docs/soma-meat-hero-redesign.html`
- Guía Laravel 11: https://laravel.com/docs/11.x
- Filament 3: https://filamentphp.com/docs/3.x
- Livewire 3: https://livewire.laravel.com/docs
- Tailwind 4: https://tailwindcss.com/docs
- Pest 3: https://pestphp.com/docs

---

*Este documento es **vivo**. Cualquier desviación o nueva decisión se actualiza aquí en el mismo PR. Si el documento queda desactualizado respecto al código, el código es el que está mal — siempre.*

**Última actualización:** abril 2026 — v1.0
