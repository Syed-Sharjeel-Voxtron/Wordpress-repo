<?php

if (! isset($showResetButton)) {
    $showResetButton = 'yes';
}

if (! isset($has_label)) {
    $has_label = true;
}

$reset_icon = '<svg width="11" height="11" viewBox="0 0 15 15" fill="currentColor"><path d="M8.5,7.5l4.5,4.5l-1,1L7.5,8.5L3,13l-1-1l4.5-4.5L2,3l1-1l4.5,4.5L12,2l1,1L8.5,7.5z"/></svg>';

$reset_icon_button = $has_label ? $reset_icon : '<svg width="12" height="12" viewBox="0 0 15 15" fill="currentColor"><path d="M8.5,7.5l4.5,4.5l-1,1L7.5,8.5L3,13l-1-1l4.5-4.5L2,3l1-1l4.5,4.5L12,2l1,1L8.5,7.5z"/></svg>';

$reset_item = blocksy_html_tag(
    'a',
    array_merge(
        [
            'href' => $reset_url,
        ],
        !$has_label ? [
            'class' => 'ct-button-ghost'
        ] : []
    ),
    $reset_icon_button . __('Reset Filters', 'blocksy-companion')
); 

$attribute_taxonomies = wc_get_attribute_taxonomies();

$applied_filters_html = [];

foreach ($applied_filters as $filter) {
    if (empty($filter['items'])) {
        continue;
    }

    $filters_items = [];
    
    foreach ($filter['items'] as $key => $item) {
        $filters_items[] = blocksy_html_tag(
            'a',
            [
                'href' => $item['href'],
            ],
            $reset_icon . $item['name']
        );
    }

    $applied_filters_html[] = join('', $filters_items);
}

if (
    ! empty($applied_filters_html)
    &&
    $showResetButton === 'yes'
) {
    if ($has_label) {
        array_unshift($applied_filters_html, $reset_item);
    } else {
        $applied_filters_html[] = '<div class="ct-filter-reset">' . $reset_item . '</div>';
    }
}

$filters_label = '';

if (
    blocksy_get_theme_mod('woo_has_active_filters_label', 'yes') === 'yes'
    &&
    $has_label
) {
    $filters_label = blocksy_html_tag(
        'span',
        [],
        blocksy_get_theme_mod(
            'woo_active_filters_label',
            __('Active Filters', 'blocksy-companion')
        )
    );
}

echo blocksy_html_tag(
    'div',
    array_merge(
        [
            'class' => 'ct-active-filters'
        ],
        !$has_label ? [
            'data-display-type' => 'inline'
        ] : []
    ),
    $filters_label . implode('', $applied_filters_html)
);