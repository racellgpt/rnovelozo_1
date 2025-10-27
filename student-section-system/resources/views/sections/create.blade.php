<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">
<div class="container">
    <h1>Add New Section</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
    
        <table class="form-table">
            <tr>
                <td>
                    <label for="sectionCode">Section Code</label>
                    <input type="text" name="sectionCode" id="sectionCode" value="{{ old('sectionCode') }}" required>
                </td>
                <td>
                    <label for="sectionName">Section Name</label>
                    <input type="text" name="sectionName" id="sectionName" value="{{ old('sectionName') }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}">
                </td>
                <td>
                    <label for="room">Room</label>
                    <input type="text" name="room" id="room" value="{{ old('room') }}">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="capacity">Capacity</label>
                    <input type="number" name="capacity" id="capacity" min="1" value="{{ old('capacity', 30) }}" required>
                </td>
            </tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <button type="submit">Save</button>
            <a href="{{ route('sections.index') }}" class="back-link">Back</a>
        </div>
    </form>
</div>