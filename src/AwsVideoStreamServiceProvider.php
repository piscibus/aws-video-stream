<?php

namespace Piscibus\AwsVideoStream;

use Illuminate\Support\ServiceProvider;
use Piscibus\AwsVideoStream\Commands\AwsVideoStreamCommand;

class AwsVideoStreamServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/aws-video-stream.php' => config_path('aws-video-stream.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/aws-video-stream'),
            ], 'views');

            $migrationFileName = 'create_aws_video_stream_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                AwsVideoStreamCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'aws-video-stream');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/aws-video-stream.php', 'aws-video-stream');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
