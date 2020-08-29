<?php

namespace Piscibus\AwsVideoStream\Commands;

use Illuminate\Console\Command;

class AwsVideoStreamCommand extends Command
{
    public $signature = 'aws-video-stream';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
