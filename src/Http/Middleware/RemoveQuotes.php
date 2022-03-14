<?php

namespace Workable\Optimize\Http\Middleware;

class RemoveQuotes extends PageSpeed
{
    /**
     * @param string $buffer
     * @return string
     */
    public function apply($buffer)
    {
        $replace = [
            '/width="(.*?)"/'       => 'width=$1',
            '/height="(.*?)"/'      => 'height=$1',
            '/name="(.*?)"/'        => 'name=$1',
            '/charset="(.*?)"/'     => 'charset=$1',
            '/align="(.*?)"/'       => 'align=$1',
            '/border="(.*?)"/'      => 'border=$1',
            '/crossorigin="(.*?)"/' => 'crossorigin=$1',
            '/type="(.*?)"/'        => 'type=$1',
        ];
        return $this->replace($replace, $buffer);
    }
}
