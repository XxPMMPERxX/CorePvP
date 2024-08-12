<?php

declare(strict_types=1);

namespace deceitya\corepvp\player\history;

use DateTime;

/**
 * 称号履歴
 */
class TagHistory
{
    /**
     * @param integer $id        履歴ID
     * @param integer $tag1ID    称号1ID
     * @param string $tag1       称号1
     * @param integer $tag2ID    称号2ID
     * @param string $tag2       称号2
     * @param integer $tag3ID    称号3ID
     * @param string $tag3       称号3
     * @param DateTime $datetime 更新日時
     */
    public function __construct(
        private int $id,
        private int $tag1ID,
        private string $tag1,
        private int $tag2ID,
        private string $tag2,
        private int $tag3ID,
        private string $tag3,
        private DateTime $datetime
    ) {}

    /**
     * 履歴IDを取得
     *
     * @return integer
     */
    public function getID(): int
    {
        return $this->id;
    }

    /**
     * 名称1IDを取得
     *
     * @return integer
     */
    public function getTag1ID(): int
    {
        return $this->tag1ID;
    }

    /**
     * 名称1を取得
     *
     * @return string
     */
    public function getTag1(): string
    {
        return $this->tag1;
    }

    /**
     * 名称2IDを取得
     *
     * @return integer
     */
    public function getTag2ID(): int
    {
        return $this->tag2ID;
    }

    /**
     * 名称2を取得
     *
     * @return string
     */
    public function getTag2(): string
    {
        return $this->tag2;
    }

    /**
     * 名称3IDを取得
     *
     * @return integer
     */
    public function getTag3ID(): int
    {
        return $this->tag3ID;
    }

    /**
     * 名称3を取得
     *
     * @return string
     */
    public function getTag3(): string
    {
        return $this->tag3;
    }
}
