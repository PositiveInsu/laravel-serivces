<?php

namespace Library\Log\Logger;

use Library\Exception\ExceptionServiceInterface;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

abstract class AbstractLogger implements LoggerInterface
{
    protected string $delimiter;
    protected string $format;
    protected string $dateFormat;
    protected Logger $logger;
    protected Logger $traceLogger;

    public function __construct(
        protected ExceptionServiceInterface $exceptionService,
    ){
        $this->delimiter = config('custom_log.delimiter');
        $this->format = config('custom_log.formatter_format');
        $this->dateFormat = config('custom_log.date_format');
        $this->initLogger( $this->getLogFileName());
    }

    public function INFO(LogDataInterface $logData): void
    {
        $this->checkLogDataType($logData);
        $logMessage = $this->getLogMessageFrom($logData);
        $this->logger->info($logMessage);
        $this->logger->reset();
    }

    public function ERROR(LogDataInterface $logData): void
    {
        $this->checkLogDataType($logData);
        $this->logError($logData);
        $this->logTrace($logData);
    }

    private function logError(LogDataInterface $logData)
    {
        $logMessage = $this->getLogMessageFrom($logData);
        $this->logger->error($logMessage);
        $this->logger->reset();
    }

    private function logTrace(LogDataInterface $logData)
    {
        $traceMessage = $this->getTraceLogMessageFrom($logData);
        $this->traceLogger->error($traceMessage);
        $this->traceLogger->reset();
    }

    /**
     * @internal Define log file name in the method manually
     * @return string
     */
    public abstract function getLogFileName(): string;
    protected abstract function checkLogDataType(LogDataInterface $logData): void;
    protected abstract function getLogMessageFrom(LogDataInterface $logData): string;
    protected abstract function getTraceLogMessageFrom(LogDataInterface $logData): string;

    private function initLogger(string $loggerName)
    {
        $logger = new Logger($loggerName);
        $logger->pushHandler($this->setFormatter(new StreamHandler($this->getLogPath($loggerName).$loggerName.'.log', Logger::INFO)));
        $this->logger = $logger;

        $traceLogger = new Logger($loggerName);
        $traceLogger->pushHandler($this->setFormatter(new StreamHandler($this->getLogPath($loggerName).$loggerName.'_error_trace.log', Logger::ERROR)));
        $this->traceLogger = $traceLogger;
    }

    private function setFormatter(StreamHandler $handler): StreamHandler
    {
        $formatter = new LineFormatter($this->format, $this->dateFormat);
        $formatter->includeStacktraces(true);
        $handler->setFormatter($formatter);
        return $handler;
    }

    private function getLogPath(string $loggerName): string
    {
        return $config['log_base_path'] ?? storage_path().'/logs/'.$loggerName.'/';
    }
}
