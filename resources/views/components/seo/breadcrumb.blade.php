@props([
    /**
     * Array de breadcrumbs: [['label' => 'Inicio', 'url' => '/'], ['label' => 'Servicios', 'url' => '/servicios'], ...]
     * El último item no necesita 'url' (es la página actual).
     */
    'items' => [],
])

@php
    use Spatie\SchemaOrg\Schema;

    if (count($items) < 2) {
        return; // Sin sentido renderizar un breadcrumb de un solo item
    }

    $listItems = [];
    foreach ($items as $position => $item) {
        $listItem = Schema::listItem()
            ->position($position + 1)
            ->name($item['label']);

        if (!empty($item['url'])) {
            $listItem->item($item['url']);
        }

        $listItems[] = $listItem;
    }

    $breadcrumb = Schema::breadcrumbList()->itemListElement($listItems);
@endphp

{!! $breadcrumb->toScript() !!}
