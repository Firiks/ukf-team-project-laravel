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
    @foreach($event_categories as $event_category)
        <tr>
            <td>{{ $event_category->id }}</td>
            <td>{{ $event_category->name_sk }}</td>
            <td>{{ $event_category->name_en }}</td>
            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions-{{ $event_category->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions-{{ $event_category->id }}">
                        <a class="dropdown-item" href="{{ route('event_categories.edit', $event_category->id) }}">
                            Editovať
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('event_categories.delete', $event_category->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Kategória - ' . $event_category->name_sk }}" class="delete-button dropdown-item pointer" type="button">
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
