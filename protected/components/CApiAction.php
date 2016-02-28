<?php
/**
 * @author soza.mihail@gmail.com
 */


abstract class CApiAction extends \CAction
{
    abstract public function doRun();

    public function run()
    {
        try {
            $data = (array) $this->doRun();
            $this->sendSuccess($data);
        } catch (Exception $e){
            $this->sendError($e->getMessage());
        }
    }

    protected function sendSuccess(array $data){
        print json_encode($data);
    }

    protected function sendError($message){
        print json_encode([
            'error' => 1,
            'message' => $message
        ]);
    }
}