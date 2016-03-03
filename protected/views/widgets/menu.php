<?php
/**
 * @author msoza@soxes.ch
 */
$this->widget('zii.widgets.CMenu',array(
    'items' => array_map(function($item){
        if ($item['key'] == $this->active)
        {
            $item['active'] = true;
        }
        unset($item['key']);

        return $item;
    }, $this->items),
    'htmlOptions' => $this->htmlOptions,
    'itemCssClass' => 'text-uppercase',
));