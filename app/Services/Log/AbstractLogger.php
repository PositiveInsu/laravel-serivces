<?php

namespace App\Services\Log;

use App\Services\Exception\ExceptionServiceInterface;
use App\Services\Log\Migration\MigrationLogData;
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
        $logMessage = $this->getMessageFrom($logData);
        $this->logger->info($logMessage);
        $this->logger->reset();
    }

    public function DEBUG(LogDataInterface $logData): void
    {
        $this->checkLogDataType($logData, MigrationLogData::class);
        $this->logError($logData);
        $this->logTrace($logData);
    }

    private function logError(LogDataInterface $logData)
    {
        $logMessage = $this->getMessageFrom($logData);
        $this->logger->error($logMessage);
        $this->logger->reset();
    }

    private function logTrace(LogDataInterface $logData)
    {
        $traceMessage = $this->getTraceMessageFrom($logData);
        $this->traceLogger->error($traceMessage);
        $this->traceLogger->reset();
    }

    /**
     * @internal Define log file name in the method manually
     * @return string
     */
    protected abstract function getLogFileName(): string;
    protected abstract function checkLogDataType(LogDataInterface $logData): void;
    protected abstract function getMessageFrom(LogDataInterface $logData): string;
    protected abstract function getTraceMessageFrom(LogDataInterface $logData): string;

    private function initLogger(string $loggerName)
    {
        $logger = new Logger($loggerName);
        $logger->pushHandler($this->setFormatter(new StreamHandler(base_path().'/logs/'.$loggerName.'/'.$loggerName.'.log', Logger::INFO)));
        $logger->pushHandler($this->setFormatter(new StreamHandler(base_path().'/logs/'.$loggerName.'/'.$loggerName.'_error.log', Logger::ERROR)));
        $this->logger = $logger;

        $traceLogger = new Logger($loggerName);
        $traceLogger->pushHandler($this->setFormatter(new StreamHandler(base_path().'/logs/'.$loggerName.'/'.$loggerName.'_error_trace.log', Logger::ERROR)));
        $this->traceLogger = $traceLogger;
    }

    private function setFormatter(StreamHandler $handler): StreamHandler
    {
        $formatter = new LineFormatter($this->format, $this->dateFormat);
        $formatter->includeStacktraces(true);
        $handler->setFormatter($formatter);
        return $handler;
    }
}
