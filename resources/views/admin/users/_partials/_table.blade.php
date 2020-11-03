<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Meno</th>
        <th>E-mail</th>
        <th>Pozícia</th>
        <th>Pracovisko</th>
    </tr>
    </thead>


    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->meno}}</td>
           <td>{{ $user->email}}</td>
            @if($user->student==1)<td>Študent</td>
            @elseif($user->pracovnik==1) <td>Pracovník</td>
            @else()<td>Admin</td>

              @foreach($workplaces as $workplace)
            @if($workplace->id == $user->user_workplace_id)
                <td>{{ $workplace->name_sk }}</td>
                    @endif
        @endforeach

            <td>{{ $user->formatted_created_at }}</td>
            <td>
                <div class="btn-group text-right" role="group">
                    <button id="row-actions-{{ $user->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Možnosti
                    </button>
                    <div class="dropdown-menu" aria-labelledby="row-actions-{{ $user->id }}">
                        <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                            Editovať
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('users.delete', $user->id) }}" method="post" style="display: inline-block; width: 100%;">
                            @csrf
                            <button data-entity="{{ 'Používateľ - ' . $user->name}}" class="delete-button dropdown-item pointer" type="button">
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
