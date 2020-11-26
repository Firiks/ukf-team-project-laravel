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
                <div class="btn-group text-center">
                    <a href="{{ route('student.workplaces.save', [app()->getLocale(), $workplace->id]) }}">
                        <button type="button" class="btn btn-success">
                            Pridať sa na pracovisko
                        </button>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
