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

namespace application\modules\admin\controllers\text;

use application\modules\admin\models\Entity\TextEntity;

class EditAction extends \CAction
{
    public function run($id = null)
    {
        $page = TextEntity::model()->findByPk($id);
        
        $this->controller->render('edit', [
            'page' => $page
        ]);
    }
}