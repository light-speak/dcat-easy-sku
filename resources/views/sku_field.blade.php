<div class="{{$viewClass['form-group']}}">

    <label for="{{$id ?? ''}}" class="{{$viewClass['label']}} control-label">规格</label>

    <div class="{{$viewClass['field']}}">
        <div class="sku_warp {{$class}}">
            <input type="hidden" class="Js_sku_input" name="{{$name}}" value="{{old($column, $value)}}">
            <input type="hidden" class="Js_sku_params_input" value="{{ $label }}">
            <div class="sku_attr_key_val">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 100px">规格名</th>
                        <th>规格值</th>
                        <th style="width: 100px">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control"></td>
                        <td>
                            <div class="sku_attr_val_warp">
                                <div class="sku_attr_val_item">
                                    <div class="sku_attr_val_input">
                                        <input type="text" class="form-control">
                                    </div>
                                    <span class="btn btn-default Js_remove_attr_val"><i
                                                class="feather icon-x"></i></span>
                                </div>
                                <div class="sku_attr_val_item Js_add_attr_val" style="padding-left: 10px">
                                    <span class="btn btn-primary"><i class="feather icon-plus"></i></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="btn btn-primary Js_add_attr_name">添加</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- 操作SKU -->
            <div class="sku_edit_warp">
                <table class="table table-bordered">
                    <thead></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<style>
    .sku_warp .sku_edit_warp .Js_sku_del_pic {
        color: {{  Admin::color()->get('cyan') }};
    }

    .sku_warp .sku_edit_warp .Js_sku_upload {
        border: 1px solid{{ Admin::color()->get('input-border') }};
        color: {{ Admin::color()->get('dark70') }};
    }

    .sku_warp .sku_edit_warp tr td  .icon-x{
        color: {{ Admin::color()->get('danger') }};
    }

</style>
