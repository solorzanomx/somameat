<x-layouts.app>
    <x-slot name="seo">
        <x-seo
            title="Términos y Condiciones — Soma Meat Co"
            description="Términos y condiciones de uso del sitio web y servicios de Soma Meat Co, proveedor cárnico certificado TIF 422 en México."
        />
    </x-slot>

    {{-- Hero --}}
    <section class="bg-ink pt-[106px] pb-16">
        <div class="container-soma pt-10">
            <div class="flex items-center gap-3 mb-5">
                <span class="w-6 h-px bg-copper" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">Legal</span>
            </div>
            <h1 class="font-display font-bold text-4xl md:text-5xl text-white leading-[1.0] tracking-[-0.03em] mb-4">Términos y Condiciones</h1>
            <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-white/40">Última actualización: {{ date('d') }} de {{ ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'][date('n')-1] }} de {{ date('Y') }}</p>
        </div>
    </section>

    {{-- Contenido --}}
    <section class="bg-bone py-16 md:py-20">
        <div class="container-soma">
            <div class="max-w-3xl mx-auto">
                <div class="space-y-10">

                    <div class="bg-white border border-line rounded-xl p-6 text-sm text-ink-mid leading-relaxed">
                        Al acceder y utilizar el sitio web <strong>somameat.com</strong> y los servicios de <strong>SOMA MEAT CO</strong>, usted acepta íntegramente los presentes Términos y Condiciones. Si no está de acuerdo con alguno de ellos, le solicitamos abstenerse de utilizar el sitio.
                    </div>

                    @php
                    $sections = [
                        [
                            'title' => '1. Información del titular del sitio',
                            'body'  => '<strong>SOMA MEAT CO</strong><br>
                            Calle de Árbol núm. 23, San Juan Teoloyucan 54783, Estado de México<br>
                            Rastro TIF No. 422 — Autorizado por SENASICA · SADER México<br>
                            Correo: <a href="mailto:contacto@somameat.com" class="text-primary hover:underline">contacto@somameat.com</a><br>
                            Teléfonos: 59 3127 2015 / 59 3127 2018',
                        ],
                        [
                            'title' => '2. Objeto y naturaleza del sitio',
                            'body'  => 'Este sitio web tiene carácter <strong>informativo y comercial B2B</strong>. Su propósito es presentar los servicios, certificaciones y capacidades operativas de SOMA MEAT CO, así como facilitar el contacto con clientes del sector alimentario.<br><br>
                            El sitio está dirigido a empresas y profesionales del sector: cadenas de autoservicio, restaurantes, distribuidores, marcas privadas y exportadores. No está orientado al consumidor final.',
                        ],
                        [
                            'title' => '3. Uso permitido del sitio',
                            'body'  => 'El usuario se compromete a:<br><br>
                            • Utilizar el sitio únicamente con fines lícitos y conforme a los presentes términos.<br>
                            • No reproducir, distribuir, modificar ni explotar comercialmente los contenidos sin autorización previa y por escrito de SOMA MEAT CO.<br>
                            • No utilizar el sitio para enviar comunicaciones no solicitadas, spam o contenido malicioso.<br>
                            • No intentar acceder a áreas restringidas del sitio (portal de cliente, panel de administración) sin autorización.',
                        ],
                        [
                            'title' => '4. Propiedad intelectual',
                            'body'  => 'Todos los contenidos del sitio — incluyendo textos, imágenes, logotipos, diseño gráfico, fotografías, datos técnicos y documentación — son propiedad de SOMA MEAT CO o de sus licenciantes y están protegidos por la legislación aplicable en materia de propiedad intelectual.<br><br>
                            La marca <strong>SOMA MEAT CO</strong>, sus variaciones y el logotipo asociado son marcas registradas o en proceso de registro. Queda prohibido su uso sin autorización expresa.',
                        ],
                        [
                            'title' => '5. Información de productos y precios',
                            'body'  => 'Los precios indicativos publicados en el sitio tienen carácter <strong>referencial</strong> y pueden variar según volumen, especie, presentación, temporada y condiciones de mercado. No constituyen una oferta vinculante.<br><br>
                            Las cotizaciones formales se emiten únicamente a través del proceso de contacto comercial y tienen validez por el período expresamente indicado en cada propuesta.',
                        ],
                        [
                            'title' => '6. Certificaciones y documentación',
                            'body'  => 'La información relativa a certificaciones (TIF 422, HACCP, Kosher KC) es vigente a la fecha de publicación. Las certificaciones están sujetas a renovación anual y auditorías periódicas.<br><br>
                            La documentación oficial (certificados, fichas técnicas, HACCP por lote) se entrega exclusivamente a clientes activos dentro del proceso comercial establecido.',
                        ],
                        [
                            'title' => '7. Límite de responsabilidad',
                            'body'  => 'SOMA MEAT CO no garantiza la disponibilidad ininterrumpida del sitio web y no será responsable por:<br><br>
                            • Daños derivados de interrupciones, errores técnicos o accesos no autorizados al sitio.<br>
                            • Decisiones comerciales tomadas con base exclusiva en la información publicada en el sitio, sin verificación directa.<br>
                            • Contenidos de sitios web de terceros enlazados desde nuestro sitio.',
                        ],
                        [
                            'title' => '8. Portal de cliente',
                            'body'  => 'El acceso al portal de cliente (<strong>/portal</strong>) está restringido a empresas con relación comercial activa con SOMA MEAT CO. Las credenciales son personales e intransferibles. El usuario es responsable de mantener la confidencialidad de su acceso.',
                        ],
                        [
                            'title' => '9. Legislación aplicable y jurisdicción',
                            'body'  => 'Los presentes Términos y Condiciones se rigen por las leyes aplicables en los <strong>Estados Unidos Mexicanos</strong>. Para cualquier controversia derivada del uso del sitio, las partes se someten a la jurisdicción de los tribunales competentes del Estado de México, renunciando a cualquier otro fuero que pudiera corresponderles.',
                        ],
                        [
                            'title' => '10. Modificaciones',
                            'body'  => 'SOMA MEAT CO se reserva el derecho de modificar estos Términos y Condiciones en cualquier momento. Los cambios entrarán en vigor desde su publicación en el sitio. El uso continuado del sitio implica la aceptación de las versiones actualizadas.',
                        ],
                    ];
                    @endphp

                    @foreach($sections as $s)
                    <div>
                        <h2 class="font-display font-bold text-xl text-ink mb-3 leading-snug">{{ $s['title'] }}</h2>
                        <p class="text-sm text-ink-mid leading-relaxed">{!! $s['body'] !!}</p>
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
                    <a href="{{ route('legal.cookies') }}" class="text-sm text-mute hover:text-ink transition-colors">Política de cookies</a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
