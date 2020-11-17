<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Názov SK</th>
        <th>Kategória</th>
        <th>Dátum</th>
    </tr>
    </thead>


    <tbody>
    @foreach($events as $event)
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->name_sk }}</td>
            @foreach($categories as $category)
                @if($category->id == $event->event_category_id)
                    <td>{{ $category->name_sk }}</td>
                @endif
            @endforeach
            <td>{{ $event->date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
