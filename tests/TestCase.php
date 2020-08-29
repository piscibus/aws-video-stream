<?php

namespace Piscibus\AwsVideoStream\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Piscibus\AwsVideoStream\AwsVideoStreamServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            AwsVideoStreamServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_aws_video_stream_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
