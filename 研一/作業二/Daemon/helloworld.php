<?php

class DaemonSignalListener
{
    protected $processId;

    protected $pidFile = 'daemon.pid';

    protected $logFile = 'daemon.log';

    public function execute()
    {
        // Create first child.
        if(pcntl_fork())
        {
            // I'm the parent
            // Protect against Zombie children
            //直形成process
            pcntl_wait($status);
            exit;
        }

        // Make first child as session leader.
        posix_setsid();

        // Create second child.
        $pid = pcntl_fork();
        if($pid)
        {
            // If pid not 0, means this process is parent, close it.
            $this->processId = $pid;
            $this->storeProcessId();

            exit;
        }

        //將字串寫入
        $this->addLog('Daemonized');

        fwrite(STDOUT, "Daemon Start\n-----------------------------------------\n");

        $this->registerSignalHandler();

        // Declare ticks to start signal monitoring. When you declare ticks, PCNTL will monitor
        // incoming signals after each tick and call the relevant signal handler automatically.
        declare (ticks = 1);

        while(true)
        {
            $this->doExecute();
        }

        return $this;
    }

    protected function doExecute()
    {

    }

    protected function registerSignalHandler()
    {
        $this->addLog('registerHendler');

        pcntl_signal(SIGINT, array($this, 'shutdown'));

        pcntl_signal(SIGTERM, array($this, 'shutdown'));

        pcntl_signal(SIGUSR1, array($this, 'customSignal'));
    }

    protected function storeProcessId()
    {
        $file = $this->pidFile;

        // Make sure that the folder where we are writing the process id file exists.
        $folder = dirname($file);

        if(!is_dir($folder))
        {
            mkdir($folder);
        }

        file_put_contents($file, $this->processId);

        return $this;
    }

    public function shutdown($signal)
    {
        $this->addLog('Shutdown by signal: ' . $signal);

        $pid = file_get_contents($this->pidFile);

        // Remove the process id file.
        @ unlink($this->pidFile);

        passthru('kill -9 ' . $pid);
        exit;
    }

    public function customSignal($signal)
    {
        $this->addLog('Execute custom signal: ' . $signal);
    }

    protected function addLog($text)
    {
        $file = $this->logFile;

        $time = new Datetime();

        $text = sprintf("%s - %s\n", $text, $time->format('Y-m-d H:i:s'));//輸入到文件

        $fp = fopen($file, 'a+');
        fwrite($fp,$text);
        fclose($fp);
    }
}



// Start Daemon
// --------------------------------------------------
$daemon = new DaemonSignalListener();

$daemon->execute();