<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Názov SK</th>
        <th>Názov EN</th>
        <th>Akcie</th>
    </tr>
    </thead>


    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->name_sk }}</td>
            <td>{{ $room->name_en }}</td>
            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions-{{ $room->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions-{{ $room->id }}">
                        <a class="dropdown-item" href="{{ route('rooms.edit', $room->id) }}">
                            Editovať
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('rooms.delete', $room->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Miesnosť - ' . $room->name_sk }}" class="delete-button dropdown-item pointer" type="button">
                                Vymazať
                            </button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
