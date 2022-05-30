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
    @foreach($faculties as $faculty)
        <tr>
            <td>{{ $faculty->id }}</td>
            <td>{{ $faculty->name_sk }}</td>
            <td>{{ $faculty->name_en }}</td>
            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions-{{ $faculty->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions-{{ $faculty->id }}">
                        <a class="dropdown-item" href="{{ route('faculties.edit', $faculty->id) }}">
                            Editovať
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('faculties.delete', $faculty->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Fakulta - ' . $faculty->name_sk }}" class="delete-button dropdown-item pointer" type="button">
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
