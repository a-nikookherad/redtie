<?php namespace Core;

class Error
{
    public static function errorHandler($level , $message , $file , $line)
    {
        if(error_reporting() !== 0) {
            throw new \ErrorException($message , 0 , $level , $file , $line);
        }
    }


	public static function errorException($exception)
	{
        		if (true){
      		        echo "<h1>Some wrong into this Class=> ".get_class($exception)."</h1>";
                    echo "<p>Error message=> ".$exception->getMessage()."</p>";
                    echo "<p>Error file location=> ".$exception->getFile()."<span style='color:red'> in line: ".$exception->getLine()."</span></p>";
                    echo "<pre>Error stack trace=> ".$exception->getTraceAsString()."</pre>";
                }else{
                    $logsFile=dirname(__DIR__)."/storage/logs/".date("Y-m-d").".txt";
                    ini_set("error_log",$logsFile);
                    $message= "\nSome wrong into this Class=> ".get_class($exception)." \n";
                    $message.= "Error message=> ".$exception->getMessage()."\n";
                    $message.= "Error file location=> ".$exception->getFile()." in line: ".$exception->getLine()."\n";
                    $message.= "Error stack trace=> ".$exception->getTraceAsString()."\n";
                    error_log($message);
                    echo View::bladeRender('404/404');
                }

	}

}
