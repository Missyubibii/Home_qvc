<?php

namespace App\Providers;

use Illuminate\Console\Application as Artisan;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // GHI CHÚ: Điều kiện if ($this->app->isProduction()) đã được XÓA BỎ
        // Logic này bây giờ sẽ chạy trên TẤT CẢ các môi trường

        // Danh sách các lệnh nguy hiểm cần vô hiệu hóa
        $commandsToDisable = [
            'migrate:fresh',
            'migrate:refresh',
            'migrate:reset',
            'migrate:rollback',
            'db:seed',
            'db:wipe',
            'schema:dump',
        ];

        Artisan::starting(function ($artisan) use ($commandsToDisable) {
            $commands = $artisan->all();

            foreach ($commandsToDisable as $commandName) {
                if (isset($commands[$commandName])) {
                    $commands[$commandName]->setHidden(true);
                }
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
