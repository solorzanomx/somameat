<x-layouts.app>
    <x-slot name="seo">
        <x-seo
            title="Política de Cookies — Soma Meat Co"
            description="Política de cookies de Soma Meat Co. Información sobre el uso de cookies en somameat.com y cómo gestionarlas."
        />
    </x-slot>

    {{-- Hero --}}
    <section class="bg-ink pt-[106px] pb-16">
        <div class="container-soma pt-10">
            <div class="flex items-center gap-3 mb-5">
                <span class="w-6 h-px bg-copper" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">Legal</span>
            </div>
            <h1 class="font-display font-bold text-4xl md:text-5xl text-white leading-[1.0] tracking-[-0.03em] mb-4">Política de Cookies</h1>
            <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-white/40">Última actualización: {{ date('d') }} de {{ ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'][date('n')-1] }} de {{ date('Y') }}</p>
        </div>
    </section>

    {{-- Contenido --}}
    <section class="bg-bone py-16 md:py-20">
        <div class="container-soma">
            <div class="max-w-3xl mx-auto">
                <div class="space-y-10">

                    <div class="bg-white border border-line rounded-xl p-6 text-sm text-ink-mid leading-relaxed">
                        Esta Política de Cookies explica qué son las cookies, qué tipos utilizamos en <strong>somameat.com</strong> y cómo puede gestionarlas. Su uso continuado del sitio implica la aceptación de esta política.
                    </div>

                    @php
                    $sections = [
                        [
                            'title' => '1. ¿Qué son las cookies?',
                            'body'  => 'Las cookies son pequeños archivos de texto que se almacenan en su dispositivo (computadora, teléfono o tablet) cuando visita un sitio web. Permiten que el sitio recuerde sus preferencias y le ofrezca una mejor experiencia de navegación.<br><br>
                            Las cookies no contienen datos que permitan identificarle personalmente de forma directa, aunque en combinación con otros datos sí pueden considerarse datos personales conforme a la LFPDPPP.',
                        ],
                        [
                            'title' => '2. Tipos de cookies que utilizamos',
                            'body'  => null,
                            'table' => [
                                'headers' => ['Tipo', 'Nombre / Proveedor', 'Finalidad', 'Duración'],
                                'rows' => [
                                    ['Estrictamente necesarias', 'XSRF-TOKEN · laravel_session', 'Seguridad del formulario, sesión de usuario y portal de cliente. No requieren consentimiento.', 'Sesión / 2 h'],
                                    ['Preferencias', 'locale', 'Recordar el idioma seleccionado (ES / EN).', '1 año'],
                                    ['Analíticas', 'Plausible Analytics', 'Medición de tráfico y comportamiento en el sitio. Sin rastreo entre sitios. Sin cookies de identificación personal.', 'No persiste'],
                                    ['Funcionales', 'livewire_token', 'Soporte para formularios interactivos (Livewire). No contiene datos personales.', 'Sesión'],
                                ],
                            ],
                        ],
                        [
                            'title' => '3. Cookies de terceros',
                            'body'  => '<strong>Plausible Analytics</strong> — Utilizamos Plausible como herramienta de análisis web orientada a la privacidad. Plausible <strong>no utiliza cookies</strong> ni almacena información personal. No comparte datos con terceros ni realiza rastreo entre sitios. Es compatible con RGPD, CCPA y PECR sin necesidad de banner de cookies.<br><br>
                            <strong>Google Fonts</strong> — Cargamos tipografías desde los servidores de Google. Google puede registrar la solicitud de fuentes, lo que puede incluir su dirección IP. Consulte la <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" class="text-primary hover:underline">política de privacidad de Google</a>.',
                        ],
                        [
                            'title' => '4. Cookies estrictamente necesarias',
                            'body'  => 'Las cookies técnicas indispensables para el funcionamiento del sitio y del portal de cliente no requieren su consentimiento y no pueden desactivarse sin afectar la funcionalidad del servicio. Entre ellas:<br><br>
                            • <code class="bg-bone-soft px-1.5 py-0.5 rounded text-[12px] font-mono">laravel_session</code> — gestión de sesión de usuario.<br>
                            • <code class="bg-bone-soft px-1.5 py-0.5 rounded text-[12px] font-mono">XSRF-TOKEN</code> — protección contra ataques CSRF en formularios.',
                        ],
                        [
                            'title' => '5. Cómo gestionar y eliminar cookies',
                            'body'  => 'Puede configurar su navegador para rechazar o eliminar cookies en cualquier momento. A continuación los enlaces de configuración de los principales navegadores:<br><br>
                            • <a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener" class="text-primary hover:underline">Google Chrome</a><br>
                            • <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias" target="_blank" rel="noopener" class="text-primary hover:underline">Mozilla Firefox</a><br>
                            • <a href="https://support.apple.com/es-mx/guide/safari/sfri11471/mac" target="_blank" rel="noopener" class="text-primary hover:underline">Safari</a><br>
                            • <a href="https://support.microsoft.com/es-es/microsoft-edge/eliminar-las-cookies-en-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener" class="text-primary hover:underline">Microsoft Edge</a><br><br>
                            Tenga en cuenta que deshabilitar las cookies puede afectar la funcionalidad del portal de cliente y los formularios de contacto.',
                        ],
                        [
                            'title' => '6. Actualizaciones de esta política',
                            'body'  => 'Podemos actualizar esta Política de Cookies para reflejar cambios en el sitio o en la legislación aplicable. Le recomendamos revisarla periódicamente. La fecha de última actualización se indica al inicio del documento.',
                        ],
                        [
                            'title' => '7. Contacto',
                            'body'  => 'Para cualquier duda relacionada con el uso de cookies o el tratamiento de sus datos personales:<br><br>
                            <a href="mailto:contacto@somameat.com" class="text-primary hover:underline">contacto@somameat.com</a><br>
                            59 3127 2015 · Lun–Vie · 9:00–17:00 h',
                        ],
                    ];
                    @endphp

                    @foreach($sections as $s)
                    <div>
                        <h2 class="font-display font-bold text-xl text-ink mb-3 leading-snug">{{ $s['title'] }}</h2>
                        @if(isset($s['table']))
                        <div class="overflow-x-auto mt-3">
                            <table class="w-full text-sm border-collapse" aria-label="Tipos de cookies">
                                <thead>
                                    <tr class="bg-ink text-white">
                                        @foreach($s['table']['headers'] as $h)
                                        <th class="text-left py-3 px-4 font-mono text-[9px] tracking-[0.12em] uppercase font-medium">{{ $h }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($s['table']['rows'] as $i => $row)
                                    <tr class="{{ $i % 2 === 0 ? 'bg-white' : 'bg-bone' }}">
                                        @foreach($row as $cell)
                                        <td class="py-3 px-4 text-sm text-ink-mid border-b border-line align-top leading-relaxed">{{ $cell }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-sm text-ink-mid leading-relaxed">{!! $s['body'] !!}</p>
                        @endif
                    </div>
                    @endforeach

                </div>

                {{-- Back --}}
                <div class="mt-14 pt-8 border-t border-line flex items-center gap-6">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 font-sans text-sm font-medium text-primary hover:text-primary-dark transition-colors">
                        <svg class="w-4 h-4 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        Volver al inicio
                    </a>
                    <a href="{{ route('legal.privacy') }}" class="text-sm text-mute hover:text-ink transition-colors">Aviso de privacidad</a>
                    <a href="{{ route('legal.terms') }}" class="text-sm text-mute hover:text-ink transition-colors">Términos y condiciones</a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
