<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">

<div class="container">
    <h1>SECTION DETAILS</h1>

    <table class="student-table">
        <tr>
            <th>Section Code</th>
            <td>{{ $section->sectionCode }}</td>
        </tr>
        <tr>
            <th>Section Name</th>
            <td>{{ $section->sectionName }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $section->description ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Room</th>
            <td>{{ $section->room ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Capacity</th>
            <td>{{ $section->capacity }}</td>
        </tr>
    </table>

    <div class="student-actions" style="margin-top:20px; justify-content:center;">
        <a href="{{ route('sections.index') }}">Back</a>
        <a href="{{ route('sections.edit', $section->id) }}">Edit</a>
        <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>