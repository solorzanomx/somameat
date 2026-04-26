# Soma Meat Co. — Sistema de Diseño

**Versión:** 1.0
**Fecha:** Abril 2026
**Alcance:** Sitio público (frontend), portal de clientes B2B y panel de administración (backend)
**Autor:** Lineamientos preparados para Alex / Soma Meat Co.

---

## 1. Filosofía de marca

Soma Meat Co. no es una carnicería. Es una **industria cárnica con estándar de exportación** que provee a food service, distribuidores, retail premium y mercados internacionales bajo certificaciones TIF, HACCP, Kosher y Halal.

El diseño debe transmitir tres atributos en este orden:

1. **Rigor industrial.** Procesos serios, trazabilidad, sanidad, escala.
2. **Sofisticación gastronómica.** Producto premium, cultura del corte, respeto al ingrediente.
3. **Confianza B2B.** Documentación, certificaciones, soporte profesional, logística.

El error a evitar es caer en estética de carnicería de barrio (rojo brillante, tipografías con cuchillos, fondos de madera rústica). Soma debe parecerse más a una bodega de vino premium, a una marca de aceite de oliva DOP o a una gastronomía de autor que a un local de mercado.

### Principios de diseño

- **Premium sin gritar.** Lujo discreto, mucho aire, mucha respiración.
- **Evidencia sobre adjetivos.** Cada afirmación de calidad va respaldada por un sello, un dato o una imagen del proceso.
- **Trazabilidad visible.** El usuario debe poder seguir mentalmente el camino de la carne, del hato a su cocina.
- **Bilingüe nativo.** Español e inglés con paridad de calidad. El mercado de exportación lo exige.
- **Función sobre adorno.** Cero animaciones decorativas. Todo movimiento debe comunicar.

---

## 2. Logotipo y uso

### Decisión de evolución (refresh quirúrgico)

Se conserva la silueta del icono (corte tipo ribeye con S cursiva interior) y la estructura del wordmark "SOMA + Meat Co." porque el icono es un activo de marca real y memorable. Dos cambios puntuales:

1. **Rojo del icono profundizado** de carmín brillante (`#C8302E`) a vino tinto joven (`#A0252A`). Sube el techo premium sin romper reconocimiento. El stroke café (`#3A1E18`) y la S crema se mantienen.
2. **Descriptor "MEAT CO" sube contraste** de gris claro (`#A6A29B`) a gris medio (`#6B6863`) para cumplir WCAG AA sobre fondos blancos. Alternativamente puede ir en cobre `#B8743A` cuando se busca énfasis editorial.

### Reglas generales

- **Área de protección:** equivalente a la altura de la "S" del wordmark alrededor del logo completo. Nada debe invadir ese espacio.
- **Tamaño mínimo:** 24 px de alto en digital, 15 mm en impresión.
- **Fondos permitidos:** Blanco hueso (`#FAFAF8`), Crema (`#F4EFE6`), Carbón (`#1C1A18`), Borgoña (`#6B1F2A`) y blanco puro.
- **Fondos prohibidos:** fotografías sin tratamiento, gradientes saturados, rojos genéricos, texturas de madera rústica, verde brillante.
- **Versiones requeridas:**
  - Horizontal a color (default).
  - Apilado a color (icono arriba + wordmark debajo) — para fachada, empaque, footer.
  - Monocromo carbón sobre fondos claros.
  - Monocromo crema sobre fondos oscuros (icono se invierte: stroke crema, fill crema con S carbón).
  - Solo isotipo (sin wordmark) para favicon, app icon, avatares y firmas pequeñas.

### Construcción visual

El logotipo se acompaña siempre, en aplicaciones formales (fichas técnicas, tarjetas, firma de email, footer del sitio), de la *firma institucional* en una sola línea bajo el logo:

> **Soma Meat Co.** — Industria cárnica certificada TIF · HACCP · Kosher · Halal

---

## 3. Paleta de colores

### 3.1 Frontend (sitio público / marca)

Inspirada en el universo gastronómico premium y la limpieza clínica de la sala de proceso: vino tinto joven, sebo, cobre del sellado Maillard, madera quemada y blanco quirúrgico de planta TIF.

#### Marca y acción

| Token | Nombre | HEX | RGB | Uso principal |
|---|---|---|---|---|
| `--color-primary` | Rojo Soma | `#A0252A` | 160, 37, 42 | Marca, CTAs primarios, énfasis. Refresh del rojo histórico del logo, profundizado para sumar premium sin perder reconocimiento. |
| `--color-primary-dark` | Borgoña Profunda | `#6B1F2A` | 107, 31, 42 | Hover de CTA primario, footer, títulos de impacto |
| `--color-brown` | Café Wordmark | `#3A1E18` | 58, 30, 24 | Color del wordmark "SOMA". Heredado del logo. Apto para títulos secundarios. |
| `--color-ink` | Carbón Madera | `#1C1A18` | 28, 26, 24 | Texto principal, secciones de autoridad industrial |

#### Acentos

| Token | Nombre | HEX | RGB | Uso |
|---|---|---|---|---|
| `--color-accent-warm` | Cobre Maillard | `#B8743A` | 184, 116, 58 | Hover, íconos, sellos, dorado controlado, números de stats |
| `--color-accent-cool` | Verde Empaque | `#2E5147` | 46, 81, 71 | Certificaciones, sustentabilidad, exportación, badges de éxito |

#### Fondos

La estrategia es alternar tres notas que cuentan una historia visual: limpieza → calidez → autoridad.

| Token | Nombre | HEX | Uso |
|---|---|---|---|
| `--color-bg` | Blanco Hueso | `#FAFAF8` | **Base dominante.** Hero, contenido editorial, formularios. Comunica higiene de sala de proceso. |
| `--color-bg-warm` | Crema Cálida | `#F4EFE6` | Secciones puntuales de calidez premium (servicios, casos, testimonios) para no caer en frigorífico frío. |
| `--color-bg-cool` | Gris Perla | `#F2F2EE` | Fondos de soporte (documentación, panel de cliente en modo claro). |
| `--color-ink` | Carbón Madera | `#1C1A18` | Franjas de drama industrial: certificaciones, stats, footer. |
| `#FFFFFF` | Blanco Puro | `#FFFFFF` | Tarjetas elevadas sobre crema o gris perla. |

#### Texto y soporte

| Token | Nombre | HEX | Uso |
|---|---|---|---|
| `--color-ink-soft` | Gris Medio | `#6B6863` | Texto secundario, captions, descriptor "MEAT CO" sobre fondos claros |
| `--color-line` | Línea Sutil | `#E8E5DD` | Bordes de tarjetas, divisores |
| `--color-line-soft` | Línea Suave | `#EFECE5` | Separadores muy sutiles |
| `--color-cream` | Crema Wordmark | `#F4EFE6` | Texto sobre fondos oscuros |

### 3.2 Backend (admin y portal de cliente)

Aquí prima la legibilidad de datos, la baja fatiga visual en sesiones largas y la jerarquía clara. Soporta modo claro y modo oscuro.

#### Modo oscuro (default para admins)

| Token | HEX | Uso |
|---|---|---|
| `--bg-base` | `#0F1115` | Fondo de aplicación |
| `--bg-surface` | `#1A1D24` | Tarjetas, paneles |
| `--bg-surface-elevated` | `#222630` | Modales, popovers, dropdowns |
| `--bg-hover` | `#2A2F3A` | Hover de filas y botones |
| `--border` | `#2A2F38` | Bordes de tarjetas, divisores |
| `--border-strong` | `#3A4150` | Bordes de inputs activos |
| `--text-primary` | `#E8E5DF` | Texto principal |
| `--text-secondary` | `#9FA3AB` | Texto secundario, labels |
| `--text-muted` | `#6B7080` | Placeholders, metadatos |

#### Modo claro (default para clientes)

| Token | HEX | Uso |
|---|---|---|
| `--bg-base` | `#FAFAF7` | Fondo de aplicación |
| `--bg-surface` | `#FFFFFF` | Tarjetas, paneles |
| `--bg-surface-elevated` | `#FFFFFF` con sombra | Modales |
| `--bg-hover` | `#F2EFE8` | Hover de filas |
| `--border` | `#E5E2DB` | Bordes de tarjetas |
| `--border-strong` | `#C8C3B7` | Bordes de inputs activos |
| `--text-primary` | `#1C1A18` | Texto principal |
| `--text-secondary` | `#5A5750` | Texto secundario |
| `--text-muted` | `#8A847C` | Placeholders, metadatos |

#### Semánticos (válidos en ambos modos, ajustar luminosidad por tema)

| Token | HEX claro | HEX oscuro | Uso |
|---|---|---|---|
| `--color-action` | `#6B1F2A` | `#A33545` | Botón primario, links |
| `--color-success` | `#2E5147` | `#4A8474` | Aprobado, entregado, OK |
| `--color-warning` | `#C8902F` | `#E0A847` | Pendiente, por revisar |
| `--color-danger` | `#A33327` | `#D14C3F` | Error, rechazo, cancelado |
| `--color-info` | `#3F6B7F` | `#5C95B0` | Notificación neutra |

### 3.3 Reglas de uso del color

- El **borgoña** nunca cubre más del 30% de una pantalla. Es acento, no fondo dominante.
- El **cobre Maillard** se reserva para destacar certificaciones, premios, métricas de orgullo y hovers. Si se usa en exceso pierde su valor.
- El **verde empaque** vive en sellos, badges de exportación, indicadores de éxito. Nunca en CTAs primarios.
- En backend, los colores semánticos solo aparecen cuando hay un estado real. No decorativos.
- Contraste mínimo: AA (4.5:1) para texto cuerpo, AAA (7:1) en datos críticos del backend.

---

## 4. Tipografía

### Familias

- **Display / Títulos:** *GT Sectra*, *Saol Display* o *Canela*. Si no hay presupuesto, fallback a *Cormorant Garamond* (Google Fonts). Serif contemporánea, carácter editorial.
- **Cuerpo / UI:** *Inter*, *Söhne* o *Aktiv Grotesk*. Fallback a *Inter* (Google Fonts). Sans neutra, optimizada para pantalla.
- **Mono / Datos técnicos:** *JetBrains Mono* o *IBM Plex Mono*. Para SKUs, lotes, números de TIF, fechas de caducidad.

### Escala tipográfica (frontend)

| Token | Tamaño | Line-height | Peso | Uso |
|---|---|---|---|---|
| `--text-display` | 72px / 4.5rem | 1.05 | 400 (serif) | Hero principal |
| `--text-h1` | 56px / 3.5rem | 1.1 | 400 (serif) | Títulos de página |
| `--text-h2` | 40px / 2.5rem | 1.15 | 400 (serif) | Secciones |
| `--text-h3` | 28px / 1.75rem | 1.25 | 500 (sans) | Subsecciones |
| `--text-h4` | 20px / 1.25rem | 1.3 | 600 (sans) | Tarjetas |
| `--text-body-lg` | 18px / 1.125rem | 1.6 | 400 (sans) | Párrafos hero |
| `--text-body` | 16px / 1rem | 1.6 | 400 (sans) | Cuerpo estándar |
| `--text-body-sm` | 14px / 0.875rem | 1.5 | 400 (sans) | Captions, metadata |
| `--text-overline` | 12px / 0.75rem | 1.4 | 600 (sans) | Etiquetas, uppercase + tracking 0.08em |

### Escala tipográfica (backend)

Más densa, optimizada para tablas y datos.

| Token | Tamaño | Line-height | Peso | Uso |
|---|---|---|---|---|
| `--ui-h1` | 24px | 1.3 | 600 (sans) | Título de vista |
| `--ui-h2` | 18px | 1.4 | 600 (sans) | Secciones de panel |
| `--ui-h3` | 14px | 1.4 | 600 (sans) | Cards |
| `--ui-body` | 14px | 1.5 | 400 (sans) | Texto estándar |
| `--ui-sm` | 13px | 1.45 | 400 (sans) | Tablas, formularios |
| `--ui-xs` | 12px | 1.4 | 500 (sans) | Labels, badges |
| `--ui-mono` | 13px | 1.4 | 400 (mono) | Lotes, SKUs, fechas |

### Reglas tipográficas

- Los títulos serif van en **borgoña** o **carbón**, nunca en colores acento.
- Tracking ligeramente negativo en displays (`-0.02em`) para densidad editorial.
- Mayúsculas solo en `overline` y badges (máx. 14 caracteres).
- Cuerpo nunca por debajo de 14px en frontend, nunca por debajo de 13px en backend.
- Numerales tabulares (`font-variant-numeric: tabular-nums`) en cualquier tabla con cifras.

---

## 5. Espaciado, grilla y radios

### Sistema de espaciado (base 4px)

`4 · 8 · 12 · 16 · 24 · 32 · 48 · 64 · 96 · 128`

Tokens: `--space-1` = 4px, `--space-2` = 8px… `--space-12` = 128px.

### Grilla

- **Frontend:** 12 columnas, max-width `1280px`, gutter 24px, márgenes laterales fluidos (clamp 24px → 80px).
- **Backend:** sidebar fija 240px (colapsable a 64px) + contenido fluido con max-width `1440px` para vistas de tabla y `960px` para vistas de detalle/formulario.

### Radios

| Token | Valor | Uso |
|---|---|---|
| `--radius-sm` | 4px | Inputs, badges |
| `--radius-md` | 8px | Botones, tarjetas pequeñas |
| `--radius-lg` | 12px | Tarjetas, modales |
| `--radius-xl` | 20px | Hero cards, contenedores destacados |
| `--radius-full` | 9999px | Pills, avatares |

### Sombras

| Token | Valor | Uso |
|---|---|---|
| `--shadow-sm` | `0 1px 2px rgba(28,26,24,0.06)` | Inputs, separación sutil |
| `--shadow-md` | `0 4px 12px rgba(28,26,24,0.08)` | Tarjetas elevadas |
| `--shadow-lg` | `0 12px 32px rgba(28,26,24,0.12)` | Modales, popovers |
| `--shadow-focus` | `0 0 0 3px rgba(107,31,42,0.25)` | Estado focus accesible |

---

## 6. Componentes — Frontend

### Botones

| Variante | Background | Texto | Borde | Hover |
|---|---|---|---|---|
| Primario | `#6B1F2A` | `#F4EFE6` | — | bg `#4A1219` |
| Secundario | transparente | `#1C1A18` | `1px #1C1A18` | bg `#1C1A18`, texto `#F4EFE6` |
| Ghost | transparente | `#6B1F2A` | — | bg `rgba(107,31,42,0.08)` |
| Cobre (acento) | `#B8743A` | `#F4EFE6` | — | bg `#9A5F2D` |

Padding: `14px 24px` (lg), `10px 18px` (md), `8px 14px` (sm). Radio `--radius-md`. Tipografía sans 600. Sin uppercase salvo en CTAs muy cortos.

### Tarjeta de producto / corte

- Imagen 4:3 con tratamiento de claroscuro.
- Overline cobre con categoría (`RES · PREMIUM`).
- Título serif H4.
- Descripción 2 líneas máx.
- Metadatos mono: rendimiento, calibre, presentación.
- Botón ghost "Ver ficha técnica" + ícono download.

### Sello de certificación

Pill horizontal, fondo `--color-bg-alt`, borde 1px `--color-line`, ícono cobre + texto sans 600. Cuatro sellos (TIF, HACCP, Kosher, Halal) viven juntos en una franja above-the-fold.

### Hero

- Video silencioso loop o imagen estática editorial.
- Overlay gradient `rgba(28,26,24,0.55)` → `transparent`.
- Headline display serif blanco/hueso.
- Subhead body-lg.
- Dos CTAs lado a lado: primario borgoña + secundario outline.

### Formulario de contacto B2B

Campos requeridos: nombre, empresa, RFC opcional, país, canal (food service / industria / exportación / otro), volumen mensual estimado, mensaje. Multi-step si supera 6 campos. Confirmación con mensaje claro y siguiente paso ("Te contactamos en menos de 24h hábiles").

---

## 7. Componentes — Backend (Admin y Cliente)

### Layout base

```
┌──────────────────────────────────────────────┐
│ Topbar 56px — logo · breadcrumb · user · ⚙ │
├──────┬───────────────────────────────────────┤
│      │                                       │
│ Side │  Contenido — max 1440px               │
│ 240  │  Padding 32px                         │
│ px   │                                       │
│      │                                       │
└──────┴───────────────────────────────────────┘
```

### Sidebar

- Logo isotipo arriba.
- Grupos colapsables con overline en `--text-muted`.
- Items: ícono 20px + label 14px. Estado activo: fondo `--bg-hover`, borde izquierdo 3px borgoña, texto `--text-primary`.
- Footer del sidebar: avatar usuario + nombre + rol + menú.

### Tablas de datos

- Encabezado sticky, fondo `--bg-surface`, texto uppercase 12px tracking 0.08em.
- Filas alternas no — usar separadores 1px `--border`.
- Hover de fila: `--bg-hover`.
- Numerales tabulares.
- Acciones por fila en menú "..." al final, no botones expuestos.
- Filtros arriba en chips, búsqueda global con `Cmd+K`.

### Estados (badges)

| Estado | Background | Texto |
|---|---|---|
| Aprobado / Entregado | `rgba(46,81,71,0.15)` | `#4A8474` |
| Pendiente | `rgba(200,144,47,0.15)` | `#E0A847` |
| En tránsito | `rgba(63,107,127,0.15)` | `#5C95B0` |
| Rechazado / Cancelado | `rgba(163,51,39,0.15)` | `#D14C3F` |

Pill, padding `4px 10px`, radio full, sans 12px peso 600.

### Formularios

- Label arriba, 12px peso 600 uppercase tracking 0.06em.
- Input altura 40px, padding `10px 12px`, borde 1px `--border-strong`, radio `--radius-sm`.
- Focus: borde borgoña + sombra `--shadow-focus`.
- Helper text 12px `--text-muted` debajo.
- Error: borde `--color-danger` + ícono + texto rojo.
- Validación inline al `blur`, no al `change`.

### Empty states

Ilustración monocromática (no foto) + título H3 + descripción + CTA. Tono honesto, no infantil ("Aún no hay pedidos en este rango. Cuando los haya, aparecerán aquí.").

---

## 8. Iconografía

- **Set base:** Lucide o Phosphor (regular weight). Tamaño UI 20px, content 24px.
- **Custom:** crear set propio para certificaciones (TIF, HACCP, Kosher, Halal), tipos de corte (res, cerdo, ave, cordero), procesos (maquila, empaque al vacío, congelado IQF) y logística (refrigerado, exportación, pallet).
- **Estilo:** stroke 1.5px, esquinas suaves, sin relleno salvo en estados activos.
- **Color:** carbón en reposo, borgoña en activo, cobre en énfasis.

---

## 9. Fotografía y dirección de arte

### Tres ejes obligatorios

1. **Producto.** Cortes sobre tabla de mármol oscuro o pizarra, iluminación lateral cálida, fondo `--color-ink`. Mínimo 3 ángulos por SKU.
2. **Proceso.** Planta TIF, cuartos fríos, personal con EPP completo, manos trabajando en plano cerrado, máquinas industriales con detalle. Tono levemente desaturado, contraste medio-alto.
3. **Personas.** Maestro carnicero, equipo de calidad, gerente de planta. Retratos editoriales, mirada al lente o concentración en el oficio.

### Tratamiento

- LUT consistente: leve cálido, blacks profundos, highlights controlados.
- Cero filtros de redes, cero HDR exagerado.
- Aspect ratios estandarizados: 4:3 producto, 16:9 hero, 3:4 retrato, 1:1 redes.
- Prohibido stock genérico.

---

## 10. Microcopy y voz

### Tono

- Profesional, preciso, con cultura gastronómica.
- Datos antes que adjetivos.
- Bilingüe paritario.

### Ejemplos

| Contexto | Mal | Bien |
|---|---|---|
| CTA principal | "Conócenos" | "Solicita ficha técnica" |
| Hero | "La mejor carne de México" | "Carne mexicana con estándar de exportación" |
| Sello | "Calidad garantizada" | "Certificación TIF SAGARPA-SENASICA vigente" |
| Confirmación | "¡Gracias!" | "Recibimos tu solicitud. Un ejecutivo te contactará en menos de 24h hábiles." |
| Error backend | "Algo salió mal" | "No pudimos procesar el pedido #4521. Reintenta o escribe a soporte." |

### Glosario controlado

Usar siempre los mismos términos: *corte*, *canal*, *rendimiento*, *calibre*, *maquila*, *empaque al vacío*, *cadena de frío*, *trazabilidad*, *food service*, *HORECA*, *exportación*. Nunca "carnita", "cachito", "rico" en contexto B2B.

---

## 11. Accesibilidad

- Contraste WCAG AA mínimo, AAA en datos críticos.
- Foco visible en todos los elementos interactivos (`--shadow-focus`).
- Navegación 100% por teclado en backend.
- `prefers-reduced-motion` respetado: animaciones máx. 200ms, sin parallax si está activo.
- Alt text descriptivo en toda imagen de producto y proceso.
- Formularios con labels asociados, mensajes de error vinculados con `aria-describedby`.
- Tablas con `<th scope>` y captions.
- Modo oscuro y modo claro completos en backend.

---

## 12. Responsive

### Breakpoints

| Token | Min-width | Uso |
|---|---|---|
| `sm` | 640px | Móvil grande |
| `md` | 768px | Tablet |
| `lg` | 1024px | Desktop |
| `xl` | 1280px | Desktop amplio |
| `2xl` | 1536px | Pantallas grandes |

### Reglas

- Mobile-first.
- Sidebar del backend colapsa a drawer en `< md`.
- Tablas en backend se convierten en cards apiladas en `< md`.
- Hero pasa de display 72px a 40px en mobile.
- CTAs touch-friendly: mínimo 44x44px de área interactiva.

---

## 13. Animación y movimiento

- Easing default: `cubic-bezier(0.22, 1, 0.36, 1)` (ease-out suave).
- Duración: 150ms (micro), 250ms (estándar), 400ms (transiciones de página).
- Hover de botón: solo cambio de color, sin scale.
- Aparición de modales: fade + 8px de translate-y.
- Hero: opcional fade-in del headline a 600ms con leve translate-up.
- Cero auto-play de carruseles. Cero scroll hijack.

---

## 14. Tokens — Resumen para implementación

```css
:root {
  /* Marca y acción */
  --color-primary: #A0252A;        /* Rojo Soma — refresh del logo */
  --color-primary-dark: #6B1F2A;   /* Borgoña Profunda — hover, footer */
  --color-brown: #3A1E18;          /* Café wordmark — heredado del logo */
  --color-ink: #1C1A18;            /* Carbón — texto y secciones de autoridad */

  /* Fondos (alternancia: limpieza → calidez → autoridad) */
  --color-bg: #FAFAF8;             /* Blanco hueso — base dominante */
  --color-bg-warm: #F4EFE6;        /* Crema cálida — secciones de calidez */
  --color-bg-cool: #F2F2EE;        /* Gris perla — soporte */

  /* Acentos */
  --color-accent-warm: #B8743A;    /* Cobre Maillard */
  --color-accent-cool: #2E5147;    /* Verde Empaque */

  /* Texto y soporte */
  --color-ink-soft: #6B6863;
  --color-line: #E8E5DD;
  --color-line-soft: #EFECE5;
  --color-cream: #F4EFE6;

  /* Tipografía */
  --font-display: 'GT Sectra', 'Cormorant Garamond', Georgia, serif;
  --font-body: 'Inter', -apple-system, system-ui, sans-serif;
  --font-mono: 'JetBrains Mono', 'IBM Plex Mono', monospace;

  /* Espaciado */
  --space-1: 4px;  --space-2: 8px;  --space-3: 12px;
  --space-4: 16px; --space-5: 24px; --space-6: 32px;
  --space-7: 48px; --space-8: 64px; --space-9: 96px; --space-10: 128px;

  /* Radios */
  --radius-sm: 4px; --radius-md: 8px; --radius-lg: 12px;
  --radius-xl: 20px; --radius-full: 9999px;

  /* Sombras */
  --shadow-sm: 0 1px 2px rgba(28,26,24,0.06);
  --shadow-md: 0 4px 12px rgba(28,26,24,0.08);
  --shadow-lg: 0 12px 32px rgba(28,26,24,0.12);
  --shadow-focus: 0 0 0 3px rgba(107,31,42,0.25);
}

[data-theme="dark"] {
  --bg-base: #0F1115;
  --bg-surface: #1A1D24;
  --bg-surface-elevated: #222630;
  --bg-hover: #2A2F3A;
  --border: #2A2F38;
  --border-strong: #3A4150;
  --text-primary: #E8E5DF;
  --text-secondary: #9FA3AB;
  --text-muted: #6B7080;
}

[data-theme="light"] {
  --bg-base: #FAFAF7;
  --bg-surface: #FFFFFF;
  --bg-surface-elevated: #FFFFFF;
  --bg-hover: #F2EFE8;
  --border: #E5E2DB;
  --border-strong: #C8C3B7;
  --text-primary: #1C1A18;
  --text-secondary: #5A5750;
  --text-muted: #8A847C;
}
```

---

## 15. Roadmap de implementación sugerido

**Fase 1 — Identidad y bases (semanas 1-2)**
Auditoría de marca actual. Cierre de paleta y tipografía. Diseño de logotipo si requiere refresh. Sesión fotográfica de planta y producto.

**Fase 2 — Frontend (semanas 3-6)**
Wireframes y prototipo en Figma. Diseño visual de home, producto, maquila, calidad, contacto. Build en Next.js o Astro con CMS headless (Sanity o Strapi). Versión ES/EN.

**Fase 3 — Portal de cliente (semanas 5-9)**
Catálogo con precios por cliente. Pedidos. Descarga de fichas técnicas y certificados sanitarios por embarque. Historial. Notificaciones.

**Fase 4 — Backend admin (semanas 7-11)**
Gestión de catálogo, clientes, pedidos, lotes, certificaciones, contenido del sitio. Roles y permisos.

**Fase 5 — Lanzamiento (semana 12)**
QA, performance (Core Web Vitals), SEO técnico, schema markup, analytics, soft launch interno, lanzamiento público con campaña en LinkedIn enfocada a compradores HORECA y de exportación.

---

*Este documento es un sistema vivo. Cualquier desviación debe documentarse y, si se repite, integrarse al sistema en una versión nueva.*
