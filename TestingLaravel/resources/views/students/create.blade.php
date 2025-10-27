<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">
<div class="container">

    <h1>Add New Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
    
        <table class="form-table">
            <tr>
                <td>
                    <label for="studentNumber">Student Number</label>
                    <input type="text" name="studentNumber" id="studentNumber" required>
                </td>
                <td>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" required>
                </td>
                <td>
                    <label for="mi">Middle Initial</label>
                    <input type="text" name="mi" id="mi">
                </td>
            </tr>
            <tr>
                <td>
                <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </td>
                <td>
    <label for="contactNumber">Contact Number</label>
    <input type="text" id="contactNumber" name="contactNumber">
  </td>
</tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <button type="submit">Save</button>
            <a href="{{ route('students.index') }}" class="back-link">Back</a>
        </div>
    </form>
</div>
