<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Názov SK</th>
        <th>Kategória</th>
        <th>Dátum</th>
        <th>Akcie</th>

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
                <td>
                    <div class="btn-group text-right" role="group">
                        <button id="row-actions-{{ $event->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Možnosti
                        </button>
                        <div class="dropdown-menu" aria-labelledby="row-actions-{{ $event->id }}">
                            <a class="dropdown-item" href="{{ route('events.edit', $event->id) }}">
                                Editovať
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('events.delete', $event->id) }}" method="post" style="display: inline-block; width: 100%;">
                                @csrf
                                <button data-entity="{{ 'Udalosť - ' . $event->name_sk }}" class="delete-button dropdown-item pointer" type="button">
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
