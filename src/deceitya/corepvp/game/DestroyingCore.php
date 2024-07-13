<?php

declare(strict_types=1);

namespace deceitya\corepvp\game;

class DestroyingCore extends Game
{
    protected function onRecruiting(): bool
    {
        return true;
    }

    protected function onPrepare(): bool
    {
        return true;
    }

    protected function onBegin(): bool
    {
        return true;
    }

    protected function onEnd(): bool
    {
        return true;
    }
}