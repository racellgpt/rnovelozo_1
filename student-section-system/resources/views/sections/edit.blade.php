<link rel="stylesheet" href="{{ asset('css/features-students.css') }}">

<div class="container">
    <h1>EDIT SECTION</h1>

    <form action="{{ route('sections.update', $section->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="form-table">
            <tr>
                <td>
                    <label for="sectionCode">Section Code</label>
                    <input type="text" id="sectionCode" name="sectionCode" value="{{ $section->sectionCode }}" required>
                </td>
                <td>
                    <label for="sectionName">Section Name</label>
                    <input type="text" id="sectionName" name="sectionName" value="{{ $section->sectionName }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" value="{{ $section->description }}">
                </td>
                <td>
                    <label for="room">Room</label>
                    <input type="text" id="room" name="room" value="{{ $section->room }}">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="capacity">Capacity</label>
                    <input type="number" id="capacity" name="capacity" value="{{ $section->capacity }}" min="1" required>
                </td>
            </tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <button type="submit">Update</button>
            <a href="{{ route('sections.index') }}" class="back-link">Back</a>
        </div>
    </form>
</div>