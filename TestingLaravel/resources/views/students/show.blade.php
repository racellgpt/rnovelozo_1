<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">

<div class="container">
    <h1>STUDENT DETAILS</h1>

    <table class="student-table">
        <tr>
            <th>Student Number</th>
            <td>{{ $student->studentNumber }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $student->lname }}</td>
        </tr>
        <tr>
            <th>First Name</th>
            <td>{{ $student->fname }}</td>
        </tr>
        <tr>
            <th>Middle Initial</th>
            <td>{{ $student->mi }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $student->email }}</td>
        </tr>
        <tr>
            <th>Contact Number</th>
            <td>{{ $student->contactNumber }}</td>
        </tr>
    </table>

    <div class="student-actions" style="margin-top:20px; justify-content:center;">
        <a href="{{ route('students.index') }}">Back</a>
        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>
