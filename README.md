# Handoff: Soma Meat Co — Hero Rediseño (Mix v2 · B2B / Inocuidad)

## Stack destino
**Laravel** (Blade + posiblemente Livewire/Inertia) con **Tailwind CSS** y **Alpine.js** para interacciones ligeras. Si el proyecto ya tiene Vite + Tailwind configurado, perfecto. Si usa Livewire o Inertia/Vue/React, adaptar el componente al patrón existente.

## Overview
Rediseño del Hero (above-the-fold) de la home de **Soma Meat Co** — proveedor cárnico TIF 422 B2B (retail / foodservice). Diseño orientado a comunicar **calidad, certificación, higiene, seguridad y responsabilidad** a compradores B2B (Walmart, Sysco, Soriana, foodservice).

## About the Design Files
Los archivos de este bundle son **referencias de diseño en HTML/JSX** — prototipos visuales, **no código de producción para copiar directamente**. La tarea es **recrearlos en el codebase Laravel existente** usando Blade + Tailwind y los patrones del proyecto.

El JSX usa estilos inline para máxima legibilidad. En Laravel se traducirán a clases Tailwind o utilidades CSS personalizadas.

## Fidelity
**Alta fidelidad (hi-fi).** Pixel-perfect: colores, tipografías, espaciados, jerarquías y comportamiento están definidos. La implementación debe ser fiel al mockup.

---

## Estructura del Hero

```
┌─────────────────────────────────────────────────────┐
│  TOP UTILITY BAR (negro, 30px)                     │
├─────────────────────────────────────────────────────┤
│  NAV (blanco, 76px) — logo · links · CTA           │
├─────────────────────────────────────────────────────┤
│                                                     │
│   HERO LEFT          │      HERO RIGHT             │
│   - Eyebrow badges   │      Tarjeta modular        │
│   - H1 (Bricolage)   │      ┌──────┬──────┐        │
│   - Copy             │      │ Foto │ Pack │        │
│   - CTAs             │      │      ├──────┤        │
│   - Especies + Certs │      │      │ Live │        │
│                      │      └──────┴──────┘        │
├─────────────────────────────────────────────────────┤
│  STATS BAR (168px) — 4 cifras de capacidad         │
└─────────────────────────────────────────────────────┘
```

---

## Componentes detallados

### 1. Top utility bar (negro)
- `height: 30px`, `padding: 0 48px`
- Background `#0F0F0F`, color `#FFFFFF`
- Tipografía: IBM Plex Mono `10px`, `letter-spacing: 0.14em`
- **Izquierda** (gap 22px):
  - `[● verde 6px] [verde claro #86EFAC] OPERACIÓN ACTIVA`
  - `SAGARPA · MÉX-422` (opacity 0.55)
  - `HACCP · KOSHER KC` (opacity 0.55)
  - `AUDITORÍA 2026.03 · 0 NC` (opacity 0.55)
- **Derecha** (gap 18px, opacity 0.7): `ES / EN`, `contacto@somameat.mx`

### 2. Nav (blanco)
- `height: 76px`, `padding: 0 48px`
- Background `#FFFFFF`, border-bottom `1px solid #E5E7EB`
- **Logo** (izquierda):
  - Círculo 36×36px rojo `#A81E2A` con pentágono blanco dentro (clip-path `polygon(50% 0%, 100% 35%, 82% 100%, 18% 100%, 0% 35%)`, 22×22px)
  - Wordmark "SOMA": Bricolage Grotesque 800/18px, letter-spacing -0.02em
  - Subtítulo "MEAT · CO": IBM Plex Mono 500/8px, letter-spacing 0.22em, color `#6B7280`
- **Nav links** (centro, gap 30px): Inter Tight 500/13px. Link activo color `#A81E2A` con border-bottom 2px del mismo color (padding-bottom 4px).
- **Derecha**: "Portal cliente" (texto plano) + CTA `Solicitar cotización →` rojo `#A81E2A`, padding 12×20, border-radius 8px, Inter Tight 600/13px, color blanco.

### 3. Hero — columna izquierda
Padding `52px 44px 0 56px`. Distribución vertical: contenido superior + row inferior con flex space-between.

**Eyebrow row** (gap 12, margin-bottom 28):
- Badge verde: `padding: 5px 10px`, `background: #DCFCE7`, `color: #15803D`, `border-radius: 4px`, IBM Plex Mono 600/10px, letter-spacing 0.12em, uppercase. Contenido: `✓ Inocuidad verificada`
- Texto: IBM Plex Mono 10–11px, letter-spacing 0.16em, color `#6B7280`, uppercase: `B2B · Retail · Foodservice`

**H1**:
- Bricolage Grotesque 700/84px, line-height 0.94, letter-spacing -0.04em
- `font-variation-settings: "opsz" 96`
- Color `#0F0F0F`
- Línea 2 ("procedencia"): **Fraunces serif itálico 400**, color `#A81E2A`, letter-spacing -0.02em
- Texto:
  ```
  Carne con
  procedencia    ← Fraunces italic, rojo
  que se documenta.
  ```

**Copy** (margin-top 28, max-width 480):
- Inter Tight 16px, line-height 1.55
- Primera frase color `#1F2024`; segunda frase color `#6B7280`:
  > "Producción, corte, empaque y maquila para autoservicio, retail y foodservice. Operación documentada lote a lote, planta TIF 422 desde 2014."

**CTAs** (gap 10, margin-top 32):
1. Primario: background `#0F0F0F`, color blanco, padding 14×22, border-radius 10, Inter Tight 600/14, "Solicitar cotización →"
2. Secundario: blanco con border `1px solid #D1D5DB`, padding 14×22, border-radius 10, Inter Tight 500/14, "Descargar ficha técnica ↓"

**Trust row** (border-top hairline, padding-top 22, gap 24, flex):
- Bloque "5 Especies" (label IBM Plex Mono 10px uppercase + texto Inter Tight 500/14): "Ovino · Caprino · Ternera · Porcino · Aviar"
- Divisor vertical 1px `#E5E7EB`
- 3 pills certificación: padding 6×10, border `1px solid #E5E7EB`, background `#FFFFFF`, border-radius 6, IBM Plex Mono 500/10px. Cada uno: `[✓ verde] TIF 422 / HACCP / KOSHER KC`

### 4. Hero — columna derecha (tarjeta modular)
Padding `32px 56px 0 24px`.

Tarjeta:
- Background `#FFFFFF`, border `1px solid #E5E7EB`, border-radius 14, overflow hidden
- Box-shadow `0 1px 2px rgba(0,0,0,0.04)`
- Grid interno: `grid-template-columns: 1fr 0.42fr` × `grid-template-rows: 1.3fr 1fr`

**Celda principal (gridRow 1/3)** — foto producto 3:4:
- Imagen real (foto de planta limpia o producto empacado) reemplaza el placeholder rayado
- **Sello TIF rectangular** (top-left 18px):
  - Background blanco, padding 10×14, border-radius 8, shadow sutil
  - Círculo rojo 36×36 con número "422" en Bricolage 700/14
  - Lado: "SAGARPA" (mono 9px, gris) + "Tipo Inspección Federal" (Bricolage 600/13)
- **Lote pill** (top-right 20px): blanco, padding 6×10, border-radius 999, shadow. Contenido: `[● verde 6px] LOTE · #SM-04221` (mono 500/10)
- **Caption inferior** (14px de los bordes): blanco, border-radius 8, padding 12×14, flex space-between:
  - Izquierda: "Recepción · Validación" (mono 9px gris) + "Corte primario inspeccionado" (Inter 600/13)
  - Derecha: badge verde `padding 4×8`, `background #DCFCE7`, `color #15803D`, border-radius 4, mono 600/9: `✓ APROBADO`

**Celda top-right** — foto empaque 1:1 (placeholder con label "EMPAQUE · 1:1")

**Celda bottom-right** — módulo datos en vivo:
- Background `#F7F7F5`, border-top + border-left `1px solid #E5E7EB`
- Padding 16×18, gap 8
- Header: `[● verde 5px] Monitoreo` en mono 600/9, color `#15803D`, letter-spacing 0.18em
- 2 métricas (margin-bottom 8 cada una):
  - Label mono 9px gris uppercase
  - Valor Bricolage 600/22, letter-spacing -0.02em
  - Datos: `Temp. cámara / −2.4°C` y `pH canal / 5.6`
- Footer: mono 9px gris, border-top hairline, padding-top 8: `Aud. 2026.03 · 0 NC`

### 5. Stats bar
- Posición bottom 0, height 168px
- Background `#FFFFFF`, border-top hairline
- Grid `auto 1fr 1fr 1fr 1fr`

**Celda label** (min-width 260, padding 26×30):
- Background `#0F0F0F`, color blanco
- Header: mono 600/10 letter-spacing 0.22em, color `#FCA5A5` (rojo claro): `— Capacidad diaria`
- Título: Bricolage 600/24, line-height 1.05, letter-spacing -0.02em: `Volumen / verificable.`

**Cada stat** (padding 26×26, border-right hairline excepto el último):
- Header: mono 10px letter-spacing 0.18em uppercase, gris, space-between:
  - Izq: `0X / 4`
  - Der: `● live` color verde `#15803D`
- Cifra: Bricolage 700/64, line-height 0.9, letter-spacing -0.04em + unidad Bricolage 500/18 color gris
- Label inferior: Inter 500/12 color `#1F2024`

Datos:
1. `21 ton` — Maquila combos / día
2. `15 ton` — Congelación / día
3. `150 cab` — Cámara canales / día
4. `5 sp.` — Especies procesadas

---

## Interactions & Behavior

- **CTAs primarios** (`Solicitar cotización` × 2): abren modal o navegan a `/cotizacion` con form (volumen estimado, especie, ubicación, contacto, mensaje).
- **CTA secundario** (`Descargar ficha técnica`): descarga PDF estático con specs de planta.
- **Pills certificación**: hover → tooltip con descripción + año emisión. Click → modal con certificado escaneado.
- **Datos en vivo** (`Temp. cámara`, `pH canal`, `LOTE #SM-...`):
  - Idealmente: endpoint `/api/operations/status` con polling cada 60s vía Alpine `x-init`/`setInterval` o Livewire poll.
  - Si no hay infra: valores estáticos con timestamp "Última lectura: HH:MM".
  - El indicador `●` (verde, dot 5–6px) debe pulsar suavemente (CSS animation `opacity 0.6 → 1`, 2s ease-in-out infinite alternate).
- **Hover sobre stats**: ligero highlight (background `#FAFAFA`).
- **Status pill `LOTE #SM-04221`**: click → modal trazabilidad (origen → recepción → sacrificio → corte → empaque → embarque).
- **Nav activo**: el link de la página actual con underline rojo y color rojo. Para una SPA Livewire, computar con `request()->routeIs('servicios')` o equivalente.

## State Management

Si se conecta a datos reales (Laravel + Eloquent):

```php
// app/Http/Controllers/HomeController.php
public function index() {
    return view('home', [
        'operationStatus' => OperationStatus::current(),
        'liveMetrics' => Metric::latest()->first(),
        'lastAudit' => Audit::latest()->first(),
        'capacities' => Capacity::current(),
    ]);
}
```

Vista Blade puede consumir estos directamente y un componente Alpine refrescar los `liveMetrics` cada 60s.

---

## Design Tokens

### Colores (agregar a `tailwind.config.js`)

```js
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        soma: {
          red:    '#A81E2A',  // logo principal — acentos, CTA
          'red-dark':   '#7A1219',
          'red-deep':   '#5C0E15',
          ink:    '#0F0F0F',  // texto primario
          'ink-soft': '#1F2024',
          mute:   '#6B7280',  // texto terciario
          bg:     '#FCFCFB',  // fondo principal
          'bg-soft': '#F7F7F5', // superficie elevada
          hair:   '#E5E7EB',  // hairline
          'hair-strong': '#D1D5DB',
          green:  '#15803D',  // verificación
          'green-soft': '#DCFCE7',
        },
      },
      fontFamily: {
        display: ['"Bricolage Grotesque"', 'system-ui', 'sans-serif'],
        body:    ['"Inter Tight"', 'system-ui', 'sans-serif'],
        serif:   ['Fraunces', 'Georgia', 'serif'],
        mono:    ['"IBM Plex Mono"', 'ui-monospace', 'monospace'],
      },
    },
  },
};
```

### Google Fonts

En `resources/views/layouts/app.blade.php`, dentro del `<head>`:

```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,500;12..96,600;12..96,700;12..96,800&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;1,9..144,400;1,9..144,500&family=IBM+Plex+Mono:wght@400;500;600&family=Inter+Tight:wght@400;500;600;700&display=swap" rel="stylesheet">
```

### Escala tipográfica clave

| Uso | Familia | Size | Weight | LH | LS |
|---|---|---|---|---|---|
| H1 hero | Bricolage Grotesque | 84px | 700 | 0.94 | -0.04em |
| H1 acento itálico | Fraunces italic | 84px | 400 | 0.94 | -0.02em |
| Stats cifra | Bricolage Grotesque | 64px | 700 | 0.9 | -0.04em |
| Stats unidad | Bricolage Grotesque | 18px | 500 | — | -0.02em |
| Body / copy | Inter Tight | 16px | 400 | 1.55 | — |
| Datos vivos valor | Bricolage Grotesque | 22px | 600 | 1 | -0.02em |
| Logo SOMA | Bricolage Grotesque | 18px | 800 | 1 | -0.02em |
| Nav | Inter Tight | 13px | 500 | — | 0.01em |
| CTA | Inter Tight | 13–14px | 600 | — | 0.01em |
| Eyebrow / mono | IBM Plex Mono | 10–11px | 500–600 | — | 0.14–0.22em uppercase |

### Espaciados / radios / sombras

```js
// tailwind.config.js extras
borderRadius: {
  'pill': '999px',  // CTAs en módulos especiales
},
boxShadow: {
  'card':  '0 1px 2px rgba(0,0,0,0.04)',
  'badge': '0 1px 2px rgba(0,0,0,0.06)',
  'sticker':'0 2px 4px rgba(0,0,0,0.08)',
},
```

Border-radius usados:
- `4px` — badges pequeños
- `6px` — pills certificación, status pills
- `8px` — CTA primario/secundario, sello TIF, dots con padding
- `10px` — botones
- `14px` — tarjeta modular hero

---

## Sugerencia de estructura Blade

```
resources/views/
├── layouts/
│   └── app.blade.php           # head + fonts + nav + footer slot
├── components/
│   ├── soma-logo.blade.php
│   ├── nav.blade.php
│   ├── utility-bar.blade.php
│   ├── cert-pill.blade.php     # <x-cert-pill name="TIF 422" />
│   ├── stat-card.blade.php     # <x-stat-card val="21" unit="ton" label="..." />
│   └── tif-seal.blade.php
└── home.blade.php              # arma top-bar + nav + hero + stats
```

Componentes Alpine útiles:
- `<div x-data="{ pulse: true }">` para el dot live (CSS keyframes hace el trabajo).
- `<div x-data x-init="setInterval(() => $wire.refreshMetrics(), 60000)">` para refresh Livewire de datos vivos.

---

## Assets necesarios (no incluidos)

- `logo-soma.svg` — versión vectorizada del logo (círculo rojo + glifo + wordmark). Reemplazar el componente `MxLogo` por este SVG embedido vía `<x-soma-logo />`.
- `hero-corte-empacado.jpg` — foto producto/planta para columna derecha (3:4, idealmente corte empacado limpio o área de trabajo en planta)
- `hero-empaque.jpg` — foto producto empacado (1:1)
- Iconos: usar [Heroicons](https://heroicons.com) o [Lucide](https://lucide.dev) para flechas (→ ↓ ↗ ✓). El mockup usa caracteres Unicode pero se pueden reemplazar.

## Files (en este bundle)

- `Soma Meat Rediseno.html` — shell principal
- `direction-mix-v2.jsx` — **componente principal `DirectionMixV2`** (este es el diseño elegido)
- `design-canvas.jsx` — wrapper de presentación (no usar en producción)
- `app.jsx` — entry React (no usar en producción)

**Para implementar:** abrir `direction-mix-v2.jsx` en Claude Code y traducir cada sección a Blade + Tailwind. Los estilos inline mapean directamente a clases Tailwind (la mayoría) o utilities personalizadas. Mantener exactamente: paleta, escala tipográfica, jerarquía, espaciados.

---

## Prompt sugerido para Claude Code

```
Lee design_handoff_soma_v2/README.md e implementa el Hero descrito en mi
proyecto Laravel. El componente de referencia es direction-mix-v2.jsx →
DirectionMixV2.

Stack: Laravel + Blade + Tailwind CSS + Alpine.js. Asume Vite ya
configurado.

Pasos:
1. Añade los tokens de color y fuentes a tailwind.config.js (sección
   Design Tokens del README).
2. Importa Google Fonts en el layout principal.
3. Crea componentes Blade reutilizables: x-soma-logo, x-nav, x-utility-bar,
   x-cert-pill, x-stat-card, x-tif-seal.
4. Arma resources/views/home.blade.php con: top utility bar + nav + hero
   (2 cols) + stats bar.
5. Implementa pulse del dot "live" con CSS keyframes.
6. Datos en vivo: por ahora estáticos con timestamp "Última lectura: 14:32".
   Deja TODO comentado para conectar a /api/operations/status después.
7. CTAs primarios apuntan a route('cotizacion') (placeholder); secundario
   descarga /storage/ficha-tecnica.pdf (placeholder).

Los archivos HTML/JSX del bundle son referencia visual, no copies código
directo. Usa los patrones de mi codebase Laravel.
```
