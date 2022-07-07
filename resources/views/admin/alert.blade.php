<style>
    .alert {
        background: red;
        display: flex;
        align-content: center;
        align-items: center;
        justify-content: center;
        color: #fff;
        border-radius: 5px;
    }

    .alert ul {
        padding: 5px;
        list-style-type: none;
    }

    .alert ul li {
        color: #fff;
        padding: 5px;
    }
</style>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('error') }}</li>
        </ul>
    </div>
@endif
