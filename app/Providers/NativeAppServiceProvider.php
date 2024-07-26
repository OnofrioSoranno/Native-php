<?php

namespace App\Providers;

use Native\Laravel\Menu\Menu;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Contracts\ProvidesPhpIni;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Menu::new()
        ->appMenu()
        ->subMenu('ToDoList', Menu::new()
            ->link('https://google.it', 'Google')
            ->separator()
            ->link('https://youtube.com', 'Youtube')
        )
        ->register();

        Window::open()
        ->width(1000)
        ->height(900)
        ->rememberState()
        ->hasShadow(false)
        // ->titleBarhidden()
        ;

    //     MenuBar::create()
    //     ->label('ToDoApp')
    //     ->width(500)
    //     ->height(600)
    //     ->withContextMenu(
    //         Menu::new()
    //             ->label('ToDoApp')
    //             ->separator()
    //             ->link('https://google.com', 'Google')
    //             ->separator()
    //             ->quit()
    //     );;

    }   

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
            'session.use_cookies' => 1, // Abilita l\'uso dei cookie per le sessioni
            'session.save_path' => '/tmp/sessions', // Imposta la cartella di archiviazione delle sessioni
        ];
    }
}
