@extends('admin.home')
<style>
    #add-item input[type="text"],
    #add-item input[type="email"],
    #add-item input[type="tel"],
    #add-item input[type="url"],
    #add-item textarea,
    #add-item button[type="submit"] {
        font: 400 12px/16px "Open Sans", Helvetica, Arial, sans-serif;
    }

    #add-item {
        background: #F9F9F9;
        padding: 25px;
        margin: 50px 0;
    }

    #add-item h3 {
        color: #F96;
        display: block;
        font-size: 30px;
        font-weight: 400;
    }

    #add-item h4 {
        margin: 5px 0 15px;
        display: block;
        font-size: 13px;
    }

    fieldset {
        border: medium none !important;
        margin: 0 0 10px;
        min-width: 100%;
        padding: 0;
        width: 100%;
    }

    #add-item input[type="text"],
    #add-item input[type="email"],
    #add-item input[type="tel"],
    #add-item input[type="url"],
    #add-item textarea {
        width: 100%;
        border: 1px solid #CCC;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px;
    }

    #add-item input[type="text"]:hover,
    #add-item input[type="email"]:hover,
    #add-item input[type="tel"]:hover,
    #add-item input[type="url"]:hover,
    #add-item textarea:hover {
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 1px solid #AAA;
    }

    #add-item textarea {
        height: 100px;
        max-width: 100%;
        resize: none;
    }

    #add-item button[type="submit"] {
        cursor: pointer;
        width: 100%;
        border: none;
        background: #0CF;
        color: #FFF;
        margin: 0 0 5px;
        padding: 10px;
        font-size: 15px;
    }

    #add-item button[type="submit"]:hover {
        background: #09C;
        -webkit-transition: background 0.3s ease-in-out;
        -moz-transition: background 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
    }

    #add-item button[type="submit"]:active {
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
    }

    #add-item input:focus,
    #add-item textarea:focus {
        outline: 0;
        border: 1px solid #999;
    }

    ::-webkit-input-placeholder {
        color: #888;
    }

    :-moz-placeholder {
        color: #888;
    }

    ::-moz-placeholder {
        color: #888;
    }

    :-ms-input-placeholder {
        color: #888;
    }
</style>

@section('head')
    <script src="../../../ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form id="add-item" action="" method="post">
        <h3>Chỉnh Sửa Danh Mục</h3>
        @csrf
        <!-- Equivalent to... -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @include('admin/alert')
        <fieldset>
            <label for="menu_name">Tên:</label>
            <input placeholder="Vui lòng nhập tên: " value="{{ $menu->name }}" id="menu_name" name="menu_name" type="text"
                tabindex="1" autofocus>
        </fieldset>
        <fieldset>
            <label for="parent_id">Danh mục:</label>
            <select name="parent_id" id="parent_id">
                <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh mục mới</option>
                @foreach ($menus as $item)
                    <option value="{{ $item->id }}" {{ $menu->parent_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset>
            <label for="description">Mô tả:</label>
            <textarea placeholder="Vui lòng nhập mô tả: " id="description" name="description" autofocus>{{ $menu->description }}</textarea>
        </fieldset>
        <fieldset>
            <label for="content">Nội dung: </label>
            <textarea placeholder="Vui lòng nhập nội dung: " id="content" name="content" autofocus>{{ $menu->content }}</textarea>
        </fieldset>
        <fieldset>
            <p>Trạng thái:</p>
            <input type="radio" id="active" name="active" value="1" {{ $menu->active == 1 ? 'checked' : '' }}>
            <label for="active">Yes</label><br>
            <input type="radio" id="noactive" name="active" value="0" {{ $menu->active == 0 ? 'checked' : '' }}>
            <label for="noactive">No</label><br>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="add-item-submit">Chỉnh sửa danh mục</button>
        </fieldset>
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
