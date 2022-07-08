<?php

namespace hr;

/**
 *
 * Task: Given is the following FizzBuzz application which counts from 1 to 100 and outputs either the corresponding
 * number or if one of the following rules apply output the corresponding text.
 * Rules:
 *  - dividable by 3 without a remainder -> Fizz
 *  - dividable by 5 without a remainder -> Buzz
 *  - dividable by 3 or 5 without a remainder -> FizzBuzz
 *
 * Please refactor this code so that it can be extended in the future with other rules, such as
 * "if it is dividable by 7 without a remainder output Bar"
 * "if multiplied by 10 is larger than 100 output Foo"
 *
 */

interface HandlerInterface
{
    public function handle(int $i): string;
}

class HandlerFizz implements HandlerInterface
{
    public function handle(int $i): string
    {
        return $i % 3 === 0 ? 'Fizz' : '';
    }
}

class HandlerBuzz implements HandlerInterface
{
    public function handle(int $i): string
    {
        return $i % 5 === 0 ? 'Buzz' : '';
    }
}

class FizzBuzzEngine
{
    /**
     * @var array<HandlerInterface>
     */
    private array $handlers = [];

    public function addHandler(HandlerInterface $handler): self
    {
        $this->handlers[] = $handler;

        return $this;
    }

    private function getHandlers(): array
    {
        return $this->handlers;
    }

    public function run(int $limit = 100): void
    {
        for ($i = 1; $i <= $limit; $i++) {
            $output = '';
            foreach ($this->getHandlers() as $handler) {
                $output .= $handler->handle($i);
            }
            if (empty($output)) {
                $output = 'None';
            }
            printf('%d: %s', $i, $output . PHP_EOL);
        }
    }
}

$engine = new FizzBuzzEngine();

$engine->addHandler(new HandlerFizz())
    ->addHandler(new HandlerBuzz())
    ->run();
