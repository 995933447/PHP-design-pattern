<?php

interface RecordInterface
{
    public function record(string $message, string $path);
}

class RecordComponent implements RecordInterface
{

    public function record(string $message, string $path)
    {
        file_put_contents($path, $message);
    }

}

interface Logger
{
    public function log(string $content);
}


class LoggerAdapter implements Logger
{
    private $recorder;

    private $file;

    public function __construct(RecordInterface $recorder)
    {
        $this->recorder = $recorder;
    }

    public function log(string $content)
    {
        $this->recorder->record($content, $this->file);
    }

    public function setFile(string $file)
    {
        $this->file = $file;
    }
}

class LoggerHandle
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function write(string $content)
    {
        $this->logger->log($content);
    }
}