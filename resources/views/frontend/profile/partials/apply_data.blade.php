<form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
    @csrf

    <!-- Address -->
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
    </div>

    <!-- Gender -->
    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender">
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <!-- Date of Birth -->
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
    </div>

    <!-- Experience -->
    <div class="form-group">
        <label for="experience">Experience</label>
        <textarea class="form-control" id="experience" name="experience">{{ old('experience') }}</textarea>
    </div>

    <!-- Phone -->
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
    </div>

    <!-- Bio -->
    <div class="form-group">
        <label for="bio">Bio</label>
        <textarea class="form-control" id="bio" name="bio">{{ old('bio') }}</textarea>
    </div>

    <!-- Cover Letter -->
    <div class="form-group">
        <label for="cover_letter">Cover Letter (PDF)</label>
        <input type="file" class="form-control-file" id="cover_letter" name="cover_letter">
    </div>

    <!-- Resume -->
    <div class="form-group">
        <label for="resume">Resume (PDF)</label>
        <input type="file" class="form-control-file" id="resume" name="resume">
    </div>

    <!-- Avatar -->
    <div class="form-group">
        <label for="avatar">Avatar (JPEG/JPG/PNG)</label>
        <input type="file" class="form-control-file" id="avatar" name="avatar">
    </div>

    <button type="submit" class="bg-gray-300 btn btn-primary">Submit</button>
</form>
