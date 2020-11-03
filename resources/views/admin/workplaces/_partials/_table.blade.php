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
    @foreach($workplaces as $workplace)
        <tr>
            <td>{{ $workplace->id }}</td>
            <td>{{ $workplace->name_sk }}</td>
            <td>{{ $workplace->name_en }}</td>
            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions-{{ $workplace->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions-{{ $workplace->id }}">
                        <a class="dropdown-item" href="{{ route('workplaces.edit', $workplace->id) }}">
                            Editovať
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('workplaces.delete', $workplace->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Pracovisko - ' . $workplace->name_sk }}" class="delete-button dropdown-item pointer" type="button">
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
