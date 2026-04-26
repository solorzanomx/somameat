@php
    use Spatie\SchemaOrg\Schema;

    $phone1 = config('soma.contact.phone_1');
    $phone2 = config('soma.contact.phone_2');
    $email  = config('soma.contact.email');
    $addr   = config('soma.contact.address');
    $hours  = config('soma.contact.hours');

    $organization = Schema::organization()
        ->name('Soma Meat Co.')
        ->alternateName('Soma Meat')
        ->url(config('app.url'))
        ->logo(asset('img/logo-soma.svg'))
        ->email($email)
        ->telephone($phone1)
        ->address(
            Schema::postalAddress()
                ->streetAddress('Calle de Árbol 23')
                ->addressLocality('San Juan Teoloyucan')
                ->addressRegion('Estado de México')
                ->postalCode('54783')
                ->addressCountry('MX')
        )
        ->sameAs([
            // Completar con URLs reales de redes sociales cuando estén disponibles
        ]);

    $localBusiness = Schema::foodEstablishment()
        ->name('Soma Meat Co.')
        ->description('Rastro TIF 422 con capacidad para 21 toneladas diarias. Maquila, corte premium, empaque al vacío y congelación IQF certificados HACCP, Kosher y Halal.')
        ->url(config('app.url'))
        ->logo(asset('img/logo-soma.svg'))
        ->image(asset('img/og-default.jpg'))
        ->telephone($phone1)
        ->email($email)
        ->address(
            Schema::postalAddress()
                ->streetAddress('Calle de Árbol 23')
                ->addressLocality('San Juan Teoloyucan')
                ->addressRegion('Estado de México')
                ->postalCode('54783')
                ->addressCountry('MX')
        )
        ->openingHours($hours)
        ->currenciesAccepted('MXN, USD')
        ->paymentAccepted('Cash, Bank Transfer, Wire Transfer')
        ->priceRange('$$');
@endphp

{!! $organization->toScript() !!}
{!! $localBusiness->toScript() !!}
