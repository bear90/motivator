<?php
/**
 * @author soza.mihail@gmail.com
 */


abstract class CAjaxAction extends \CAction
{
    abstract public function doRun();

    public function run()
    {
        try {
            $data = (array) $this->doRun();
            $this->sendSuccess($data);
        } catch (Exception $e){
            $this->sendError();
        }
    }

    protected function sendSuccess(array $data){
        print json_encode($data);
    }

    protected function sendError(){
        return [
            'error' => 1,
            'message' => 'Opearation is failed'
        ];
    }
}