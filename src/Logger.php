<?php

/*
 * This file is part of StyleCI.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StyleCI\Bugsnag;

use Bugsnag_Client as Bugsnag;
use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Psr\Log\LoggerInterface;

/**
 * This is the logger class.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
class Logger implements LoggerInterface
{
    /**
     * The bugsnag client instance.
     *
     * @var \Bugsnag_Client
     */
    protected $bugsnag;

    /**
     * Create a new logger instance.
     *
     * @param \Bugsnag_Client $bugsnag
     *
     * @return void
     */
    public function __construct(Bugsnag $bugsnag)
    {
        $this->bugsnag = $bugsnag;
    }

    /**
     * Log an emergency message to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function emergency($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'fatal');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'fatal');
        }
    }

    /**
     * Log an alert message to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function alert($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'fatal');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'fatal');
        }
    }

    /**
     * Log a critical message to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function critical($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'error');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'error');
        }
    }

    /**
     * Log an error message to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function error($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'error');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'error');
        }
    }

    /**
     * Log a warning message to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function warning($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'warning');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'warning');
        }
    }

    /**
     * Log a notice to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function notice($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'warning');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'warning');
        }
    }

    /**
     * Log an informational message to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function info($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'info');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'info');
        }
    }

    /**
     * Log a debug message to the logs.
     *
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function debug($message, array $context = [])
    {
        if ($message instanceof Exception) {
            $bugsnag->notifyException($message, null, 'info');
        } else {
            $bugsnag->notifyError($this->formatMessage($message), $this->formatContext($context), null, 'info');
        }
    }

    /**
     * Log a message to the logs.
     *
     * @param string $level
     * @param mixed  $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        if (method_exists($this, $level)) {
            $this->$level($message, $context);
        }
    }

    /**
     * Format the message for the logger.
     *
     * @param mixed $message
     *
     * @return string
     */
    protected function formatMessage($message)
    {
        if (is_array($message)) {
            return var_export($message, true);
        } elseif ($message instanceof Jsonable) {
            return $message->toJson();
        } elseif ($message instanceof Arrayable) {
            return var_export($message->toArray(), true);
        }

        return $message;
    }

    /**
     * Format the context for the logger.
     *
     * @param array $context
     *
     * @return string
     */
    protected function formatContext(array $context)
    {
        foreach ($context as $key => $value) {
            $context[$key] = $this->formatMessage($value);
        }

        return var_export($context, true);
    }
}
