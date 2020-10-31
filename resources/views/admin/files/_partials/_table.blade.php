<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Názov SK</th>
        <th>Typ</th>
        <th>Akcie</th>
    </tr>
    </thead>


    <tbody>
    @foreach($files as $file)
        <tr>
            <td>{{ $file->id }}</td>
            <td>{{ $file->name_sk }}</td>
            <td>{{ $file->type }}</td>
            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions-{{ $file->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions-{{ $file->id }}">
                        <a class="dropdown-item" href="{{ route('files.edit', $file->id) }}">
                            Editovať
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('files.delete', $file->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Súbor - ' . $file->name_sk }}" class="delete-button dropdown-item pointer" type="button">
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
