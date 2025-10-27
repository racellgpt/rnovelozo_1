<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>SECTIONS LIST MANAGEMENT</h1>

    <div class="top-actions">
        <a href="{{ route('sections.create') }}">+Add Section</a>
        <a href="{{ route('students.index') }}" class="btn-nav">Go to Students</a>
    </div>

    <!-- Header row -->
    <div class="student-header">
        <span>SECTION CODE</span>
        <span>SECTION NAME</span>
        <span>DESCRIPTION</span>
        <span>ROOM</span>
        <span>CAPACITY</span>
        <span>ACTIONS</span>
    </div>

    <ul>
        @foreach($sections as $section)
            <li>
                <div class="student-info">
                    <span>{{ $section->sectionCode }}</span>
                    <span>{{ $section->sectionName }}</span>
                    <span>{{ $section->description ?? 'N/A' }}</span>
                    <span>{{ $section->room ?? 'N/A' }}</span>
                    <span>{{ $section->capacity }}</span>
                </div>
                <div class="student-actions">
                    <a href="{{ route('sections.show', $section->id) }}">View</a>
                    <a href="{{ route('sections.edit', $section->id) }}">Edit</a>
                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
