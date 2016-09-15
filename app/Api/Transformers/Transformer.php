<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/15
 * Time: 上午10:45
 */

namespace App\Api\Transformers;


abstract class Transformer
{
    public function transformCollection($items) {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}