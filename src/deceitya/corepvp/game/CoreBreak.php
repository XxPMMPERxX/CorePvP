<?php

namespace deceitya\corepvp\game;

class CoreBreak extends Game
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