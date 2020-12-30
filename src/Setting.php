<?php

namespace Dcat\Admin\Extension\EasySku;

use Dcat\Admin\Extend\Setting as Form;

class Setting extends Form
{
    public function title()
    {
        return 'Sku配置菜单';
    }

    public function form()
    {
        $this->text('key1')->required();
        $this->text('key2')->required();
    }
}
