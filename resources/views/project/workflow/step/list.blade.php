<table class="table table-hover">

    <thead>
        <tr>
            <th>Step</th>
            <th>Result</th>
            @auth
                <th>Actions</th>
            @endauth
        </tr>
    </thead>

    <tbody>
        @foreach ($steps as $step)
            @php
                $result = rand(1, 2);
            @endphp
            <tr class="{{ $result === 1 ? 'table-success' : 'table-danger' }}">
                <td>{{ $step->name }}</td>
                <td>{{ $result === 1 ? '✅' : '❌' }}</td>
                @auth
                    <td>
                        <a href="/projects/{{ $project->slug }}/workflows/{{ $workflow->uuid }}/steps/{{ $step->uuid }}/edit"
                            class="btn btn-primary">
                            Edit
                        </a>
                        <form
                            action="/projects/{{ $project->slug }}/workflows/{{ $workflow->uuid }}/steps/{{ $step->uuid }}"
                            method="post">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                @endauth
            </tr>
        @endforeach

</table>
