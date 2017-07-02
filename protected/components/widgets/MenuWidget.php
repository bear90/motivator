<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\components\widgets;


class MenuWidget extends \CWidget
{
    public $active;

    public $htmlOptions = [];

    public $items = [
        [
            'key' => 'turistam',
            'label' => 'Туристам',
            'url' => '/',
        ],
        [
            'key' => 'turagentam',
            'label' => 'Турагентам',
            'url' => ['/turagentam'],
        ],
        [
            'key' => 'turoperatoram',
            'label' => 'О ПОРТАЛЕ',
            'url' => ['/turoperatoram'],
        ],
        [
            'key' => 'contacts',
            'label' => 'Контакты',
            'url' => ['/kontakty'],
        ]
    ];

    public function run() {
        $this->htmlOptions = \CMap::mergeArray($this->htmlOptions, ['class' => 'nav navbar-nav']);
        $this->render('application.views.widgets.menu');
    }
}