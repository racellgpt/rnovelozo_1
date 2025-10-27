<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>STUDENTS LIST MANAGEMENT</h1>

    <div class="top-actions">
        <a href="{{ route('students.create') }}">+Add Student</a>
        <a href="{{ route('sections.index') }}" class="btn-nav">Go to Sections</a>
    </div>

    <!-- Header row -->
    <div class="student-header">
        <span>ID NUMBER</span>
        <span>NAME</span>
        <span>MIDDLE INITIAL</span>
        <span>EMAIL</span>
        <span>CONTACT</span>
        <span>ACTIONS</span>
    </div>

    <ul>
        @foreach($students as $student)
            <li>
                <div class="student-info">
                    <span>{{ $student->studentNumber }}</span>
                    <span>{{ $student->lname }}, {{ $student->fname }}</span>
                    <span>{{ $student->mi }}</span>
                    <span>{{ $student->email }}</span>
                    <span>{{ $student->contactNumber }}</span>
                </div>
                <div class="student-actions">
                    <a href="{{ route('students.show', $student->id) }}">View</a>
                    <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
