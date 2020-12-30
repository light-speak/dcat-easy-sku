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
                                    <span class="btn btn-danger Js_remove_attr_val"><i
                                                class="feather icon-x"></i></span>
                                </div>
                                <div class="sku_attr_val_item Js_add_attr_val" style="padding-left: 10px">
                                    <span class="btn btn-success"><i class="feather icon-plus"></i></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="btn btn-success Js_add_attr_name">添加</span>
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
