<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>產品搜尋</title>
    <style>
        html, body {
            background-color: #334;
            color: #ccd;
        }
        h1 {
            text-align: center;
        }
        button {
            background-color: #fc4;
            color: #334;
            box-sizing: border-box;
            margin: 8px;
            border: 2px #fc4 outset;
            padding: 4px;
        }
        button:active {
            background-color: #c94;
            border: 2px #c94 inset;
        }
        .content {
            width: 800px;
            margin: 0 auto;
        }
        .catalog {
            width: 200px;
            float: left;
        }
        .catalog input[type=number] {
            background-color: #334;
            color: #eef;
            box-sizing: border-box;
            width: 100%;
            margin: 8px 0;
            border: 2px #ccd solid;
            padding: 4px;
        }
        .catalog button {
            width: 100%;
            margin: 8px 0;
        }
        .properties-list {
            width: 600px;
            float: right;
        }
        .properties-list div {
            padding: 4px;
            clear: both;
        }
        .properties-list img {
            margin: 0 12px 0 0;
            float: left;
        }
        .properties-list .deleted {
            color: #99a;
            text-decoration-line: line-through;
        }
        .w-5 {
            height: 1.5em;
            vertical-align: middle;
        }
        nav {
            text-align: center;
        }
        nav span {
            color: #fc4;
            margin: 4px;
        }
        nav a {
            color: #ccd;
            text-decoration-line: none;
            margin: 4px;
        }
    </style>
</head>
<body>
<div>
    <h1>產品搜尋</h1>
</div>
<div class="content">
<div class="catalog">
    <form action="/" method="get">
        <div>
            廠牌
            @foreach ($brands as $brand)
            <div>
                <label>
                    <input type="checkbox"
                           name="brands[]"
                           value="{{ $brand->id }}"
                           {{ $form['brands'][$brand->id] ?? '' }} />
                    {{ $brand->display_name }}
                </label>
            </div>
            @endforeach
        </div>
        <div>
            <label>最高價格範圍
                <input type="number" name="max_price" maxlength="5" value="{{ $form['max_price'] }}" />
            </label>
        </div>
        <div>
            <label>最低價格範圍
                <input type="number" name="min_price" maxlength="5" value="{{ $form['min_price'] }}" />
            </label>
        </div>
        <div>
            <button type="submit">立即查詢</button>
        </div>
    </form>
</div>
<div class="properties-list">
    @foreach ($properties as $property)
    <div>
        <img src="{{ $property->img_url }}"
             alt="{{ $property->brand->display_name }} {{ $property->display_name }} 的產品圖片" />
        {{ $property->brand->display_name }} {{ $property->display_name }}<br/>
        @if ( $property->original_price == $property->special_price )
            原價 ${{ $property->original_price }}
        @else
            <span class="deleted">原價 ${{ $property->original_price }}</span>
            特價 ${{ $property->special_price }}
        @endif
        <br/>
        <button>加入購物車</button>
    </div>
    @endforeach
    <div>
        {{ $properties->links() }}
    </div>
</div>
</div>
</body>
</html>
