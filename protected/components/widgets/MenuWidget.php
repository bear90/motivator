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
            'label' => 'Турагентствам',
            'url' => ['/turagentstvam'],
        ],
        [
            'key' => 'turoperatoram',
            'label' => 'О ПОРТАЛЕ',
            'url' => ['/o-portale'],
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