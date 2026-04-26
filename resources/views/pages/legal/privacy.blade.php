<x-layouts.app>
    <x-slot name="seo">
        <x-seo
            title="Aviso de Privacidad — Soma Meat Co"
            description="Aviso de privacidad de Soma Meat Co conforme a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP)."
        />
    </x-slot>

    {{-- Hero --}}
    <section class="bg-ink pt-[106px] pb-16">
        <div class="container-soma pt-10">
            <div class="flex items-center gap-3 mb-5">
                <span class="w-6 h-px bg-copper" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">Legal</span>
            </div>
            <h1 class="font-display font-bold text-4xl md:text-5xl text-white leading-[1.0] tracking-[-0.03em] mb-4">Aviso de Privacidad</h1>
            <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-white/40">Última actualización: {{ date('d') }} de {{ ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'][date('n')-1] }} de {{ date('Y') }}</p>
        </div>
    </section>

    {{-- Contenido --}}
    <section class="bg-bone py-16 md:py-20">
        <div class="container-soma">
            <div class="max-w-3xl mx-auto">
                <div class="prose prose-sm max-w-none text-ink-mid leading-relaxed space-y-10">

                    {{-- Intro --}}
                    <div class="bg-white border border-line rounded-xl p-6 text-sm text-ink-mid leading-relaxed">
                        El presente Aviso de Privacidad se emite en cumplimiento de la <strong>Ley Federal de Protección de Datos Personales en Posesión de los Particulares</strong> (LFPDPPP), su Reglamento y los Lineamientos del Aviso de Privacidad emitidos por el INAI.
                    </div>

                    @php
                    $sections = [
                        [
                            'title' => '1. Identidad y domicilio del Responsable',
                            'body'  => '<strong>SOMA MEAT CO</strong>, con domicilio en Calle de Árbol núm. 23, San Juan Teoloyucan 54783, Estado de México, es el responsable del tratamiento de sus datos personales.<br><br>
                            Correo electrónico: <a href="mailto:contacto@somameat.com" class="text-primary hover:underline">contacto@somameat.com</a><br>
                            Teléfonos: 59 3127 2015 / 59 3127 2018',
                        ],
                        [
                            'title' => '2. Datos personales que se recaban',
                            'body'  => 'Para las finalidades descritas en este aviso, podemos recabar los siguientes datos personales:<br><br>
                            <strong>Datos de identificación:</strong> nombre completo, cargo, empresa o razón social.<br>
                            <strong>Datos de contacto:</strong> correo electrónico, número de teléfono o WhatsApp, dirección fiscal.<br>
                            <strong>Datos comerciales:</strong> giro de la empresa, volumen de compra estimado, tipo de producto de interés, canal de distribución.<br><br>
                            No recabamos datos personales sensibles (salud, biometría, origen racial, creencias religiosas u orientación sexual).',
                        ],
                        [
                            'title' => '3. Finalidades del tratamiento',
                            'body'  => '<strong>Finalidades primarias (necesarias para la relación comercial):</strong><br>
                            • Atender solicitudes de cotización, información y contacto B2B.<br>
                            • Gestionar la relación comercial con clientes y proveedores.<br>
                            • Enviar propuestas técnicas, fichas de producto y documentación sanitaria.<br>
                            • Cumplir con obligaciones legales, fiscales y sanitarias derivadas de nuestras operaciones.<br><br>
                            <strong>Finalidades secundarias (puede oponerse):</strong><br>
                            • Envío de comunicaciones comerciales, actualizaciones de catálogo y boletines.<br>
                            • Análisis estadístico de uso del sitio web para mejorar nuestros servicios.<br><br>
                            Si no desea que sus datos sean tratados para las finalidades secundarias, puede manifestarlo a través de <a href="mailto:contacto@somameat.com" class="text-primary hover:underline">contacto@somameat.com</a> en cualquier momento.',
                        ],
                        [
                            'title' => '4. Transferencia de datos',
                            'body'  => 'Sus datos personales podrán ser compartidos únicamente en los siguientes supuestos:<br><br>
                            • Con autoridades sanitarias (SENASICA, SADER, COFEPRIS) en cumplimiento de normativas TIF 422 y HACCP.<br>
                            • Con proveedores tecnológicos que nos prestan servicios de hospedaje, correo electrónico y análisis web, quienes estarán sujetos a obligaciones de confidencialidad equivalentes.<br>
                            • Con despachos contables o jurídicos, cuando sea necesario para el cumplimiento de obligaciones legales.<br><br>
                            No vendemos, cedemos ni compartimos sus datos con terceros con fines publicitarios.',
                        ],
                        [
                            'title' => '5. Derechos ARCO',
                            'body'  => 'Usted tiene derecho a <strong>Acceder</strong>, <strong>Rectificar</strong>, <strong>Cancelar</strong> u <strong>Oponerse</strong> (derechos ARCO) al tratamiento de sus datos personales.<br><br>
                            Para ejercer dichos derechos, envíe una solicitud a:<br>
                            <a href="mailto:contacto@somameat.com" class="text-primary hover:underline">contacto@somameat.com</a><br><br>
                            Su solicitud deberá incluir: nombre completo, descripción de los datos sobre los que desea ejercer el derecho, correo electrónico de contacto y copia de identificación oficial. Responderemos en un plazo máximo de <strong>20 días hábiles</strong>.',
                        ],
                        [
                            'title' => '6. Revocación del consentimiento',
                            'body'  => 'Puede revocar su consentimiento para el tratamiento de sus datos personales en cualquier momento, siempre que no sea imposible por una obligación legal. La solicitud deberá enviarse a <a href="mailto:contacto@somameat.com" class="text-primary hover:underline">contacto@somameat.com</a> indicando el tratamiento específico que desea revocar.',
                        ],
                        [
                            'title' => '7. Cookies y tecnologías de rastreo',
                            'body'  => 'Nuestro sitio web utiliza cookies y tecnologías similares. Para mayor información consulte nuestra <a href="' . route('legal.cookies') . '" class="text-primary hover:underline">Política de Cookies</a>.',
                        ],
                        [
                            'title' => '8. Cambios al Aviso de Privacidad',
                            'body'  => 'Nos reservamos el derecho de modificar este Aviso de Privacidad en cualquier momento. Los cambios serán publicados en esta página con su respectiva fecha de actualización. Le recomendamos consultarlo periódicamente.',
                        ],
                        [
                            'title' => '9. Autoridad competente',
                            'body'  => 'Si considera que su derecho a la protección de datos personales ha sido lesionado, puede acudir al Instituto Nacional de Transparencia, Acceso a la Información y Protección de Datos Personales (INAI): <a href="https://home.inai.org.mx" target="_blank" rel="noopener" class="text-primary hover:underline">www.inai.org.mx</a>.',
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
                    <a href="{{ route('legal.terms') }}" class="text-sm text-mute hover:text-ink transition-colors">Términos y condiciones</a>
                    <a href="{{ route('legal.cookies') }}" class="text-sm text-mute hover:text-ink transition-colors">Política de cookies</a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
