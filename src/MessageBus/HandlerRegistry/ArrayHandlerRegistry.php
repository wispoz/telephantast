<?php

declare(strict_types=1);

namespace Telephantast\MessageBus\HandlerRegistry;

use Telephantast\Message\Message;
use Telephantast\MessageBus\Handler;
use Telephantast\MessageBus\HandlerRegistry;

/**
 * @api
 */
final readonly class ArrayHandlerRegistry implements HandlerRegistry
{
    /**
     * @param array<class-string<Message>, Handler> $messageClassToHandlerMap
     */
    public function __construct(
        private array $messageClassToHandlerMap = [],
    ) {}

    /**
     * @template TResult
     * @template TMessage of Message<TResult>
     * @param class-string<TMessage> $messageClass
     * @return ?Handler<TResult, TMessage>
     */
    public function get(string $messageClass): ?Handler
    {
        /** @var ?Handler<TResult, TMessage> */
        return $this->messageClassToHandlerMap[$messageClass] ?? null;
    }
}
