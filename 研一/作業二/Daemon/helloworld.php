<?php
/**
 * A PHP daemon demo file.
 *
 * @author     Asika
 * @email      asika@asikart.com
 * @date       2013-10-12
 *
 * @copyright  Copyright (C) 2013 - Asika.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Daemon Application.
 */
class DaemonSignalListener
{
    /**
     * Store process id for close self.
     *
     * @var int
     */
    protected $processId;

    /**
     * File path to save pid.
     *
     * @var string
     */
    protected $pidFile = 'daemon.pid';

    /**
     * Daemon log file.
     *
     * @var string
     */
    protected $logFile = 'daemon.log';

    /**
     * Create a daemon process.
     *
     * @return  DaemonHttpApplication  Return self to support chaining.
     */
    public function execute()
    {
        // Create first child.
        if(pcntl_fork())
        {
            // I'm the parent
            // Protect against Zombie children
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

    /**
     * Method to run the application routines.
     * Most likely you will want to fetch a queue to do something.
     *
     * @return  void
     */
    protected function doExecute()
    {
        // Do some stuff you want.
    }

    /**
     * Method to attach signal handler to the known signals.
     *
     * @return  void
     */
    protected function registerSignalHandler()
    {
        $this->addLog('registerHendler');

        pcntl_signal(SIGINT, array($this, 'shutdown'));

        pcntl_signal(SIGTERM, array($this, 'shutdown'));

        pcntl_signal(SIGUSR1, array($this, 'customSignal'));
    }

    /**
     * Store the pid to file.
     *
     * @return  DaemonSignalListener  Return self to support chaining.
     */
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

    /**
     * Shut down our daemon.
     *
     * @param   integer  $signal  The received POSIX signal.
     */
    public function shutdown($signal)
    {
        $this->addLog('Shutdown by signal: ' . $signal);

        $pid = file_get_contents($this->pidFile);

        // Remove the process id file.
        @ unlink($this->pidFile);

        passthru('kill -9 ' . $pid);
        exit;
    }

    /**
     * Hendle the SIGUSR1 signal.
     *
     * @param   integer  $signal  The received POSIX signal.
     */
    public function customSignal($signal)
    {
        $this->addLog('Execute custom signal: ' . $signal);
    }

    /**
     * Add a log to log file.
     *
     * @param   string  $text  Log string.
     */
    protected function addLog($text)
    {
        $file = $this->logFile;

        $time = new Datetime();

        $text = sprintf("%s - %s\n", $text, $time->format('Y-m-d H:i:s'));

        $fp = fopen($file, 'a+');
        fwrite($fp,$text);
        fclose($fp);
    }
}



// Start Daemon
// --------------------------------------------------
$daemon = new DaemonSignalListener();

$daemon->execute();