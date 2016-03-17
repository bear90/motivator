<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;


class DashboardAction extends \CAction
{
    public function run($id) {

        $id = intval($id);

        $this->controller->layout = "agent-dashboard";
        
        $this->controller->render('dashboard', [
            
        ]);
    }
}