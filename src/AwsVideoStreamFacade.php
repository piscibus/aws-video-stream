<?php

namespace Piscibus\AwsVideoStream;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Piscibus\AwsVideoStream\AwsVideoStream
 */
class AwsVideoStreamFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'aws-video-stream';
    }
}
