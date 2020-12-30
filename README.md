# Dcat Easy Sku

> 首先感谢前人的肩膀 https://github.com/jade-kun/sku

该插件是 [Dcat Admin](https://learnku.com/docs/dcat-admin/) 的插件，安装方式遵循Dcat Admin官方文档

默认规格带有 图片，库存，价格 三个属性， 可自行添加属性，自行处理

## 安装

#### composer安装
```shell script
composer require lty5240/dcat-easy-sku 
```

#### 应用商店安装

``` 
等待Dcat Admin 上商店 
```

#### 本地安装

```
下载本项目的zip包，并在Dcat Admin后台插件管理安装

// 不推荐，因为我没试过，也不方便
```

## 使用

#### Controller
```php
Form::make($builder, function(Form $form){
    $sku_params = [
        [
            'name'    => '拓展列第一列', // table 第一行 title 
            'field'   => 'column1', // input 的 field_name 名称
            'default' => '5', // 默认值
        ],
        [
            'name'    => '拓展列第二列',
            'field'   => 'column2',
            'default' => '',
        ],
    ];

    $form->sku('sku', json_encode($sku_params))->display(true)->customFormat(function ($value) use ($form){
        if($value === null){
            // 这里是给sku喂数据， 数据格式为
            $data = new stdClass();
            
            $data->attrs = [
                '颜色' => [
                    '红色',
                    '蓝色',
                ],
                '大小' => [
                    '20',
                ],               
            ];
            $data->sku = [
                [
                    "颜色" => "红色",
                    "大小" => '20',
                    "pic" => '图片',
                    "stock" => '库存',
                    "price" => '价格',
                    ...
                    // 如果存在其他属性，则同样在这里塞进去
                ],
                ...
                // 根据attrs做笛卡尔积，会有两种情况， 红色20 蓝色20，所以这两中都应该有，自行编辑数据
            ];
            return json_encode($data);
        }       
        return null;
    });
});

```
#### 排除sku(或者你自己改了名字)
##### 使用表单回调
> 暂时无效好像
```php
    $form->submitted(function (Form $form) {
        $this->sku = $form->input('sku');
        $form->deleteInput('sku');
    });
```
##### 直接简单粗暴排除
在对应模型里
```php
public function setSkuAttribute()
{
}
```

#### 保存数据

```php

// 可以用saved回调，等该模型保存完后，再进行处理
$form->saved(function (Form $form, int $result) {
    if ($result) {
        $sku = json_decode($form->input('sku'));
        $attrs = $sku->attrs;
        // 这边拿到sku的数据就自己处理吧
    }
}
```

#### 上传图片

默认接口为 /api/skuImage, 可在js文件自行修改

```php
    /**
     * 上传商品规格图片
     *
     * @param Request $request
     *
     * @return string[]
     */
    public function skuImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $disk = Storage::disk('cosv5');
            $url = 'sku';
            $res = $disk->put($url, $file);
            // 返回格式
            return ['url' => config('app.cos.cdn') . $res];
        }
        return [];
    }
```

## Licence

```
                                The MIT License (MIT)
                
                 Copyright (c) 2020-2021 Linty <linty@lintyone.cn>
         
Permission is hereby granted, free of charge, to any person obtaining a copy of this 
software and associated documentation files (the "Software"), to deal in the Software 
without restriction, including without limitation the rights to use, copy, modify, merge, 
publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons
to whom the Software is furnished to do so, subject to the following conditions:  
  
The above copyright notice and this permission notice shall be included in all copies or 
substantial portions of the Software.  
  
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR 
PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR 
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 
DEALINGS IN THE SOFTWARE.

```


