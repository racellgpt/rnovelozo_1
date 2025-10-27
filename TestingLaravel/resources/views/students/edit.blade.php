<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">

<div class="container">
    <h1>EDIT STUDENT</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="form-table">
            <tr>
                <td>
                    <label for="studentNumber">Student Number</label>
                    <input type="text" id="studentNumber" name="studentNumber" value="{{ $student->studentNumber }}" required>
                </td>
                <td>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="{{ $student->lname }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="{{ $student->fname }}" required>
                </td>
                <td>
                    <label for="mi">Middle Initial</label>
                    <input type="text" id="mi" name="mi" value="{{ $student->mi }}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $student->email }}">
                </td>
                <td>
                    <label for="contactNumber">Contact Number</label>
                    <input type="text" id="contactNumber" name="contactNumber" value="{{ $student->contactNumber }}">
                </td>
            </tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <button type="submit">Update</button>
            <a href="{{ route('students.index') }}" class="back-link">Back</a>
        </div>
    </form>
</div>
