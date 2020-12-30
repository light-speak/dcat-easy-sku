<?php

namespace Dcat\Admin\Extension\EasySku;

use Dcat\Admin\Admin;
use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Form;

class DcatEasySkuServiceProvider extends ServiceProvider
{
    protected $js  = [
    ];
    protected $css = [
    ];

    public function register()
    {

    }

    public function init()
    {
        parent::init();

        if ($views = $this->getViewPath()) {
            $this->loadViewsFrom($views, 'easy_sku');
        }

        Admin::booting(function () {
            Form::extend('sku', SkuField::class);
        });

    }

    public function settingForm()
    {
        return new Setting($this);
    }
}
