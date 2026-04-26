<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\PlantSection;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $en = app()->getLocale() === 'en';

        $locale = $en ? 'en' : 'es';

        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->with('media')
            ->get()
            ->map(fn (Service $s) => [
                'title'       => $s->getTranslation('name', $locale, false) ?: $s->getTranslation('name', 'es', false),
                'category'    => $s->getTranslation('category', $locale, false) ?: $s->getTranslation('category', 'es', false),
                'description' => $s->getTranslation('description', $locale, false) ?: $s->getTranslation('description', 'es', false),
                'url'         => $en
                    ? route('en.services.show', $s->getTranslation('slug', 'en', false) ?: $s->getTranslation('slug', 'es', false))
                    : route('services.show', $s->getTranslation('slug', 'es', false)),
                'image'       => $s->getFirstMediaUrl('image', 'thumb') ?: $s->getFirstMediaUrl('image'),
                'featured'    => $s->is_featured,
            ]);

        $sectors = [
            'autoservicio' => [
                'label'       => $en ? 'Retail & Grocery' : 'Retail & Autoservicio',
                'description' => $en
                    ? 'Continuous supply for supermarket chains with TIF 422 documentation, lot-traceable packaging and certifications required for supplier homologation audits.'
                    : 'Abastecimiento continuo a cadenas de autoservicio con documentación TIF 422 completa, trazabilidad verificable por lote y empaque certificado para auditoría de homologación de proveedores.',
                'items'       => $en
                    ? ['TIF 422 documentation', 'Lot-level traceability', 'Certified packaging', 'Supplier homologation']
                    : ['Documentación TIF completa', 'Trazabilidad por lote', 'Empaque certificado', 'Homologación de proveedor'],
            ],
            'horeca' => [
                'label'       => 'HORECA',
                'description' => $en
                    ? 'Hotels, restaurants and catering. Cuts to exact technical specs, calibrated portions and HACCP-documented protocol. 5 species available. Kosher on request.'
                    : 'Hoteles, restaurantes y catering. Cortes a ficha técnica, porciones calibradas por peso exacto y protocolo HACCP documentado por lote. 5 especies. KOSHER bajo solicitud.',
                'items'       => $en
                    ? ['Cuts to spec', 'Calibrated portions', 'HACCP per lot', 'Kosher available']
                    : ['Cortes a ficha técnica', 'Porciones calibradas', 'HACCP por lote', 'KOSHER disponible'],
            ],
            'distribuidores' => [
                'label'       => $en ? 'Distribution' : 'Distribución',
                'description' => $en
                    ? 'Regional and national distributors receive bulk and wholesale presentations labeled by lot, backed by an active TIF 422 supplier certificate and full traceability documentation.'
                    : 'Distribuidores y mayoristas reciben presentaciones estándar y caja mayorista etiquetadas por lote, respaldadas por constancia de proveedor TIF 422 activa y documentación de trazabilidad completa.',
                'items'       => $en
                    ? ['Active TIF 422 certificate', 'Wholesale presentations', 'Lot labeling', 'Traceability docs']
                    : ['Constancia TIF 422 activa', 'Presentaciones mayorista', 'Etiquetado por lote', 'Docs de trazabilidad'],
            ],
            'marca_propia' => [
                'label'       => $en ? 'Private Label' : 'Marca Propia',
                'description' => $en
                    ? 'Your formula, your packaging, your EAN-13 code — produced in our TIF 422 facility. NDA available. Capacity: 18–21 ton/day depending on species and operation.'
                    : 'Tu fórmula, tu empaque, tu código EAN-13 — producidos en nuestra planta TIF 422. NDA disponible. Capacidad: 18–21 ton/día según especie y operación.',
                'items'       => $en
                    ? ['Custom formula', 'Private packaging', 'EAN-13 labeling', 'NDA included']
                    : ['Fórmula propia', 'Empaque personalizado', 'Etiqueta y EAN-13', 'NDA incluido'],
            ],
        ];

        $channels = Channel::where('is_active', true)
            ->orderBy('sort_order')
            ->with('media')
            ->get();

        $products = Product::query()
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->with('media')
            ->limit(8)
            ->get();

        $plantSection    = PlantSection::singleton()->load('media');
        $showCatalogPrices = Setting::get('show_catalog_prices', false);

        return view('pages.home', compact('services', 'sectors', 'products', 'channels', 'plantSection', 'showCatalogPrices'));
    }
}
