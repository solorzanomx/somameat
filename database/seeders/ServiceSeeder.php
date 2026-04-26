<?php
declare(strict_types=1);
namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'sort_order'   => 1,
                'is_active'    => true,
                'is_featured'  => false,
                'name'         => ['es' => 'Rastro TIF 422', 'en' => 'TIF 422 Slaughterhouse'],
                'slug'         => ['es' => 'rastro-tif', 'en' => 'tif-slaughterhouse'],
                'category'     => ['es' => 'Rastro TIF', 'en' => 'Slaughterhouse'],
                'description'  => ['es' => 'Sacrificio certificado ovino, caprino y ternera. Veterinario oficial SENASICA permanente en cada turno.', 'en' => 'Certified slaughter of sheep, goat and veal. Permanent SENASICA official veterinarian on every shift.'],
                'long_description' => ['es' => 'Nuestro rastro TIF 422 opera bajo supervisión veterinaria oficial SENASICA-SADER en cada turno de sacrificio. Certificado desde 2014, contamos con instalaciones para ovino, caprino, bovino y ternera con capacidad de 18–21 toneladas diarias. Cada canal recibe el sello físico TIF 422 que habilita acceso a autoservicio, exportación y distribución institucional.', 'en' => 'Our TIF 422 slaughterhouse operates under official SENASICA-SADER veterinary supervision on every slaughter shift. Certified since 2014, we have facilities for sheep, goat, beef and veal with 18–21 ton/day capacity. Every carcass receives the physical TIF 422 stamp enabling access to retail, export and institutional distribution.'],
                'proof_points' => [
                    ['active' => true,  'value' => 'TIF 422',  'label_es' => 'Certificación federal', 'label_en' => 'Federal certification'],
                    ['active' => true,  'value' => '2014',     'label_es' => 'Operando desde',        'label_en' => 'Operating since'],
                    ['active' => true,  'value' => '18–21 t',  'label_es' => 'Capacidad diaria',      'label_en' => 'Daily capacity'],
                    ['active' => false, 'value' => 'SENASICA', 'label_es' => 'Supervisión oficial',   'label_en' => 'Official supervision'],
                ],
            ],
            [
                'sort_order'   => 2,
                'is_active'    => true,
                'is_featured'  => false,
                'name'         => ['es' => 'Corte y Deshuese', 'en' => 'Cutting & Deboning'],
                'slug'         => ['es' => 'corte-premium', 'en' => 'cutting-deboning'],
                'category'     => ['es' => 'Corte', 'en' => 'Cutting'],
                'description'  => ['es' => '5 especies a especificación técnica del cliente. Rendimiento documentado por corte y lote.', 'en' => '5 species to your exact technical specifications. Documented yield per cut and lot.'],
                'long_description' => ['es' => 'Procesamos bovino, ovino, caprino, porcino y ave a la ficha técnica exacta del cliente. Cada corte lleva código de lote, rendimiento documentado y etiqueta HACCP. Disponemos de líneas separadas por especie para garantizar trazabilidad sin contaminación cruzada.', 'en' => 'We process beef, lamb, goat, pork and poultry to the client\'s exact technical spec. Each cut carries lot code, documented yield and HACCP label. We have separate lines per species to guarantee traceability without cross-contamination.'],
                'proof_points' => [
                    ['active' => true,  'value' => '5',       'label_es' => 'Especies procesadas', 'label_en' => 'Species processed'],
                    ['active' => true,  'value' => 'HACCP',   'label_es' => 'Por lote',            'label_en' => 'Per lot'],
                    ['active' => true,  'value' => '100%',    'label_es' => 'Trazabilidad',        'label_en' => 'Traceability'],
                    ['active' => false, 'value' => 'TIF 422', 'label_es' => 'Sello en cada pieza', 'label_en' => 'Stamp on every piece'],
                ],
            ],
            [
                'sort_order'   => 3,
                'is_active'    => true,
                'is_featured'  => false,
                'name'         => ['es' => 'Empaque al Vacío', 'en' => 'Vacuum Packaging'],
                'slug'         => ['es' => 'empaque', 'en' => 'packaging'],
                'category'     => ['es' => 'Empaque', 'en' => 'Packaging'],
                'description'  => ['es' => 'Sello TIF en cada pieza. Shelf life extendido para exportación y distribución en anaquel.', 'en' => 'TIF seal on every piece. Extended shelf life for export and retail distribution.'],
                'long_description' => ['es' => 'Empacamos al vacío, en bolsa skin y en charola termoformada según la especificación del cliente. Cada pieza lleva EAN-13 impreso, fecha de caducidad, número de lote y sello TIF 422. El proceso es compatible con cadenas de frío para exportación a Estados Unidos y mercados institucionales exigentes.', 'en' => 'We pack in vacuum, skin bag and thermoformed tray per client specification. Each piece carries printed EAN-13, expiry date, lot number and TIF 422 stamp. The process is cold-chain compatible for export to the United States and demanding institutional markets.'],
                'proof_points' => [
                    ['active' => true,  'value' => 'EAN-13',  'label_es' => 'Código impreso',       'label_en' => 'Printed barcode'],
                    ['active' => true,  'value' => 'TIF',     'label_es' => 'Sello en cada pieza',  'label_en' => 'Stamp on every piece'],
                    ['active' => true,  'value' => 'Export',  'label_es' => 'Compatible',           'label_en' => 'Compatible'],
                    ['active' => false, 'value' => 'Skin/VAC','label_es' => 'Formatos disponibles', 'label_en' => 'Available formats'],
                ],
            ],
            [
                'sort_order'   => 4,
                'is_active'    => true,
                'is_featured'  => true,
                'name'         => ['es' => 'Maquila · Marca Propia', 'en' => 'Toll Mfg · Private Label'],
                'slug'         => ['es' => 'maquila', 'en' => 'private-label'],
                'category'     => ['es' => 'Maquila', 'en' => 'Private Label'],
                'description'  => ['es' => 'Tu marca, nuestras instalaciones TIF. Capacidad 18–21 ton/día. NDA disponible desde el primer contacto.', 'en' => 'Your brand, our TIF-certified plant. 18–21 ton/day capacity. NDA available from first contact.'],
                'long_description' => ['es' => 'Producimos bajo tu marca con NDA desde el primer contacto. Tu fórmula de corte, tu empaque, tu código EAN-13 — producidos bajo TIF 422, HACCP y KOSHER KC. Ideal para cadenas de autoservicio que quieren marca propia y para empresas de foodtech que necesitan producción certificada sin invertir en planta.', 'en' => 'We produce under your brand with NDA from first contact. Your cut formula, your packaging, your EAN-13 code — produced under TIF 422, HACCP and KOSHER KC. Ideal for retail chains wanting private label and foodtech companies needing certified production without investing in their own plant.'],
                'proof_points' => [
                    ['active' => true,  'value' => 'NDA',     'label_es' => 'Desde primer contacto', 'label_en' => 'From first contact'],
                    ['active' => true,  'value' => '18–21 t', 'label_es' => 'Capacidad diaria',      'label_en' => 'Daily capacity'],
                    ['active' => true,  'value' => 'EAN-13',  'label_es' => 'Código registrable',    'label_en' => 'Registrable code'],
                    ['active' => false, 'value' => '3',       'label_es' => 'Certificaciones',       'label_en' => 'Certifications'],
                ],
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['slug->es' => $data['slug']['es']], $data);
        }
    }
}
