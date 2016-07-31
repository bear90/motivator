<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\controllers\search;

class IndexAction extends \CAction
{
    public function run()
    {
        
        $this->controller->render('index', [
            
        ]);
    }
}