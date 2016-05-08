<?php
/**
* This command class implement daily jobs
*/

class TestCommand extends CConsoleCommand
{
    
    public function run($args)
    {
        
        $r = (int) Tool::sendEmailWithView('soza.mihail@gmail.com', 'notice_2');

        print("Done ({$r})\n");
    }
}