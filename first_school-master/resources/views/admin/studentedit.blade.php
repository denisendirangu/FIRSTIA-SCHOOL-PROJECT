<html>
    <body>
        <form action="{{route('update-student')}}">
        <div class="table-section w-100">
    <table class="table table-dark table-striped w-100">
        <thead class="table-thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">STAFF NAME</th>
                <th scope="col">STAFF EMAIL</th>
                <th scope="col">STAFF ID</th>
                <th scope="col">OPTIONS</th>
            </tr>
        </thead>
        <tbody class="">
            @csrf
            @foreach ($staff_data as $item)
            <tr>
                <td scope="row"><input type="text" placeholder="{{ $item->staff_id }}"></td>
                <td>{{ $item->staff_name }}</td>
                <td>{{ $item->staff_email }}</td>
                <td>{{ $item->staff_role }}</td>
                <td>
                    <div class="options">
                        <button class="btn btn-warning">SUBMIT</button>   
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
        </form>
    </body>
</html>
